<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class QuoteGenerated extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    public function build()
    {
        // Generate the PDF in memory
        $pdf = Pdf::loadView('pdf.quote', ['quote' => $this->quote]);

        return $this->subject('Service Estimate: Rehoboth Cleaning and Janitorial Services')
                    ->markdown('emails.quotes.sent')
                    ->attachData($pdf->output(), "Rehoboth_Quote_{$this->quote->id}.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}
