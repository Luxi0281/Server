<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FundTranslationApiTest extends TestCase
{
    use MakeFundTranslationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFundTranslation()
    {
        $fundTranslation = $this->fakeFundTranslationData();
        $this->json('POST', '/api/v1/fundTranslations', $fundTranslation);

        $this->assertApiResponse($fundTranslation);
    }

    /**
     * @test
     */
    public function testReadFundTranslation()
    {
        $fundTranslation = $this->makeFundTranslation();
        $this->json('GET', '/api/v1/fundTranslations/'.$fundTranslation->id);

        $this->assertApiResponse($fundTranslation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFundTranslation()
    {
        $fundTranslation = $this->makeFundTranslation();
        $editedFundTranslation = $this->fakeFundTranslationData();

        $this->json('PUT', '/api/v1/fundTranslations/'.$fundTranslation->id, $editedFundTranslation);

        $this->assertApiResponse($editedFundTranslation);
    }

    /**
     * @test
     */
    public function testDeleteFundTranslation()
    {
        $fundTranslation = $this->makeFundTranslation();
        $this->json('DELETE', '/api/v1/fundTranslations/'.$fundTranslation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/fundTranslations/'.$fundTranslation->id);

        $this->assertResponseStatus(404);
    }
}
