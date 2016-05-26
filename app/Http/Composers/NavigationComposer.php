<?php namespace App\Http\Composers;
use Illuminate\Contracts\View\View;

/**
 * Created by PhpStorm.
 * User: Rahaman
 * Date: 25/05/2016
 * Time: 16:51
 */
class NavigationComposer
{
    public function compose(View $view)
    {
        $view->with('latest', \App\Article::latest()->first());
    }

}