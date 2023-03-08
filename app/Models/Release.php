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




    
      //Nesse caso, passou-se o paramentro search, caso seja passado algo no campo de busca é atribuido um  valor a variavel query que recebe o valor de search, caso não, não mostra nada
      public function search(Array $data, $totalPage)
      {
          //atribuindo o valor da busca a variavel releases
          $releases = $this->where(function ($query) use ($data) {
  
            if(isset($data['release_type'])){
                $query->where('release_type', $data['release_type']);
            }

            if(isset($data['person'])){
                $query->where('person', $data['person']);
            }

          })

          ->paginate($totalPage);


         
          return $releases;
      }
}
