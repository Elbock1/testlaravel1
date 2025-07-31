@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
    <div class="container">
        <div class="header-fixed">
            <h1 class="page-title">Liste des Articles</h1>
            <div>
                <a href="{{ route('articles.create') }}">
                    <button class="btn-create">
                       Créer un nouvel article
                    </button>
                </a>   
            </div>
        </div>

        {{-- Affichage du message de succès (flash message) --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Vérifier s'il y a des articles à afficher --}}
        @if ($articles->isEmpty())
            <p class="no-articles">Aucun article pour le moment. Créez-en un !</p>
        @else
       

            @foreach ($articles as $article)
                <div class="article-item">
                    <h2>{{ $article->title }}</h2>
                    
                    <p>{{ Str::limit($article->content, 200) }}</p> {{-- Affiche les 200 premiers caractères du contenu --}}
                    <p><small>Publié le: {{ $article->created_at->format('d/m/Y à H:i') }}</small></p>
                  

                    <div class="article-actions">
                      <a href="{{ route('articles.show', $article->id) }}"> Lire</a>
                        <a href="{{ route('articles.edit', $article->id) }}">Modifier</a>
                        {{-- Formulaire de suppression --}}
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE') {{-- Important pour Laravel, simule une requête DELETE --}}
                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
                <hr class="article-separator"> {{-- Ligne de séparation entre les articles --}}
            @endforeach


        @endif
    </div>
@endsection