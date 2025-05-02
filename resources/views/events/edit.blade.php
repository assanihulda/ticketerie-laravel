@extends('master')
@section('content')
    <h5 class="mt-5 text-primary">Création d'un evènement</h5>
    <div class="p-3 mt-4 border">
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Titre </label>
                <input type="text" class="form-control"name="title" placeholder="Titre"
                    value="{{ old('title', $event->title) }}">
                @error('title')
                    <p style="color: red;">{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>

                <textarea name="description" class="form-control" rows="3"  value="">{{ old('description', $event->description) }}</textarea>
            </div>
            @error('description')
                <p style="color:
                red;">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Date de début </label>
                <input type="datetime-local" name="start_date" class="form-control"
                    value="{{ old('start_date', $event->start_date) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Date de fin:</label>
                <input type="datetime-local" name="end_date" class="form-control"
                    value="{{ old('end_date', $event->end_date) }}">
            </div>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="status" required class="form-select" value="{{ old('status', $event->status) }}">
                    <option value="active">Actif</option>
                    <option value="expired">Expiré</option>
                </select>
            </div>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Participants max </label>
                <input type="number" class="form-control"name="max_participants" placeholder="0"
                    value="{{ old('max_participants', $event->max_participants) }}">
            </div>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror


            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary ">Créer l'événement</button>

            </div>
        </form>

    </div>
@endsection
