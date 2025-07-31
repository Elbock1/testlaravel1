@extends('layouts.app')

@section('title', $article->title) {{-- Le titre de la page est le titre de l'article --}}

@section('content')
    <div>
        <div>
            <div>
                {{-- Bouton/Lien de retour à la liste des articles --}}
                <div>
                    <a href="{{ route('articles.index') }}">Retour à la liste des articles</a>
                </div>

                <h1>{{ $article->title }}</h1>
                <p><small>Publié le: {{ $article->created_at->format('d/m/Y à H:i') }}</small></p>

                <hr>

                <div>
                    <p>{{ $article->content }}</p> {{-- Afficher tout le contenu --}}
                </div>

                <hr>

                <div>
                    <a href="{{ route('articles.edit', $article->id) }}">Modifier cet article</a>
                    {{-- Formulaire de suppression, identique à celui de l'index --}}
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block; margin-left: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer cet article</button>
                    </form>
                </div>

                {{-- Ici, tu pourrais ajouter la section pour les commentaires plus tard --}}
                {{-- <h2>Commentaires</h2> --}}
                {{-- ... --}}

            </div>
        </div>
    </div>
@endsection
