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

    public function color(): string
    {
        return match($this) {
            self::PENDING => 'yellow',
            self::VERIFIED => 'blue',
            self::ACCEPTED => 'green',
            self::REJECTED => 'red',
        };
    }
}
