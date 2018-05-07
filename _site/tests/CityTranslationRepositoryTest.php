<?php

use App\Models\CityTranslation;
use App\Repositories\CityTranslationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityTranslationRepositoryTest extends TestCase
{
    use MakeCityTranslationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CityTranslationRepository
     */
    protected $cityTranslationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cityTranslationRepo = App::make(CityTranslationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCityTranslation()
    {
        $cityTranslation = $this->fakeCityTranslationData();
        $createdCityTranslation = $this->cityTranslationRepo->create($cityTranslation);
        $createdCityTranslation = $createdCityTranslation->toArray();
        $this->assertArrayHasKey('id', $createdCityTranslation);
        $this->assertNotNull($createdCityTranslation['id'], 'Created CityTranslation must have id specified');
        $this->assertNotNull(CityTranslation::find($createdCityTranslation['id']), 'CityTranslation with given id must be in DB');
        $this->assertModelData($cityTranslation, $createdCityTranslation);
    }

    /**
     * @test read
     */
    public function testReadCityTranslation()
    {
        $cityTranslation = $this->makeCityTranslation();
        $dbCityTranslation = $this->cityTranslationRepo->find($cityTranslation->id);
        $dbCityTranslation = $dbCityTranslation->toArray();
        $this->assertModelData($cityTranslation->toArray(), $dbCityTranslation);
    }

    /**
     * @test update
     */
    public function testUpdateCityTranslation()
    {
        $cityTranslation = $this->makeCityTranslation();
        $fakeCityTranslation = $this->fakeCityTranslationData();
        $updatedCityTranslation = $this->cityTranslationRepo->update($fakeCityTranslation, $cityTranslation->id);
        $this->assertModelData($fakeCityTranslation, $updatedCityTranslation->toArray());
        $dbCityTranslation = $this->cityTranslationRepo->find($cityTranslation->id);
        $this->assertModelData($fakeCityTranslation, $dbCityTranslation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCityTranslation()
    {
        $cityTranslation = $this->makeCityTranslation();
        $resp = $this->cityTranslationRepo->delete($cityTranslation->id);
        $this->assertTrue($resp);
        $this->assertNull(CityTranslation::find($cityTranslation->id), 'CityTranslation should not exist in DB');
    }
}
