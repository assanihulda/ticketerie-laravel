<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Models\Participant;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function publicIndex()
    {
        // On récupère uniquement les événements actifs
        $events = Event::where('status', 'active')
                       ->whereDate('end_date', '>=', now())
                       ->orderBy('start_date')
                       ->get();

        return view('events.public.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

   // Enregistrement d’un événement
    public function store( StoreEventRequest $request)
    {

        Event::create($request->validated());
        return redirect()->route('events.index')->with('primary', 'Événement créé avec succès');

    }

    // Formulaire d’édition (admin)
    public function edit(Event $event)

    {
        return view('events.edit', compact('event'));
    }
  // Mise à jour d’un événement
    public function update(StoreEventRequest $request, Event $event)

    {
        $event->update($request->validated());
        return redirect()->route('events.index')->with('primary', 'Événement mis à jour');
    }

      // Suppression logique (on change le statut ou un flag soft delete personnalisé)
    public function destroy(Event $event)
    {
        $event->update(['status' => 'expired']);
        return redirect()->route('events.index')->with('primary', 'Événement supprimé');
    }

    // Liste des participants d’un événement (admin)
    public function participants(Event $event)
    {
        $participants = $event->participants()->latest()->get();
        return view('admin.events.participants', compact('event', 'participants'));
    }

    // Statistiques des événements
    public function statistics()
    {
        $events = Event::withCount('participants')->get();
        return view('admin.statistics', compact('events'));
    }

      public function show(Event $event)
    {
        // Empêcher d'afficher les événements expirés
        if ($event->status !== 'active') {
            abort(404);
        }

        return view('events.public.create', compact('event'));
    }



}

