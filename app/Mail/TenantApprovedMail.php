<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TenantApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $organization,
        public string $email,
        public string $tempPassword,
        public string $tenantSlug,
        public int $tenantId,
    ) {}

    public function build(): self
    {
        return $this->subject('Your FoundU Tenant Account Details')
            ->view('emails.tenant-approved')
            ->with([
                'organization' => $this->organization,
                'email' => $this->email,
                'tempPassword' => $this->tempPassword,
                'tenantSlug' => $this->tenantSlug,
                'tenantId' => $this->tenantId,
                'loginUrl' => url('/login'),
            ]);
    }
}


