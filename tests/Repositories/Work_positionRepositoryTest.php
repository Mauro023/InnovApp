<?php namespace Tests\Repositories;

use App\Models\Work_position;
use App\Repositories\Work_positionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Work_positionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Work_positionRepository
     */
    protected $workPositionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->workPositionRepo = \App::make(Work_positionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_work_position()
    {
        $workPosition = Work_position::factory()->make()->toArray();

        $createdWork_position = $this->workPositionRepo->create($workPosition);

        $createdWork_position = $createdWork_position->toArray();
        $this->assertArrayHasKey('id', $createdWork_position);
        $this->assertNotNull($createdWork_position['id'], 'Created Work_position must have id specified');
        $this->assertNotNull(Work_position::find($createdWork_position['id']), 'Work_position with given id must be in DB');
        $this->assertModelData($workPosition, $createdWork_position);
    }

    /**
     * @test read
     */
    public function test_read_work_position()
    {
        $workPosition = Work_position::factory()->create();

        $dbWork_position = $this->workPositionRepo->find($workPosition->id);

        $dbWork_position = $dbWork_position->toArray();
        $this->assertModelData($workPosition->toArray(), $dbWork_position);
    }

    /**
     * @test update
     */
    public function test_update_work_position()
    {
        $workPosition = Work_position::factory()->create();
        $fakeWork_position = Work_position::factory()->make()->toArray();

        $updatedWork_position = $this->workPositionRepo->update($fakeWork_position, $workPosition->id);

        $this->assertModelData($fakeWork_position, $updatedWork_position->toArray());
        $dbWork_position = $this->workPositionRepo->find($workPosition->id);
        $this->assertModelData($fakeWork_position, $dbWork_position->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_work_position()
    {
        $workPosition = Work_position::factory()->create();

        $resp = $this->workPositionRepo->delete($workPosition->id);

        $this->assertTrue($resp);
        $this->assertNull(Work_position::find($workPosition->id), 'Work_position should not exist in DB');
    }
}
