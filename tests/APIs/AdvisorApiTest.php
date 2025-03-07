<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Advisor;

class AdvisorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_advisor()
    {
        $advisor = Advisor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/advisors', $advisor
        );

        $this->assertApiResponse($advisor);
    }

    /**
     * @test
     */
    public function test_read_advisor()
    {
        $advisor = Advisor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/advisors/'.$advisor->id
        );

        $this->assertApiResponse($advisor->toArray());
    }

    /**
     * @test
     */
    public function test_update_advisor()
    {
        $advisor = Advisor::factory()->create();
        $editedAdvisor = Advisor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/advisors/'.$advisor->id,
            $editedAdvisor
        );

        $this->assertApiResponse($editedAdvisor);
    }

    /**
     * @test
     */
    public function test_delete_advisor()
    {
        $advisor = Advisor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/advisors/'.$advisor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/advisors/'.$advisor->id
        );

        $this->response->assertStatus(404);
    }
}
