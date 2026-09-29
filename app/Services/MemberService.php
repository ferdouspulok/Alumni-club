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

        $existingIds = Member::where('member_id', 'LIKE', "{$prefix}%")
            ->pluck('member_id');

        $maxNum = 0;
        foreach ($existingIds as $mid) {
            if (preg_match('/CEC-\d{4}-(\d+)/', $mid, $matches)) {
                $num = intval($matches[1]);
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }

        $nextNumber = $maxNum + 1;
        $candidate = sprintf("%s%04d", $prefix, $nextNumber);

        while (Member::where('member_id', $candidate)->exists()) {
            $nextNumber++;
            $candidate = sprintf("%s%04d", $prefix, $nextNumber);
        }

        return $candidate;
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
