<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;


class Post extends Model
{
   use Notifiable;
   use Searchable;
  
 
   protected $table = 'posts';
   protected $primaryKey = 'id';
   public $timestamps = true;



   protected $fillable = [
        'user_id', 'title', 'description', 'file_path', 'client_name' , 'client_ext', 'hash_name'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
      'id'=>$this ->id,
      'title'=>$this ->title,
      'description'=>$this ->description,
      'client_name'=>$this ->client_name

             
        ];
    }


}