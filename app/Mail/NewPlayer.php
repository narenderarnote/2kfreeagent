<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPlayer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $player;
    public function __construct($player)
    {
         $this->player = $player;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //echo "<pre>";
    // print_r($this->player);
     //exit;
        return $this->view('email.add-player')->with([
                        'name' => $this->player->name,
                        'position' => $this->player->position,
                        'gametag' => $this->player->gametag,
                        'timezone' => $this->player->timezone,
                        'primary_skills' => $this->player->primary_skills,
                        'secondary_skills' => $this->player->secondary_skills,
                        'current_rating' => $this->player->current_rating,
                        'bronze_badge' => $this->player->bronze_badge,
                        'silver_badge' => $this->player->silver_badge,
                        'gold_badge' => $this->player->gold_badge,
                        'fame_badge' => $this->player->fame_badge,
                        'player_adder_id' => $this->player->player_adder_id,
                        'id' => $this->player->id,
                        'image' => $this->player->file_uploads,
                    ]);
    }
}
