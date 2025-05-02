@extends('base')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Événements disponibles</h2>

    @forelse($events as $event)
        <div class="card mb-4 shadow-sm border-light">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ Str::limit($event->description, 150) }}...</p>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="text-muted">
                        <strong>Du :</strong> {{ \Carbon\Carbon::parse($event->start_date)->locale('fr')->isoFormat('D MMMM YYYY') }}
                        <strong>au</strong> {{ \Carbon\Carbon::parse($event->end_date)->locale('fr')->isoFormat('D MMMM YYYY') }}
                    </p>
                </div>
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary bg-primary">Voir & Participer</a>
            </div>
        </div>
    @empty
        <p class="text-center">Aucun événement actif pour le moment.</p>
    @endforelse
</div>

@endsection
