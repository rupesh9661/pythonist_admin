<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialEpisode extends Model
{
   protected $table="tutorial_episodes";
   protected $guarded = [];
   public function tutorial(){
      return $this->hasOne(Tutorial::class,'id','tutorial_id');
   }
}
