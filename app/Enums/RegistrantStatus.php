<?php

namespace App\Enums;

enum RegistrantStatus: string
{
    case PENDING = 'pending';
    case VERIFIED = 'verified';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Pending',
            self::VERIFIED => 'Terverifikasi',
            self::ACCEPTED => 'Disetujui',
            self::REJECTED => 'Ditolak',
        };
    }
}
