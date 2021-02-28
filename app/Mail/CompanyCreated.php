<?php

namespace App\Mail;

use App\Models\Companies;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Companies
     */
    private $company_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.company_created', ['company_name' => $this->company_name]);
    }
}
