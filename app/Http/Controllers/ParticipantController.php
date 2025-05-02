<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Participant;
use App\Http\Requests\RegisterParticipantRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventTicketMail;

class ParticipantController extends Controller

{

    public function index()
    {
        $participants = Participant::all();
        return view('events.participants', compact('participants'));
    } 

    public function create()
    {
        return view('events.public.create');
    }


    public function store(RegisterParticipantRequest $request, Event $event)
    {

    // Vérifier si l'événement est complet
    if ($event->participants()->count() >= $event->max_participants) {
        return back()->withErrors(['message' => 'L\'événement est déjà complet.']);
    }

    // Créer un participant avec un code de ticket unique
    $participant = Participant::create([
        'event_id'    => $event->id,
        'first_name'  => $request->first_name,
        'last_name'   => $request->last_name,
        'email'       => $request->email,
        'ticket_code' => strtoupper(Str::uuid()),
    ]);
    Mail::to($participant->email)->send(new EventTicketMail($participant));

    return back()->with('primary', 'Votre inscription a été enregistrée. Vous recevrez bientôt un e-mail avec votre ticket.');


    }
}

