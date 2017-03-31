<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
   use Notifiable;

       protected $fillable = [
        'user_id', 'title', 'description', 'file_path', 'client_name' , 'client_ext', 'hash_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

