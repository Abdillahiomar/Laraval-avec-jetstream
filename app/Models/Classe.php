<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    public function etudiants(): HasMany
    {
        return $this->hasMany(Etudiant::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(categorie::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
