<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //Esto nos permite guardar datos de forma masiva
    protected $fillable = [
        'title', 'body',
    ];


    /*
    Toda esta configuracion esta bien, solo que i la dejamos aqui va a a plicar a todo el sistema que requiera esta entidad
    por lo que no es recomedable dejarla aqui

    protected $hidden = ['title', 'body'];
    protected $appends = ['post_name', 'post_excerpt'];

    //El nombre del metodo qeu lo que importa es PostName se debe escribir en camelquase post_name, como en el apartado de arriba
    public function getPostNameAttribute()
    {
        return strtoupper($this->title);
    }

    public function getPostExcerptAttribute()
    {
        return strtoupper(
            substr($this->body, 0, 30)
        ) . '...';
    }
    */
}
