<?php

namespace Tests\Unit;
use Tests\TestCase;


use Illuminate\Support\Facades\Http;
class ApiConnectsTest extends TestCase
{
    /**
     * Test API integration with a successful response.
     */
    public function test_successful_api_response()
    {
        // Mock a successful API response
        Http::fake([
            'http://api.example.com/data*' => Http::response([
                'status' => 'success',
                'data' => [
                    ['id' => 1, 'name' => 'Test Movie', 'year' => 2024],
                ],
            ], 200),
        ]);

        // Simulate the API request (replace with your actual method)
        $response = $this->get('/api/movies'); // Assuming this endpoint fetches data from the API.

        // Assert that the request was successful
        $response->assertStatus(200);

        // Assert the response structure
        $response->assertJson([
            'status' => 'success',
            'data' => [
                ['id' => 1, 'name' => 'Test Movie', 'year' => 2024],
            ],
        ]);
    }
}
