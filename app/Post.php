<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    //
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = ['title','description','content','image'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
