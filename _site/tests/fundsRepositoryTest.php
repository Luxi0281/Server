<?php

use App\Models\funds;
use App\Repositories\fundsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class fundsRepositoryTest extends TestCase
{
    use MakefundsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var fundsRepository
     */
    protected $fundsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fundsRepo = App::make(fundsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatefunds()
    {
        $funds = $this->fakefundsData();
        $createdfunds = $this->fundsRepo->create($funds);
        $createdfunds = $createdfunds->toArray();
        $this->assertArrayHasKey('id', $createdfunds);
        $this->assertNotNull($createdfunds['id'], 'Created funds must have id specified');
        $this->assertNotNull(funds::find($createdfunds['id']), 'funds with given id must be in DB');
        $this->assertModelData($funds, $createdfunds);
    }

    /**
     * @test read
     */
    public function testReadfunds()
    {
        $funds = $this->makefunds();
        $dbfunds = $this->fundsRepo->find($funds->id);
        $dbfunds = $dbfunds->toArray();
        $this->assertModelData($funds->toArray(), $dbfunds);
    }

    /**
     * @test update
     */
    public function testUpdatefunds()
    {
        $funds = $this->makefunds();
        $fakefunds = $this->fakefundsData();
        $updatedfunds = $this->fundsRepo->update($fakefunds, $funds->id);
        $this->assertModelData($fakefunds, $updatedfunds->toArray());
        $dbfunds = $this->fundsRepo->find($funds->id);
        $this->assertModelData($fakefunds, $dbfunds->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletefunds()
    {
        $funds = $this->makefunds();
        $resp = $this->fundsRepo->delete($funds->id);
        $this->assertTrue($resp);
        $this->assertNull(funds::find($funds->id), 'funds should not exist in DB');
    }
}
