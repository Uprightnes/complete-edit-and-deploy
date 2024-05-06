<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordDiscripancyRedeploymentMail extends Mailable
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
        return $this->subject('Record Discripancy Redeployment')
                    ->markdown('emails.record_discripancy_redeployment')
                    ->attachData($this->pdf->output(), 'record_discripancy_redeployment.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}