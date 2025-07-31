<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData= $request-> validate ([
            'title'=> 'required|string|min:5',
            'content'=> 'required|string',
        ]);

        Article::create($validatedData);

        return redirect()-> route('articles.index')-> with('succes', 'Article créée avec succès');
    }

    /**
     * Display the specified resource.
     */
     public function show(string $id) // Le paramètre est un simple ID (string)
    {
        // Récupérer l'article de la base de données par son ID
        // findOrFail() essaiera de trouver l'article. S'il ne le trouve pas,
        // il lancera automatiquement une exception 404 (Not Found).
        $article = Article::findOrFail($id);

        // Passer l'article récupéré à la vue 'articles.show'
        return view('articles.show', compact('article'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $article = Article::findOrFail($id); // <-- Et celle-ci pour edit !
    return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $validatedData = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10|max:5000',
        ]);

      
        $article = Article::findOrFail($id); 

        
        $article->update($validatedData); 

       
        return redirect()->route('articles.show', $article->id)->with('success', 'Article mis à jour avec succès !');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $article = Article::findOrFail($id);

         $article-> delete(); 

         return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès !');
    }
}
