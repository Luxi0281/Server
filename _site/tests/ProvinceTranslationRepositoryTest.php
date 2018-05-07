<?php

use App\Models\ProvinceTranslation;
use App\Repositories\ProvinceTranslationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinceTranslationRepositoryTest extends TestCase
{
    use MakeProvinceTranslationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProvinceTranslationRepository
     */
    protected $provinceTranslationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->provinceTranslationRepo = App::make(ProvinceTranslationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProvinceTranslation()
    {
        $provinceTranslation = $this->fakeProvinceTranslationData();
        $createdProvinceTranslation = $this->provinceTranslationRepo->create($provinceTranslation);
        $createdProvinceTranslation = $createdProvinceTranslation->toArray();
        $this->assertArrayHasKey('id', $createdProvinceTranslation);
        $this->assertNotNull($createdProvinceTranslation['id'], 'Created ProvinceTranslation must have id specified');
        $this->assertNotNull(ProvinceTranslation::find($createdProvinceTranslation['id']), 'ProvinceTranslation with given id must be in DB');
        $this->assertModelData($provinceTranslation, $createdProvinceTranslation);
    }

    /**
     * @test read
     */
    public function testReadProvinceTranslation()
    {
        $provinceTranslation = $this->makeProvinceTranslation();
        $dbProvinceTranslation = $this->provinceTranslationRepo->find($provinceTranslation->id);
        $dbProvinceTranslation = $dbProvinceTranslation->toArray();
        $this->assertModelData($provinceTranslation->toArray(), $dbProvinceTranslation);
    }

    /**
     * @test update
     */
    public function testUpdateProvinceTranslation()
    {
        $provinceTranslation = $this->makeProvinceTranslation();
        $fakeProvinceTranslation = $this->fakeProvinceTranslationData();
        $updatedProvinceTranslation = $this->provinceTranslationRepo->update($fakeProvinceTranslation, $provinceTranslation->id);
        $this->assertModelData($fakeProvinceTranslation, $updatedProvinceTranslation->toArray());
        $dbProvinceTranslation = $this->provinceTranslationRepo->find($provinceTranslation->id);
        $this->assertModelData($fakeProvinceTranslation, $dbProvinceTranslation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProvinceTranslation()
    {
        $provinceTranslation = $this->makeProvinceTranslation();
        $resp = $this->provinceTranslationRepo->delete($provinceTranslation->id);
        $this->assertTrue($resp);
        $this->assertNull(ProvinceTranslation::find($provinceTranslation->id), 'ProvinceTranslation should not exist in DB');
    }
}
