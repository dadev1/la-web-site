<?php

namespace App\Http\Controllers;

use App\Models\Job_applys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\JobApply_send;

class JobApplyController extends Controller
{
    //
    public function applicant_proposal(Request $request) {
        $input = $request->all();
        Validator::make($input, [
            'firstname'=> 'required|string',
            'lastname'=> 'required|string',
            'email'=> 'required|email',
            'phone'=> 'required',
        ])->validate();

        $applicant = Job_applys::create($input);

        // Send mail to admin
        try{
            // $mail_check = \Mail::to('support@lifeanalytics.org', 'Daisukekubota')
            $mail_check = \Mail::to('darbinyan.dev@gmail.com', 'darbinyan.dev')
            ->send(new JobApply_send($applicant));
            return response()->json([
                'success' => true,
                'mail' => $mail_check,
            ]);
        }
        catch(\Exception $e){
            echo ($e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }

        // try{
        //     // $mail_check = \Mail::to('support@lifeanalytics.org', 'Daisukekubota')
        //     $mail_check = \Mail::to('darbinyan.dev@gmail.com', 'darbinyan.dev')
        //     ->send(new Contact_send($contact));
        //     return response()->json([
        //         'success' => true,
        //         'mail' => $mail_check,
        //     ]);
        // }
        // catch(\Exception $e){
        //     echo ($e->getMessage());
        //     return response()->json([
        //         'success' => false,
        //         'error' => $e->getMessage(),
        //     ]);
        // }
    }
}
