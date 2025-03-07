<?php namespace Tests\Repositories;

use App\Models\MonthlyData;
use App\Repositories\MonthlyDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MonthlyDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MonthlyDataRepository
     */
    protected $monthlyDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->monthlyDataRepo = \App::make(MonthlyDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->make()->toArray();

        $createdMonthlyData = $this->monthlyDataRepo->create($monthlyData);

        $createdMonthlyData = $createdMonthlyData->toArray();
        $this->assertArrayHasKey('id', $createdMonthlyData);
        $this->assertNotNull($createdMonthlyData['id'], 'Created MonthlyData must have id specified');
        $this->assertNotNull(MonthlyData::find($createdMonthlyData['id']), 'MonthlyData with given id must be in DB');
        $this->assertModelData($monthlyData, $createdMonthlyData);
    }

    /**
     * @test read
     */
    public function test_read_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->create();

        $dbMonthlyData = $this->monthlyDataRepo->find($monthlyData->id);

        $dbMonthlyData = $dbMonthlyData->toArray();
        $this->assertModelData($monthlyData->toArray(), $dbMonthlyData);
    }

    /**
     * @test update
     */
    public function test_update_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->create();
        $fakeMonthlyData = MonthlyData::factory()->make()->toArray();

        $updatedMonthlyData = $this->monthlyDataRepo->update($fakeMonthlyData, $monthlyData->id);

        $this->assertModelData($fakeMonthlyData, $updatedMonthlyData->toArray());
        $dbMonthlyData = $this->monthlyDataRepo->find($monthlyData->id);
        $this->assertModelData($fakeMonthlyData, $dbMonthlyData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_monthly_data()
    {
        $monthlyData = MonthlyData::factory()->create();

        $resp = $this->monthlyDataRepo->delete($monthlyData->id);

        $this->assertTrue($resp);
        $this->assertNull(MonthlyData::find($monthlyData->id), 'MonthlyData should not exist in DB');
    }
}
