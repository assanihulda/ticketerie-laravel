@extends('master')

@section('content')
    <h5 class="mt-5 mb-3">Liste des participants</h5>
    <div class="border p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participants as $event)
                    <tr>
                        <td>{{ $event->first_name }}</td>
                        <td>{{ $event->last_name }}</td>
                        <td>{{ $event->email }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
