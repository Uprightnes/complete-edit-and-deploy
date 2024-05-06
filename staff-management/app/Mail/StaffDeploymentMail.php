<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffDeploymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($staff, $pdf)
    {
        $this->staff = $staff;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Staff Deployment')
                    ->markdown('emails.staff_deployment')
                    ->attachData($this->pdf->output(), 'staff_deployment.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}