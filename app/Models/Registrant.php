<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registrant extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrantFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
    
    public function address(): HasOne
    {
        return $this->hasOne(RegistrantAddress::class, 'registrant_id');
    }

    public function guardians(): HasMany
    {
        return $this->hasMany(RegistrantGuardian::class, 'registrant_id');
    }

    public function academic(): HasOne
    {
        return $this->hasOne(RegistrantAcademic::class, 'registrant_id');
    }
}
