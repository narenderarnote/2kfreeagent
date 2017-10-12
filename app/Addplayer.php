<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Addplayer extends Model
{
	use Notifiable;
      protected $fillable = [
        'name', 'position','platform','timezone','primary_skills','secondary_skills','current_rating','description','bronze_badge','silver_badge','gold_badge','fame_badge','file_uploads','mic','game_mode','youtube_link','avaliable_time','gametag'
    ];
    public function user(){    
    	return $this->belongsTo('App\User', 'player_adder_id');
    }
}
