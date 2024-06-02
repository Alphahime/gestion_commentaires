<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Ajouter un article</h1>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="/ajouter/traitement" method="post" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de l'article:</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image de l'article:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status de l'article:</label><br>
                <input type="radio" id="recent" name="status" value="0" checked>
                <label for="recent">Récent</label><br>
                <input type="radio" id="a_la_une" name="status" value="1">
                <label for="a_la_une">À la une</label>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="/articles" class="btn btn-secondary">Revenir à la liste des articles</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
