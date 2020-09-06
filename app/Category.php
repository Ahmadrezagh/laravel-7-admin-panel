<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;
    protected $fillable = ['name' , 'parent_id' , 'slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }
}
