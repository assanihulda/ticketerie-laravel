namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Participant  $participant
     * @return void
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Votre ticket pour l\'événement')
                    ->view('emails.event_ticket')
                    ->with([
                        'ticket_code' => $this->participant->ticket_code,
                        'event_title' => $this->participant->event->title,
                        'event_date'  => $this->participant->event->start_date,
                    ]);
    }
}
