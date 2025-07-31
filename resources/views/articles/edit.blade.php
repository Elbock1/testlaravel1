@extends('layouts.app')

@section('title', 'Modifier l\'Article: ' . $article->title)

@section('content')
    <div>
        <div>
            <div>
                <h1>Modifier l'Article : {{ $article->title }}</h1>

                {{-- Le formulaire de modification d'article --}}
                <form action="{{ route('articles.update', $article->id) }}" method="POST">
                    @csrf {{-- Directive CSRF pour la sécurité --}}
                    @method('PUT') {{-- Indique à Laravel que c'est une requête PUT pour la mise à jour --}}

                    <div>
                        <label for="title">Titre :</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" required minlength="5">
                        {{-- Affichage des erreurs de validation pour le titre --}}
                        @error('title')
                            <p style="color: red; font-size: 0.75em; font-style: italic;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content">Contenu :</label>
                        <textarea name="content" id="content" rows="10" required>{{ old('content', $article->content) }}</textarea>
                        {{-- Affichage des erreurs de validation pour le contenu --}}
                        @error('content')
                            <p style="color: red; font-size: 0.75em; font-style: italic;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit">
                            Mettre à jour l'article
                        </button>
                        <a href="{{ route('articles.show', $article->id) }}">
                            Annuler
                        </a>
                        <a href="{{ route('articles.index') }}">Retour à la liste</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
