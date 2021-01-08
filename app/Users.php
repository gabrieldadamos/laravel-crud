<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['nome','nascimento','sexo','cep','endereco','numero','complemento','bairro','estado','cidade'];
}
