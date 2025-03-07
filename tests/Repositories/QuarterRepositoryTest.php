<?php namespace Tests\Repositories;

use App\Models\Quarter;
use App\Repositories\QuarterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuarterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuarterRepository
     */
    protected $quarterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->quarterRepo = \App::make(QuarterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_quarter()
    {
        $quarter = Quarter::factory()->make()->toArray();

        $createdQuarter = $this->quarterRepo->create($quarter);

        $createdQuarter = $createdQuarter->toArray();
        $this->assertArrayHasKey('id', $createdQuarter);
        $this->assertNotNull($createdQuarter['id'], 'Created Quarter must have id specified');
        $this->assertNotNull(Quarter::find($createdQuarter['id']), 'Quarter with given id must be in DB');
        $this->assertModelData($quarter, $createdQuarter);
    }

    /**
     * @test read
     */
    public function test_read_quarter()
    {
        $quarter = Quarter::factory()->create();

        $dbQuarter = $this->quarterRepo->find($quarter->id);

        $dbQuarter = $dbQuarter->toArray();
        $this->assertModelData($quarter->toArray(), $dbQuarter);
    }

    /**
     * @test update
     */
    public function test_update_quarter()
    {
        $quarter = Quarter::factory()->create();
        $fakeQuarter = Quarter::factory()->make()->toArray();

        $updatedQuarter = $this->quarterRepo->update($fakeQuarter, $quarter->id);

        $this->assertModelData($fakeQuarter, $updatedQuarter->toArray());
        $dbQuarter = $this->quarterRepo->find($quarter->id);
        $this->assertModelData($fakeQuarter, $dbQuarter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_quarter()
    {
        $quarter = Quarter::factory()->create();

        $resp = $this->quarterRepo->delete($quarter->id);

        $this->assertTrue($resp);
        $this->assertNull(Quarter::find($quarter->id), 'Quarter should not exist in DB');
    }
}
