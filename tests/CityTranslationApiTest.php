<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityTranslationApiTest extends TestCase
{
    use MakeCityTranslationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCityTranslation()
    {
        $cityTranslation = $this->fakeCityTranslationData();
        $this->json('POST', '/api/v1/cityTranslations', $cityTranslation);

        $this->assertApiResponse($cityTranslation);
    }

    /**
     * @test
     */
    public function testReadCityTranslation()
    {
        $cityTranslation = $this->makeCityTranslation();
        $this->json('GET', '/api/v1/cityTranslations/'.$cityTranslation->id);

        $this->assertApiResponse($cityTranslation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCityTranslation()
    {
        $cityTranslation = $this->makeCityTranslation();
        $editedCityTranslation = $this->fakeCityTranslationData();

        $this->json('PUT', '/api/v1/cityTranslations/'.$cityTranslation->id, $editedCityTranslation);

        $this->assertApiResponse($editedCityTranslation);
    }

    /**
     * @test
     */
    public function testDeleteCityTranslation()
    {
        $cityTranslation = $this->makeCityTranslation();
        $this->json('DELETE', '/api/v1/cityTranslations/'.$cityTranslation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cityTranslations/'.$cityTranslation->id);

        $this->assertResponseStatus(404);
    }
}
