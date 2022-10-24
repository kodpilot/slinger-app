<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\categories;

class CategoryObserver
{
    /**
     * Handle the categories "created" event.
     *
     * @param  \App\Models\categories  $categories
     * @return void
     */
    public function created(categories $categories)
    {
        //
        $categories->slug = Str::slug($categories->name.' '.$categories->id);
        $categories->saveQuietly();
    }

    /**
     * Handle the categories "updated" event.
     *
     * @param  \App\Models\categories  $categories
     * @return void
     */
    public function updated(categories $categories)
    {
        //
    }

    /**
     * Handle the categories "deleted" event.
     *
     * @param  \App\Models\categories  $categories
     * @return void
     */
    public function deleted(categories $categories)
    {
        //
    }

    /**
     * Handle the categories "restored" event.
     *
     * @param  \App\Models\categories  $categories
     * @return void
     */
    public function restored(categories $categories)
    {
        //
    }

    /**
     * Handle the categories "force deleted" event.
     *
     * @param  \App\Models\categories  $categories
     * @return void
     */
    public function forceDeleted(categories $categories)
    {
        //
    }
}
