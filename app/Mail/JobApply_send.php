<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Job_applys;

class JobApply_send extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Job_applys instanced
     * 
     * @var App\Models\Job_applys
     */

    protected $applicant;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Job_applys $Job_applys
     * @return void
     */
    public function __construct(Job_applys $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->from($this->applicant->email, $this->applicant->firstname . " " . $this->applicant->lastname)
        ->view('email.job_applicant_view')
        ->with([
            'firstname' => $this->applicant->name,
            'lastname' => $this->applicant->email,
            'email' => $this->applicant->phone,
            'phone' => $this->applicant->message,
            'city' => $this->applicant->email,
            'position' => $this->applicant->phone,
            'linkedin' => $this->applicant->message,
            'education' => $this->applicant->email,
            'note' => $this->applicant->phone,
            'applyas' => $this->applicant->applyas,
        ]);
    }
}
