<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Para renderizar vue
use Inertia\Inertia;
// Modelo de los posts
use App\Models\Post;
use App\Http\Requests\Post as PostRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Renderiza la vista de crear
        return Inertia::render('Admin/Create');
    }

    /**
     * Store a newly created resource in storage.
     * postRequest
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'category_id' => 'required',
                'title' => ['required', 'unique:posts', 'max:255'],
                'body' => 'required',
            ],
            //Custom errors
            [
                'category_id.required' => 'No ha seleccionado una categoría',
                'title.unique' => 'El título ya está registrado',
                'body.unique' => 'La descripción no puede quedar vacío',
            ]
        );
        // $imageName = time().'.'.$request->image->extension();  
            
        // $request->image->move(public_path('images'), $imageName);
            
        //Salvar con el id de usuario
        $post = Post::create([
            "user_id" => auth()->user()->id
            //obtener el campo user_id de post ||lo buscamos en autenticados/usuarios/id
        ]+ $request->all() );

        if($request->file("image")){
            $post->image= $request->file("image")->store("posts","public");
            $post->save();
        }

        return redirect()->route('posts.edit',  $post->id)->with('status','Post agregado');
            // ->withErrors(['email' => 'User with given e-mail already exists']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //Show a tour
        return Inertia::render('Admin/Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Admin/Edit', [
            'post' => $post,
            'goBack' => 'servicies'
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request);
        //Si no tiene el mismo nombre valida que no este repetido
        if($post->title != $request->title){
            $request->validate(
                [
                    'category_id' => 'required',
                    'title' => ['required', 'unique:posts', 'max:255'],
                    'body' => 'required',
                ],
                //Custom errors
                [
                    'category_id.required' => 'No ha seleccionado una categoría',
                    'title.unique' => 'El título ya está registrado',
                    'body.required' => 'La descripción no puede quedar vacío',
                ]
            );
        }
        //No tiene el mismo nombre
        else{
            $request->validate(
                [
                    'category_id' => 'required',
                    'body' => 'required',
                ],
                //Custom errors
                [
                    'category_id.required' => 'No ha seleccionado una categoría',
                    'body.required' => 'La descripción no puede quedar vacío',
                ]
            );
        } 
        //Actualiza la publicacion
        $image = $request->image;
        // dd($image);
        $post->update($request->all());
        // $post->update([
        //     'category_id' => Request::input('category_id'),
        //     'title' => Request::input('title'),
        //     'body' => Request::input('body'),
        //     'image' => $image,
        //     'price' => Request::input('price'),
        //     'iframe' => Request::input('iframe'),
        // ]);
        //Verifica si trae una imagen
        if($image){
            Storage::disk('public')->delete($post->image);
            $post->image = $image->store('posts', 'public');
            $post->save();
        }
        return redirect()->route('posts.edit',  $post->id)->with('status','Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
