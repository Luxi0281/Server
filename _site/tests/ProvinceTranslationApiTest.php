<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinceTranslationApiTest extends TestCase
{
    use MakeProvinceTranslationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProvinceTranslation()
    {
        $provinceTranslation = $this->fakeProvinceTranslationData();
        $this->json('POST', '/api/v1/provinceTranslations', $provinceTranslation);

        $this->assertApiResponse($provinceTranslation);
    }

    /**
     * @test
     */
    public function testReadProvinceTranslation()
    {
        $provinceTranslation = $this->makeProvinceTranslation();
        $this->json('GET', '/api/v1/provinceTranslations/'.$provinceTranslation->id);

        $this->assertApiResponse($provinceTranslation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProvinceTranslation()
    {
        $provinceTranslation = $this->makeProvinceTranslation();
        $editedProvinceTranslation = $this->fakeProvinceTranslationData();

        $this->json('PUT', '/api/v1/provinceTranslations/'.$provinceTranslation->id, $editedProvinceTranslation);

        $this->assertApiResponse($editedProvinceTranslation);
    }

    /**
     * @test
     */
    public function testDeleteProvinceTranslation()
    {
        $provinceTranslation = $this->makeProvinceTranslation();
        $this->json('DELETE', '/api/v1/provinceTranslations/'.$provinceTranslation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/provinceTranslations/'.$provinceTranslation->id);

        $this->assertResponseStatus(404);
    }
}
