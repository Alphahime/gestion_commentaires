<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Détails de l'article</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Détails de l'article</h1>
        <p><strong>Nom :</strong> {{ $article->nom }}</p>
        <p><strong>Description :</strong> {{ $article->description }}</p>
        <a href="/articles" class="btn btn-secondary mb-3">Revenir à la liste des articles</a>

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

            <form action="/articles/{{ $article->id }}/commentaires" method="post" class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="nom_complet_auteur">Votre nom:</label>
                    <input type="text" id="nom_complet_auteur" name="nom_complet_auteur" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contenu">Commentaire:</label>
                    <textarea id="contenu" name="contenu" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Ajouter le commentaire</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
