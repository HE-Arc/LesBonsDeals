<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Articles</title>
</head>
<body>
<h1>All articles</h1>
@foreach($articles as $article)
    <div class="row">
        <div class="col-md-12">
            <p><strong>{{$article->title}}</strong></p>
            <p>Description: {{$article->description}}</p>
            <p>price: {{$article->price}}</p>
            <p><a href="{{route('article.show',['id' => $article->id])}}">More détails</a></p>
        </div>
    </div>
@endforeach
</body>
</html>