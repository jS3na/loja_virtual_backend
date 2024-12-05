<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Promocao extends Model
{
    use HasFactory;

    protected $table = 'promocoes';

    protected $fillable = [
        'produto_id',
        'descricao',
        'preco_promocao',
    ];

    protected $guarded = [];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
