<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'tel',
        'email',
        'adresse',
        'entreprise',
        'poste',
        'groupe_id',
    ];

    public function groupe(): BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
}