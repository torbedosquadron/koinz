<?php

namespace App\Observers;

use App\Models\PageRead;
use App\Models\Book;

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
        $PagesInterval = PageRead::where('book_id', $pageRead->book_id)->get();

        $PageRanges = $PagesInterval->map(function ($item, $key) {
            return collect()->range($item->start_page, $item->end_page);
        });

        $readPages = $PageRanges->collapse()->unique()->count();

        $PagesInterval = Book::where('id', $pageRead->book_id)->update(['read_pages_num' => $readPages]);
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
