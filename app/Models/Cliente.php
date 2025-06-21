<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Empresa;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'email', 'telefone', 'empresa_id', 'cnpj',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relatorios(): HasMany 
    {
        return $this->hasMany(RelatorioAtendimento::class);
    }

}