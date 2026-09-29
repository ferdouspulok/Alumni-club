<?php

namespace App\Services;

use App\Models\Member;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class MemberService
{
    /**
     * Generate sequential Member ID, e.g., CEC-2026-0001
     */
    public static function generateMemberId(): string
    {
        $year = date('Y');
        $prefix = "CEC-{$year}-";

        $lastMember = Member::where('member_id', 'LIKE', "{$prefix}%")
            ->orderBy('id', 'desc')
            ->first();

        if ($lastMember && preg_match('/CEC-\d{4}-(\d+)/', $lastMember->member_id, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1;
        }

        return sprintf("%s%04d", $prefix, $nextNumber);
    }

    /**
     * Generate SVG QR Code for verification link
     */
    public static function generateQrCode(string $url): string
    {
        $options = new QROptions;
        $options->version = 5;
        $options->outputBase64 = true;
        
        $qrcode = new QRCode($options);
        return $qrcode->render($url);
    }
}
