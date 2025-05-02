@extends('base')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ $event->title }}</h2>
        <p class="lead text-center">{{ $event->description }}</p>
        <p class="text-muted text-center"><strong>Du :</strong>
            {{ \Carbon\Carbon::parse($event->start_date)->locale('fr')->isoFormat('D MMMM YYYY') }} <strong>au</strong>
            {{ \Carbon\Carbon::parse($event->end_date)->locale('fr')->isoFormat('D MMMM YYYY') }}</p>

        @if (session('primary'))
            <div class="alert alert-primary">{{ session('primary') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($event->participants()->count() >= $event->max_participants)
            <p class="text-danger text-center"><strong>⚠️ Cet événement est complet.</strong></p>
        @else
            <h4 class="text-center mt-4">Participer à cet événement</h4>
            <form method="POST" action="{{ route('events.participate', $event->id) }}" class="w-50 mx-auto">
                @csrf
                <div class="mb-3">
                    <label for="last_name" class="form-label">Nom</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Prénom</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
            </form>
        @endif
    </div>

@endsection
