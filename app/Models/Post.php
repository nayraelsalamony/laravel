<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use sluggable ;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    use HasFactory;

    protected $fillable =[
        "title",
        "descreption",
        'user_id',
        'creator',
        'image',
        // 'created_at'
       
    ];
     
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
