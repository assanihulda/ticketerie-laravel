@extends('master')

@section('content')
    <h5 class="mt-5 mb-3">Gestion des événements</h5>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-4">Créer un événement</a>
    <div class="border p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->status }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('events.edit', $event->id) }}"  class="me-3 btn btn-primary">Modifier</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
