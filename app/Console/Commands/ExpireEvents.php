<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class ExpireEvents extends Command
{
    protected $signature = 'events:expire';
    protected $description = 'Expire les événements terminés à 23h59 chaque jour';

    public function handle()
    {
        $now = Carbon::now();

        // Cherche les événements qui ont une date de fin aujourd’hui et sont encore actifs
        $events = Event::whereDate('end_date', $now->toDateString())
                       ->where('status', 'active')
                       ->get();

        foreach ($events as $event) {
            // Si on est après 23h59 de la date de fin => on expire
            if ($now->greaterThanOrEqualTo(Carbon::parse($event->end_date)->endOfDay())) {
                $event->update(['status' => 'expired']);
                $this->info("Événement expiré : " . $event->title);
            }
        }

        return 0;
    }
}
