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
        $loginUrl = $this->buildTenantLoginUrl($this->tenantSlug);

        return $this->subject('Your FoundU Tenant Account Details')
            ->view('emails.tenant-approved')
            ->with([
                'organization' => $this->organization,
                'email' => $this->email,
                'tempPassword' => $this->tempPassword,
                'tenantSlug' => $this->tenantSlug,
                'tenantId' => $this->tenantId,
                'loginUrl' => $loginUrl,
            ]);
    }

    private function buildTenantLoginUrl(string $tenantSlug): string
    {
        $baseUrl = config('app.url');
        $parsed = parse_url($baseUrl) ?: [];
        $scheme = $parsed['scheme'] ?? 'https';
        $host = $parsed['host'] ?? null;

        $tenantBaseDomain = env('TENANT_BASE_DOMAIN', $host);

        $invalid = !$tenantBaseDomain
            || $tenantBaseDomain === 'localhost'
            || str_contains((string) $tenantBaseDomain, ':')
            || filter_var((string) $tenantBaseDomain, FILTER_VALIDATE_IP);

        if ($invalid) {
            return url('/login');
        }

        return $scheme . '://' . $tenantSlug . '.' . $tenantBaseDomain . '/login';
    }
}


