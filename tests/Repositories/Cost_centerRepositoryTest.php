<?php namespace Tests\Repositories;

use App\Models\Cost_center;
use App\Repositories\Cost_centerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Cost_centerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Cost_centerRepository
     */
    protected $costCenterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->costCenterRepo = \App::make(Cost_centerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cost_center()
    {
        $costCenter = Cost_center::factory()->make()->toArray();

        $createdCost_center = $this->costCenterRepo->create($costCenter);

        $createdCost_center = $createdCost_center->toArray();
        $this->assertArrayHasKey('id', $createdCost_center);
        $this->assertNotNull($createdCost_center['id'], 'Created Cost_center must have id specified');
        $this->assertNotNull(Cost_center::find($createdCost_center['id']), 'Cost_center with given id must be in DB');
        $this->assertModelData($costCenter, $createdCost_center);
    }

    /**
     * @test read
     */
    public function test_read_cost_center()
    {
        $costCenter = Cost_center::factory()->create();

        $dbCost_center = $this->costCenterRepo->find($costCenter->id);

        $dbCost_center = $dbCost_center->toArray();
        $this->assertModelData($costCenter->toArray(), $dbCost_center);
    }

    /**
     * @test update
     */
    public function test_update_cost_center()
    {
        $costCenter = Cost_center::factory()->create();
        $fakeCost_center = Cost_center::factory()->make()->toArray();

        $updatedCost_center = $this->costCenterRepo->update($fakeCost_center, $costCenter->id);

        $this->assertModelData($fakeCost_center, $updatedCost_center->toArray());
        $dbCost_center = $this->costCenterRepo->find($costCenter->id);
        $this->assertModelData($fakeCost_center, $dbCost_center->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cost_center()
    {
        $costCenter = Cost_center::factory()->create();

        $resp = $this->costCenterRepo->delete($costCenter->id);

        $this->assertTrue($resp);
        $this->assertNull(Cost_center::find($costCenter->id), 'Cost_center should not exist in DB');
    }
}
