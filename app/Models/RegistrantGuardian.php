<?php

namespace App\Models;

use App\Enums\GuardianRelationship;
use App\Enums\IncomeRange;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrantGuardian extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrantGuardianFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'relationship' => GuardianRelationship::class,
            'income_range' => IncomeRange::class,
        ];
    }

    public function registrant(): BelongsTo
    {
        return $this->belongsTo(Registrant::class, 'registrant_id');
    }
}
