@extends('layouts.app')

@section('title', 'Créer un Nouvel Article')

@section('content')
    <div>
        <div>
            <div>
                <h1>Créer un Nouvel Article</h1>

                {{-- Le formulaire de création d'article --}}
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf {{-- Directive CSRF pour la sécurité --}}

                    <div class="entete">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" id="title" required minlength="5">
                        {{-- Affichage des erreurs de validation pour le titre --}}
                        @error('title')
                            <p style="color: red; font-size: 0.75em; font-style: italic;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div style="margin-top: 35px">
                    
                     <textarea name="content" id="content" rows="20" cols="145" maxlength="1000" required></textarea>
                        {{-- Affichage des erreurs de validation pour le contenu --}}
                        @error('content')
                            <p style="color: red; font-size: 0.75em; font-style: italic;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="boutton">
                        <button type="submit">
                            Créer l'article
                        </button>
                        <a href="{{ route('articles.index') }}">
                           <button type="submit">   
                             Annuler
                           </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection