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
        'user_id',
    ];

    // method to relate one or more releases to a single user
    public function user() 
    {
        return $this->belongsTo(User::class);
    }


    //utilizando o recurso mutators para especificar os padrões que desejo inserir na banco de dados
    //utilizei o nome das variaveis igual aos campo, mas poderia ser outro nome
  
    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = str_replace(['.',','],['','.'],$amount);
    }

    //Nesse caso, passou-se o paramentro data, caso seja passado algo no campo de busca é atribuido um  valor a variavel query que recebe o valor de data, caso não, não mostra nada
    public function search(Array $search, $totalPage)
    {
        //atribuindo o valor da busca a variavel releases
        $releases = $this->where(function ($query) use ($search) {

            if(isset($search['release_type'])){
                $query->where('release_type', $search['release_type']);
            }

            if(isset($search['month'])){
                $query->where('month', $search['month']);
            }

            if(isset($search['person'])){
                $query->where('person', $search['person']);
            }

             // adicionando a condição para buscar apenas os lançamentos do usuário logado
        $query->where('user_id', auth()->user()->id);
        })
        // ->toSql(); dd($listReleases);
        ->paginate($totalPage);
        return $releases;
    }
}
