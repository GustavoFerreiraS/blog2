<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;


class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postagens = Postagem::orderBy('titulo', 'ASC')->get();
        //dd($postagens);
        //dd('Postagem - index');
        return view('postagem.postagem_index', compact ('postagens'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome', 'ASC')->get();
        return view('postagem.postagem_create', compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'categoria_id' => 'required',
            'titulo' => 'required|min:5',
         ]);

         $postagem = new Postagem();
         $postagem->categoria_id = $request->categoria_id;
         $postagem->user_id = Auth::id();
         $postagem->titulo = $request->titulo;
         $postagem->conteudo = $request->conteudo;
         $postagem->save();

        //dd($request->all());

       return redirect()->route('postagem.index')->with('mensagem', 'Postagem cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd ('show: ' . $id);
        $postagem = Postagem::find($id);
        return view('postagem.postagem_show', compact('postagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd('Edit:' . $id);

        $postagem = Postagem::find($id);
        return view('postagem.postagem_edit', compact('postagem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($id);
        $validated = $request->validate([
            'titulo' => 'required|min:5',
         ]);

         $postagem = Postagem::find($id);
         $postagem->titulo = $request->titulo;
         $postagem->save();

         return redirect()->route('postagem.index')->with('mensagem', 'Postagem criada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // dd('Destroy:' . $id);
       $categoria = Postagem::find($id);
       $categoria->delete();

       return redirect()->route('postagem.index')->with('mensagem', 'Categoria excluida com sucesso');


    }
}
