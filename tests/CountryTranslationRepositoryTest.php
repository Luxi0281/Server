<?php

use App\Models\CountryTranslation;
use App\Repositories\CountryTranslationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTranslationRepositoryTest extends TestCase
{
    use MakeCountryTranslationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CountryTranslationRepository
     */
    protected $countryTranslationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->countryTranslationRepo = App::make(CountryTranslationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCountryTranslation()
    {
        $countryTranslation = $this->fakeCountryTranslationData();
        $createdCountryTranslation = $this->countryTranslationRepo->create($countryTranslation);
        $createdCountryTranslation = $createdCountryTranslation->toArray();
        $this->assertArrayHasKey('id', $createdCountryTranslation);
        $this->assertNotNull($createdCountryTranslation['id'], 'Created CountryTranslation must have id specified');
        $this->assertNotNull(CountryTranslation::find($createdCountryTranslation['id']), 'CountryTranslation with given id must be in DB');
        $this->assertModelData($countryTranslation, $createdCountryTranslation);
    }

    /**
     * @test read
     */
    public function testReadCountryTranslation()
    {
        $countryTranslation = $this->makeCountryTranslation();
        $dbCountryTranslation = $this->countryTranslationRepo->find($countryTranslation->id);
        $dbCountryTranslation = $dbCountryTranslation->toArray();
        $this->assertModelData($countryTranslation->toArray(), $dbCountryTranslation);
    }

    /**
     * @test update
     */
    public function testUpdateCountryTranslation()
    {
        $countryTranslation = $this->makeCountryTranslation();
        $fakeCountryTranslation = $this->fakeCountryTranslationData();
        $updatedCountryTranslation = $this->countryTranslationRepo->update($fakeCountryTranslation, $countryTranslation->id);
        $this->assertModelData($fakeCountryTranslation, $updatedCountryTranslation->toArray());
        $dbCountryTranslation = $this->countryTranslationRepo->find($countryTranslation->id);
        $this->assertModelData($fakeCountryTranslation, $dbCountryTranslation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCountryTranslation()
    {
        $countryTranslation = $this->makeCountryTranslation();
        $resp = $this->countryTranslationRepo->delete($countryTranslation->id);
        $this->assertTrue($resp);
        $this->assertNull(CountryTranslation::find($countryTranslation->id), 'CountryTranslation should not exist in DB');
    }
}
