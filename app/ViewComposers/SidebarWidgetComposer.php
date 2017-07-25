<?php

namespace App\Http\ViewComposers;

use App\Category;

use Illuminate\View\View;

class SidebarWidgetComposer
{
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // calculate the data
        // and share
        $categories = Category::withCount(['posts'=>function($query) {
                $query->where('status',0);
            }])->orderBy('posts_count','desc')->limit(5)->get();
        $view->with('categories', $categories);
    }
}