<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrantAddress extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrantAddressFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function registrant(): BelongsTo
    {
        return $this->belongsTo(Registrant::class, 'registrant_id');
    }

    public function getFullAddressAttribute(): string
    {
        $addressParts = $this->street_address;
        if ($this->rt && $this->rw) {
            $addressParts .= ", RT {$this->rt}/RW {$this->rw}";
        }
        $addressParts .= ", Kel. {$this->village}, Kec. {$this->district}, {$this->city}, {$this->province}, {$this->postal_code}";
        
        return $addressParts;
    }
}
