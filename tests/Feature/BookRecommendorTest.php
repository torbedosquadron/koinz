<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookRecommendorTest extends TestCase
{
    public function test_recommend_books()
    {
        $response = $this->get('/api/recommendedBooks');

        $response->assertStatus(200);
    }

    public function test_making_recommended_books_request()
    {
        $response = $this->get('/api/recommendedBooks');

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => "success"
            ]);
    }



    public function test_read_page_interval()
    {
        $response = $this->post('/api/readPageInterval');

        $response->assertStatus(200);
    }

    public function test_making_read_page_interval_request()
    {
        $response = $this->postJson('/api/readPageInterval', 
            [
            "user_id" => "1",
            "book_id" => "1",
            "start_page" => 1,
            "end_page" => 10
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => "success",
            ]);
    }

    public function test_making_wrong_read_page_interval_request()
    {
        $response = $this->postJson('/api/readPageInterval', 
            [
            "user_id" => "1",
            "book_id" => "1",
            "start_page" => 5,
            "end_page" => 3
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 400,
                'message' => "fail (validation errors)",
                "data" =>  ["end_page" => ["A end_page should greater than or equal to start_page"]]
            ]);
    }
}
