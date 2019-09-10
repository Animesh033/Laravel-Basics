<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    // use SoftDeletes; // Commented it at the time of getting post after form submitting because this line was giving error as PHP Version installed on my this PC is 7.2.2 but need here is 7.1.*

    protected $dates = ['deleted_at'];
    //
    // protected $table = 'posts';
    // protected $primaryKey = 'post_is';
    protected $fillable = [
        'title',
        'content',
        'path',
    ];
    public $directory = "/images/";

    public function user()
    {
        return $this->belongsTo('App\User'); //post_id by default
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    // Query Scope
    public static function scopeLatest($query)
    {
        return $query->orderBy('id','asc')->get();
    }

    // Accessors
    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }

    // Mutators
    // public function setNameAttribute($name)
    // {
    //     $this->attributes['name'] =  strtoupper($name);
    // }
}
