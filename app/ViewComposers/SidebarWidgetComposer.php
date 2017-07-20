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

        $categories = Category::withCount('posts')->orderBy('posts_count','desc')->get();
        $view->with('categories', $categories);
    }
}