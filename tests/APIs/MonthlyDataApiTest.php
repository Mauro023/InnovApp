<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MonthlyData;

class MonthlyDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/monthly_datas', $monthlyData
        );

        $this->assertApiResponse($monthlyData);
    }

    /**
     * @test
     */
    public function test_read_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/monthly_datas/'.$monthlyData->id
        );

        $this->assertApiResponse($monthlyData->toArray());
    }

    /**
     * @test
     */
    public function test_update_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->create();
        $editedMonthlyData = MonthlyData::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/monthly_datas/'.$monthlyData->id,
            $editedMonthlyData
        );

        $this->assertApiResponse($editedMonthlyData);
    }

    /**
     * @test
     */
    public function test_delete_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/monthly_datas/'.$monthlyData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/monthly_datas/'.$monthlyData->id
        );

        $this->response->assertStatus(404);
    }
}
