<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddressTranslationApiTest extends TestCase
{
    use MakeAddressTranslationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAddressTranslation()
    {
        $addressTranslation = $this->fakeAddressTranslationData();
        $this->json('POST', '/api/v1/addressTranslations', $addressTranslation);

        $this->assertApiResponse($addressTranslation);
    }

    /**
     * @test
     */
    public function testReadAddressTranslation()
    {
        $addressTranslation = $this->makeAddressTranslation();
        $this->json('GET', '/api/v1/addressTranslations/'.$addressTranslation->id);

        $this->assertApiResponse($addressTranslation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAddressTranslation()
    {
        $addressTranslation = $this->makeAddressTranslation();
        $editedAddressTranslation = $this->fakeAddressTranslationData();

        $this->json('PUT', '/api/v1/addressTranslations/'.$addressTranslation->id, $editedAddressTranslation);

        $this->assertApiResponse($editedAddressTranslation);
    }

    /**
     * @test
     */
    public function testDeleteAddressTranslation()
    {
        $addressTranslation = $this->makeAddressTranslation();
        $this->json('DELETE', '/api/v1/addressTranslations/'.$addressTranslation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/addressTranslations/'.$addressTranslation->id);

        $this->assertResponseStatus(404);
    }
}
