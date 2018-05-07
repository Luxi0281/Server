<?php

use App\Models\FundTranslation;
use App\Repositories\FundTranslationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FundTranslationRepositoryTest extends TestCase
{
    use MakeFundTranslationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FundTranslationRepository
     */
    protected $fundTranslationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fundTranslationRepo = App::make(FundTranslationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFundTranslation()
    {
        $fundTranslation = $this->fakeFundTranslationData();
        $createdFundTranslation = $this->fundTranslationRepo->create($fundTranslation);
        $createdFundTranslation = $createdFundTranslation->toArray();
        $this->assertArrayHasKey('id', $createdFundTranslation);
        $this->assertNotNull($createdFundTranslation['id'], 'Created FundTranslation must have id specified');
        $this->assertNotNull(FundTranslation::find($createdFundTranslation['id']), 'FundTranslation with given id must be in DB');
        $this->assertModelData($fundTranslation, $createdFundTranslation);
    }

    /**
     * @test read
     */
    public function testReadFundTranslation()
    {
        $fundTranslation = $this->makeFundTranslation();
        $dbFundTranslation = $this->fundTranslationRepo->find($fundTranslation->id);
        $dbFundTranslation = $dbFundTranslation->toArray();
        $this->assertModelData($fundTranslation->toArray(), $dbFundTranslation);
    }

    /**
     * @test update
     */
    public function testUpdateFundTranslation()
    {
        $fundTranslation = $this->makeFundTranslation();
        $fakeFundTranslation = $this->fakeFundTranslationData();
        $updatedFundTranslation = $this->fundTranslationRepo->update($fakeFundTranslation, $fundTranslation->id);
        $this->assertModelData($fakeFundTranslation, $updatedFundTranslation->toArray());
        $dbFundTranslation = $this->fundTranslationRepo->find($fundTranslation->id);
        $this->assertModelData($fakeFundTranslation, $dbFundTranslation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFundTranslation()
    {
        $fundTranslation = $this->makeFundTranslation();
        $resp = $this->fundTranslationRepo->delete($fundTranslation->id);
        $this->assertTrue($resp);
        $this->assertNull(FundTranslation::find($fundTranslation->id), 'FundTranslation should not exist in DB');
    }
}
