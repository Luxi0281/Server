<?php

use App\Models\AddressTranslation;
use App\Repositories\AddressTranslationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddressTranslationRepositoryTest extends TestCase
{
    use MakeAddressTranslationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AddressTranslationRepository
     */
    protected $addressTranslationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->addressTranslationRepo = App::make(AddressTranslationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAddressTranslation()
    {
        $addressTranslation = $this->fakeAddressTranslationData();
        $createdAddressTranslation = $this->addressTranslationRepo->create($addressTranslation);
        $createdAddressTranslation = $createdAddressTranslation->toArray();
        $this->assertArrayHasKey('id', $createdAddressTranslation);
        $this->assertNotNull($createdAddressTranslation['id'], 'Created AddressTranslation must have id specified');
        $this->assertNotNull(AddressTranslation::find($createdAddressTranslation['id']), 'AddressTranslation with given id must be in DB');
        $this->assertModelData($addressTranslation, $createdAddressTranslation);
    }

    /**
     * @test read
     */
    public function testReadAddressTranslation()
    {
        $addressTranslation = $this->makeAddressTranslation();
        $dbAddressTranslation = $this->addressTranslationRepo->find($addressTranslation->id);
        $dbAddressTranslation = $dbAddressTranslation->toArray();
        $this->assertModelData($addressTranslation->toArray(), $dbAddressTranslation);
    }

    /**
     * @test update
     */
    public function testUpdateAddressTranslation()
    {
        $addressTranslation = $this->makeAddressTranslation();
        $fakeAddressTranslation = $this->fakeAddressTranslationData();
        $updatedAddressTranslation = $this->addressTranslationRepo->update($fakeAddressTranslation, $addressTranslation->id);
        $this->assertModelData($fakeAddressTranslation, $updatedAddressTranslation->toArray());
        $dbAddressTranslation = $this->addressTranslationRepo->find($addressTranslation->id);
        $this->assertModelData($fakeAddressTranslation, $dbAddressTranslation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAddressTranslation()
    {
        $addressTranslation = $this->makeAddressTranslation();
        $resp = $this->addressTranslationRepo->delete($addressTranslation->id);
        $this->assertTrue($resp);
        $this->assertNull(AddressTranslation::find($addressTranslation->id), 'AddressTranslation should not exist in DB');
    }
}
