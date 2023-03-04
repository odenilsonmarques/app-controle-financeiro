<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    protected $fillable = [
        'release_type',
        'person',
        'description',
        'amount',
        'month',
    ];

    //utilizando o recurso mutators para especificar os padrões que desejo inserir na banco de dados
    //utilizei o nome das variaveis igual aos campo, mas poderia ser outro nome
  
    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = str_replace(['.',','],['','.'],$amount);
    }
}
