<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cost_center;

class Cost_centerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cost_center()
    {
        $costCenter = Cost_center::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cost_centers', $costCenter
        );

        $this->assertApiResponse($costCenter);
    }

    /**
     * @test
     */
    public function test_read_cost_center()
    {
        $costCenter = Cost_center::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cost_centers/'.$costCenter->id
        );

        $this->assertApiResponse($costCenter->toArray());
    }

    /**
     * @test
     */
    public function test_update_cost_center()
    {
        $costCenter = Cost_center::factory()->create();
        $editedCost_center = Cost_center::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cost_centers/'.$costCenter->id,
            $editedCost_center
        );

        $this->assertApiResponse($editedCost_center);
    }

    /**
     * @test
     */
    public function test_delete_cost_center()
    {
        $costCenter = Cost_center::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cost_centers/'.$costCenter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cost_centers/'.$costCenter->id
        );

        $this->response->assertStatus(404);
    }
}
