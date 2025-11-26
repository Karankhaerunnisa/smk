<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrantDocument extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrantDocumentFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function registrant(): BelongsTo
    {
        return $this->belongsTo(Registrant::class, 'registrant_id');
    }
}
