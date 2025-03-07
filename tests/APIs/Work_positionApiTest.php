<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Work_position;

class Work_positionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_work_position()
    {
        $workPosition = Work_position::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/work_positions', $workPosition
        );

        $this->assertApiResponse($workPosition);
    }

    /**
     * @test
     */
    public function test_read_work_position()
    {
        $workPosition = Work_position::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/work_positions/'.$workPosition->id
        );

        $this->assertApiResponse($workPosition->toArray());
    }

    /**
     * @test
     */
    public function test_update_work_position()
    {
        $workPosition = Work_position::factory()->create();
        $editedWork_position = Work_position::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/work_positions/'.$workPosition->id,
            $editedWork_position
        );

        $this->assertApiResponse($editedWork_position);
    }

    /**
     * @test
     */
    public function test_delete_work_position()
    {
        $workPosition = Work_position::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/work_positions/'.$workPosition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/work_positions/'.$workPosition->id
        );

        $this->response->assertStatus(404);
    }
}
