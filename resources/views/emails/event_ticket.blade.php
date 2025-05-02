@extends('master')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Votre ticket pour l'événement</title>
</head>
<body>
    <h1>{{ $event_title }}</h1>
    <p>Merci de vous être inscrit à cet événement. Voici votre ticket :</p>
    <p><strong>Code du ticket : </strong>{{ $ticket_code }}</p>
    <p><strong>Date de l'événement : </strong>{{ $event_date }}</p>
</body>
</html>

@endsection