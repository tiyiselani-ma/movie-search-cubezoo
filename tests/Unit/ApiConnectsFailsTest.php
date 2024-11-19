<?php

namespace Tests\Unit;

use Tests\TestCase;

class ApiConnectsFailsTest extends TestCase
{
    /**
     * A basic unit test example.
     */    
    public function test_failed_api_response()
    {
        // Mock a failed API response
        Http::fake([
            'http://www.omdbapi.com/*' => Http::response(null, 500),
        ]);

        // Simulate the API request to your endpoint
        $response = $this->get('/api/movies');

        // Assert the request failed
        $response->assertStatus(500);

        // Assert the error structure
        $response->assertJson([
            'status' => 'error',
            'message' => 'Failed to fetch data from the API.',
        ]);
    }
}
