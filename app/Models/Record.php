<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Record extends Model
{
 
protected $fillable = [
    'calificacion',
    'nota',
    'preguntas',
    'user_id'
    

];
 use HasFactory, Notifiable;
 protected $dates = ['name_field'];

public function user(){
    return $this->belongsTo(User::class);
}


}
