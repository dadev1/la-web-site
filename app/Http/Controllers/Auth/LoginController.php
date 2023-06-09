<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\VerifyEmailException;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application.
     */
    protected function attemptLogin(Request $request): bool
    {
        $token = $this->guard()->attempt($this->credentials($request));
        
        if (! $token) {
            return false;
        }

        $user = $this->guard()->user();
        if ($user->permission == 'suspend') {
            return false;
        }

        if ($user->permission == 'deny') {
            return false;
        }

        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            return false;
        }
        

        $subscription = DB::table('subscriptions')->where('user_id', $user->id)->first();
        
        // if($subscription == null) {
        //     return false;
        // } else {
        //     $ends_at = Carbon::parse($subscription->ends_at);
        //     $ends_result = $ends_at->gt(Carbon::now()); //true - valid, false - expired
        //     if (!$ends_result){
        //         return false;
        //     }
        // }

        $this->guard()->setToken($token);

        return true;
    }

    /**
     * Send the response after the user was authenticated.
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $token = (string) $this->guard()->getToken();
        $expiration = $this->guard()->getPayload()->get('exp');

        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
        ]);
    }

    /**
     * Get the failed login response instance.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = $this->guard()->user();
        
        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            throw VerifyEmailException::forUser($user);
        }

        $user_id = isset($user->id) ? $user->id : 0;
        
        $subscription = DB::table('subscriptions')->where('user_id', $user_id)->first();
        
        if($subscription == null) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.expired')],
            ]);
        } else {
            $ends_at = Carbon::parse($subscription->ends_at);
            $ends_result = $ends_at->gt(Carbon::now()); //true - valid, false - expired
            if (!$ends_result){
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.expired')],
                ]);
            }
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        return response()->json(null, 204);
    }
}
