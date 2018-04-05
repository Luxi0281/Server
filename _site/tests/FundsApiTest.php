<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FundsApiTest extends TestCase
{
    use MakefundsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatefunds()
    {
        $funds = $this->fakefundsData();
        $this->json('POST', '/api/v1/funds', $funds);

        $this->assertApiResponse($funds);
    }

    /**
     * @test
     */
    public function testReadfunds()
    {
        $funds = $this->makefunds();
        $this->json('GET', '/api/v1/funds/'.$funds->id);

        $this->assertApiResponse($funds->toArray());
    }

    /**
     * @test
     */
    public function testUpdatefunds()
    {
        $funds = $this->makefunds();
        $editedfunds = $this->fakefundsData();

        $this->json('PUT', '/api/v1/funds/'.$funds->id, $editedfunds);

        $this->assertApiResponse($editedfunds);
    }

    /**
     * @test
     */
    public function testDeletefunds()
    {
        $funds = $this->makefunds();
        $this->json('DELETE', '/api/v1/funds/'.$funds->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/funds/'.$funds->id);

        $this->assertResponseStatus(404);
    }
}
