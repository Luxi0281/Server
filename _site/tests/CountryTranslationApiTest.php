<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTranslationApiTest extends TestCase
{
    use MakeCountryTranslationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCountryTranslation()
    {
        $countryTranslation = $this->fakeCountryTranslationData();
        $this->json('POST', '/api/v1/countryTranslations', $countryTranslation);

        $this->assertApiResponse($countryTranslation);
    }

    /**
     * @test
     */
    public function testReadCountryTranslation()
    {
        $countryTranslation = $this->makeCountryTranslation();
        $this->json('GET', '/api/v1/countryTranslations/'.$countryTranslation->id);

        $this->assertApiResponse($countryTranslation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCountryTranslation()
    {
        $countryTranslation = $this->makeCountryTranslation();
        $editedCountryTranslation = $this->fakeCountryTranslationData();

        $this->json('PUT', '/api/v1/countryTranslations/'.$countryTranslation->id, $editedCountryTranslation);

        $this->assertApiResponse($editedCountryTranslation);
    }

    /**
     * @test
     */
    public function testDeleteCountryTranslation()
    {
        $countryTranslation = $this->makeCountryTranslation();
        $this->json('DELETE', '/api/v1/countryTranslations/'.$countryTranslation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/countryTranslations/'.$countryTranslation->id);

        $this->assertResponseStatus(404);
    }
}
