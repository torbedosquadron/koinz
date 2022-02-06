<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubmitReadingIntervalRequest;
use App\Models\PageRead;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Libraries\SMSGeneric;
use App\Exceptions\CustomException;


class BookRecommendorController extends Controller
{
    /**
     * API to submit a user reading interval
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubmitReadingInterval (SubmitReadingIntervalRequest $request)
    {
        
        $PageRead = new PageRead;

        $PageRead->user_id    = $request->user_id;
        $PageRead->book_id    = $request->book_id;
        $PageRead->start_page = $request->start_page;
        $PageRead->end_page   = $request->end_page;

        $saved = $PageRead->save();

        if(!$saved){
            throw new CustomException('Exception Caught:: Data Not Saved', 400); 
        }

        SMSGeneric::SMSSendGeneric('Infopip', 'Thanks for your submission.');
        // or other sms provider
        // SMSGeneric::SMSSendGeneric('Amazon', 'Thanks for your submission.');

        return response()->json([
            'status'  => 200,
            'message' => 'success'
        ]);
    } 
    
    /**
     * API to Calculate the most recommended five books
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetRecommendedBooks (Request $request)
    {
        $Books = Book::orderByDesc('read_pages_num')->take(5)->get();

        return response()->json([
            'status'       => 200,
            'message'      => 'success',
            'data'         =>  BookResource::collection($Books),
        ]);
    }
}
