<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    
    protected $table = 'mensagem';

    
    protected $fillable = ['titulo', 'conteudo', 'idAssunto', 'id_usuario'];

    
    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'idAssunto');
    }

    public function users()
    {
        return $this->belongsTo(User::class,
            'id_usuario'
        );
    }
}
