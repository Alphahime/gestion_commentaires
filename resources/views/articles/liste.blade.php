<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMpTuH4MGN7mtKZ6pZEE48Na/wP19bI1ap6FoH/" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Liste des articles</h1>
        <a href="/ajouter" class="btn btn-primary mb-3">Ajouter un article</a>

        @foreach ($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $article->nom }}</h2>
                <p class="card-text">{{ Str::limit($article->description, 250) }}</p>
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="img-fluid">
                <p><strong>Status :</strong> {{ $article->status ? 'À la une' : 'Récent' }}</p>
                <p><strong>Date de publication :</strong> {{ \Carbon\Carbon::parse($article->date_creation)->format('d/m/Y H:i') }}</p>
                <div class="mt-3">
                    <a href="/modifier/{{ $article->id }}" class="btn btn-warning">Modifier</a>
                    <form action="/supprimer/{{ $article->id }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('articles.details', $article->id) }}" class="btn btn-info">Détails de l'article</a>
                    @if($article->status)
                        <button class="btn btn-warning">
                            <i class="fas fa-star"></i> À la une
                        </button>
                    @endif
                </div>

                <div class="mt-4">
                    <h3>Commentaires</h3>
                    @foreach ($article->commentaires as $commentaire)
                        <div class="card mb-2">
                            <div class="card-body">
                                <p class="card-text">{{ $commentaire->contenu }}</p>
                                <p class="card-text"><small class="text-muted">- {{ $commentaire->nom_complet_auteur }}, {{ \Carbon\Carbon::parse($commentaire->date_heure_creation)->format('d/m/Y H:i') }}</small></p>
                                <a href="/commentaires/{{ $commentaire->id }}/modifier" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="/commentaires/{{ $commentaire->id }}" method="post" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
