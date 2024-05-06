<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuditRecommendationRedeploymentMail extends Mailable
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
        return $this->subject('Audit Recommendation Redeployment')
                    ->markdown('emails.audit_recommendation_redeployment')
                    ->attachData($this->pdf->output(), 'audit_recommendation_redeployment.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}