<!-- details.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails de l'article</title>
</head>
<body>
    <h1>Détails de l'article</h1>
    <p><strong>Nom :</strong> {{ $article->nom }}</p>
    <p><strong>Description :</strong> {{ $article->description }}</p>
   
</body>
</html>
