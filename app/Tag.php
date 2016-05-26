<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The fillable fields for tags.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    public function articles()
    {
        return $this -> belongsToMany('App\Article');
    }
}
