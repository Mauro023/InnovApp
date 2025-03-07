<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Quarter;

class QuarterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_quarter()
    {
        $quarter = Quarter::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/quarters', $quarter
        );

        $this->assertApiResponse($quarter);
    }

    /**
     * @test
     */
    public function test_read_quarter()
    {
        $quarter = Quarter::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/quarters/'.$quarter->id
        );

        $this->assertApiResponse($quarter->toArray());
    }

    /**
     * @test
     */
    public function test_update_quarter()
    {
        $quarter = Quarter::factory()->create();
        $editedQuarter = Quarter::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/quarters/'.$quarter->id,
            $editedQuarter
        );

        $this->assertApiResponse($editedQuarter);
    }

    /**
     * @test
     */
    public function test_delete_quarter()
    {
        $quarter = Quarter::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/quarters/'.$quarter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/quarters/'.$quarter->id
        );

        $this->response->assertStatus(404);
    }
}
