<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'preco', 'unidades', 'descricao', 'image'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
