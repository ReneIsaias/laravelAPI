<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
//invocamos al recurse de post a este controllador
use App\Http\Resources\Post as PostResouces;
//invocamos el request que valida los datos del controlador
use App\Http\Requests\Post as PostRequest;
//Invocamos al recusrso de collection de post
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    //Definimos nuestro constructor y una variable

    protected $post;

    public function __construct(Post $post)
    {
        //Almacenamos en la variable nuestra entidad de Post
        $this->post = $post;
    }


    /**
     * Formas de respuesta con el status
     * 1XX => Es para informar
     * 2XX => Nos informa de una respuesta exitosa
     * 3XX => Son las redirecciones
     * 4XX => Son los errores de cliente
     * 5XX => Es para los errores del servidor
     * **/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            new PostCollection(
            $this->post->orderBy('id','Desc')->get(),
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //alamceno en la variable el request que recivo y lo alamceno en la DB
        $post = $this->post->created($request->all());
        //Devolvemos en formato Json que se hizo la conezion correcta y que se creo un recurso con el 201
        return response()->json(new PostResouces($post), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json(new PostResouces($post));
        /*
        Esta configuracion funciona, si
        Pero no es realmente lo correcto ara una aplicacion o un sistema ya que no nos permite realzar la configurtacopb decorrectamnete

        return [
            'id' => $post->id,
            'title' => strtoupper($post->title),
            'body' => strtoupper(substr($post->body, 0, 100)) . '...',
        ];
        */

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //Actualizamos el Post que stamos reciviendo
        $post->update($request->all());
        //DEvolvemos en formato Json la actualizacion co el status 200 que no importa si no se coloca
        return response()->json(new PostResouces($post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        //devolvemos el Json con el status 204 que hace referencia a que la conexion fue exitosa pero que se elimino un recurso
        return response()->json(null, 204);
    }
}
