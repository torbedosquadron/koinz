<?php

namespace App\Observers;

use App\Models\PageRead;
use App\Models\Book;
use Illuminate\Support\Str;


class PageReadObserver
{
    /**
     * Handle the PageRead "created" event.
     *
     * @param  \App\Models\PageRead  $pageRead
     * @return void
     */
    public function created(PageRead $pageRead)
    {
        $Book = Book::find($pageRead->book_id);

        if( $Book->read_pages_interval == "" ) {
            $FinalCollection    = collect()->range($pageRead->start_page, $pageRead->end_page);
        } else {
            $DatabaseCollection = Str::of($Book->read_pages_interval)->explode(', ');
            $RangeCollection    = collect()->range($pageRead->start_page, $pageRead->end_page);

            $FinalCollection    = $DatabaseCollection->merge($RangeCollection)->unique()->sort();
        }

        $Book->read_pages_num      = $FinalCollection->implode(', ');
        $Book->read_pages_interval = $FinalCollection->count();
        $Book->save();
    }

    /**
     * Handle the PageRead "updated" event.
     *
     * @param  \App\Models\PageRead  $pageRead
     * @return void
     */
    public function updated(PageRead $pageRead)
    {
        //
    }

    /**
     * Handle the PageRead "deleted" event.
     *
     * @param  \App\Models\PageRead  $pageRead
     * @return void
     */
    public function deleted(PageRead $pageRead)
    {
        //
    }

    /**
     * Handle the PageRead "restored" event.
     *
     * @param  \App\Models\PageRead  $pageRead
     * @return void
     */
    public function restored(PageRead $pageRead)
    {
        //
    }

    /**
     * Handle the PageRead "force deleted" event.
     *
     * @param  \App\Models\PageRead  $pageRead
     * @return void
     */
    public function forceDeleted(PageRead $pageRead)
    {
        //
    }
}
