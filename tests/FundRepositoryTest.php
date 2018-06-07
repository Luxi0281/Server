<?php

use App\Models\Fund;
use App\Repositories\FundRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FundRepositoryTest extends TestCase
{
    use MakeFundTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FundRepository
     */
    protected $fundRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fundRepo = App::make(FundRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFund()
    {
        $fund = $this->fakeFundData();
        $createdFund = $this->fundRepo->create($fund);
        $createdFund = $createdFund->toArray();
        $this->assertArrayHasKey('id', $createdFund);
        $this->assertNotNull($createdFund['id'], 'Created Fund must have id specified');
        $this->assertNotNull(Fund::find($createdFund['id']), 'Fund with given id must be in DB');
        $this->assertModelData($fund, $createdFund);
    }

    /**
     * @test read
     */
    public function testReadFund()
    {
        $fund = $this->makeFund();
        $dbFund = $this->fundRepo->find($fund->id);
        $dbFund = $dbFund->toArray();
        $this->assertModelData($fund->toArray(), $dbFund);
    }

    /**
     * @test update
     */
    public function testUpdateFund()
    {
        $fund = $this->makeFund();
        $fakeFund = $this->fakeFundData();
        $updatedFund = $this->fundRepo->update($fakeFund, $fund->id);
        $this->assertModelData($fakeFund, $updatedFund->toArray());
        $dbFund = $this->fundRepo->find($fund->id);
        $this->assertModelData($fakeFund, $dbFund->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFund()
    {
        $fund = $this->makeFund();
        $resp = $this->fundRepo->delete($fund->id);
        $this->assertTrue($resp);
        $this->assertNull(Fund::find($fund->id), 'Fund should not exist in DB');
    }
}
