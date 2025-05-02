@extends('master')
@section('content')
    <h5 class="mt-5 text-primary">Création d'un evènement</h5>
    <div class="p-3 mt-4 border">
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Titre </label>
                <input type="text" class="form-control" name="title" placeholder="Titre">
                @error('title')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description:</label>

                <textarea class="form-control" name="description"  rows="3"></textarea>
            </div>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Date de début </label>
                <input type="datetime-local" name="start_date" class="form-control">
            </div>
            @error('start_date')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label class="form-label">Date de fin:</label>
                <input type="datetime-local" name="end_date" class="form-control">
            </div>
            @error('end_date')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="status" required class="form-select">
                    <option value="active">Actif</option>
                    <option value="expired">Expiré</option>
                </select>
            </div>
            @error('status')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Participants max </label>
                <input type="number" class="form-control"name="max_participants" placeholder="0">
            </div>
            @error('max_participants')
                <p style="color: red;">{{ $message }}</p>
            @enderror


            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary ">Créer l'événement</button>

            </div>
        </form>

    </div>
@endsection
