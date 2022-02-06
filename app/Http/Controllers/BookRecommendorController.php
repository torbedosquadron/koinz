<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubmitReadingIntervalRequest;
use App\Models\PageRead;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Libraries\AmazonSMSProvider;
use App\Libraries\InfopipSMSProvider;
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

        $PageRead->save();

        // the credentials should be put in .env file
        // but for ease of use and it will not be commited 
        // it is hard coded in this class.
        // $SMSProvider = new AmazonSMSProvider('anonymous', 'mEwUoo21UNSfSpLgXqhmG0pPNDa0');
        // $SMSProvider->SMS("Thank you for your feedback");

        throw new CustomException('Exception Caught:: Data Not Saved', 400); 
        $SMSProvider = new InfopipSMSProvider('anonymous', 'password', 'mEwUoo21UNSfSpLgXqhmG0pPNDa0');
        $SMSProvider->SMS("Thank you for your feedback");

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
