<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'EmpresasDataBase';
    protected $fillable = [
        'id',
        'empresa',
        'cidade',
        'estado',
        'segmento',
        'regiao',
        'cnpj',
        'telefone',
        'email'
    ];
    public $timestamps = false;
}
