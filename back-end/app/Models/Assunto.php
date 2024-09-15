<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    
    protected $table = 'assunto';

    
    protected $fillable = ['titulo'];

   
    public function mensagens()
    {
        return $this->hasMany(Mensagem::class, 'idAssunto');
    }
}
