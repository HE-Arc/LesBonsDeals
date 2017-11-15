<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Les articles</title>
</head>
<body>
<h1>Article Description</h1>
<p>Article n° {{$article->id}}</p>
<p>Title: {{$article->title}} </p>
<p>Description: {{$article->description}}</p>
<p>Price: {{$article->price}}</p>
<p>Quantity Avaiable: {{$article->quantity}}</p>
<p>Number of view: {{$article->number_of_view}}</p>
<a href="{{route('home')}}">Delete Article</a>
</body>
</html>