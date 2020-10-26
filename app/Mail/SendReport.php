<?php

namespace App\Mail;

use App\Models\Business;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReport extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;
    public $business;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf, Business $business)
    {
        $this->pdf = $pdf;
        $this->business = $business;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reports.summary')
                ->attachData($this->pdf, 'Report.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
