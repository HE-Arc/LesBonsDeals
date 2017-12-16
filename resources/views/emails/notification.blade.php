<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/mail.css')}}">
</head>
<body>
<div id="content">
    <img src="{{secure_asset('images/mail/email_header.png')}}"/>
    <div id="mail-body">
        <h2>Article: {{$article->title}} </h2>
        <h3>Notification:</h3>
        @yield('notification')
        <div id="footer">
            <hr>
            LesBonsDeals.ch
        </div>
    </div>
</div>
</body>
</html>