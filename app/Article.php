<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     *
     * @var array
     */
    protected $fillable = ['title','body','published_at', 'user_id'];

    /**
     *
     * @var array
     */
    protected $dates = ['published_at'];


    /**
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query -> where('published_at', '<=', Carbon::now());
    }

    /**
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query -> where('published_at', '>', Carbon::now());
    }

    /**
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); //Carbon::parse();
    }

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Get a list of tag ids associated with the current article.
     * @return array
     */
    public function getTagListAttribute(){
        return $this->tags->lists('id')->all();
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this-> belongsToMany('App\Tag')->withTimestamps();
    }
}
