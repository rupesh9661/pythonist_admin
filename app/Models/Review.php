<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $table="reviews";
   protected $guarded = [];
   public function tutorial(){
      return $this->hasOne(Tutorial::class,'id','tutorial_id');

   }
   public function tutorialepisode(){
      return $this->hasOne(TutorialEpisode::class,'id','tutorial_episode_id');

   }
}
