<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un commentaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Modifier un commentaire</h1>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="/commentaires/{{ $commentaire->id }}" method="post" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom_complet_auteur">Nom complet de l'auteur:</label>
                <input type="text" id="nom_complet_auteur" name="nom_complet_auteur" class="form-control" value="{{ $commentaire->nom_complet_auteur }}" required>
            </div>
            <div class="form-group">
                <label for="contenu">Commentaire:</label>
                <textarea id="contenu" name="contenu" class="form-control" required>{{ $commentaire->contenu }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="/articles" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
