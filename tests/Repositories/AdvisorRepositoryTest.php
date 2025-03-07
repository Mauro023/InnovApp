<?php namespace Tests\Repositories;

use App\Models\Advisor;
use App\Repositories\AdvisorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AdvisorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AdvisorRepository
     */
    protected $advisorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->advisorRepo = \App::make(AdvisorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_advisor()
    {
        $advisor = Advisor::factory()->make()->toArray();

        $createdAdvisor = $this->advisorRepo->create($advisor);

        $createdAdvisor = $createdAdvisor->toArray();
        $this->assertArrayHasKey('id', $createdAdvisor);
        $this->assertNotNull($createdAdvisor['id'], 'Created Advisor must have id specified');
        $this->assertNotNull(Advisor::find($createdAdvisor['id']), 'Advisor with given id must be in DB');
        $this->assertModelData($advisor, $createdAdvisor);
    }

    /**
     * @test read
     */
    public function test_read_advisor()
    {
        $advisor = Advisor::factory()->create();

        $dbAdvisor = $this->advisorRepo->find($advisor->id);

        $dbAdvisor = $dbAdvisor->toArray();
        $this->assertModelData($advisor->toArray(), $dbAdvisor);
    }

    /**
     * @test update
     */
    public function test_update_advisor()
    {
        $advisor = Advisor::factory()->create();
        $fakeAdvisor = Advisor::factory()->make()->toArray();

        $updatedAdvisor = $this->advisorRepo->update($fakeAdvisor, $advisor->id);

        $this->assertModelData($fakeAdvisor, $updatedAdvisor->toArray());
        $dbAdvisor = $this->advisorRepo->find($advisor->id);
        $this->assertModelData($fakeAdvisor, $dbAdvisor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_advisor()
    {
        $advisor = Advisor::factory()->create();

        $resp = $this->advisorRepo->delete($advisor->id);

        $this->assertTrue($resp);
        $this->assertNull(Advisor::find($advisor->id), 'Advisor should not exist in DB');
    }
}
