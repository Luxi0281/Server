<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FundApiTest extends TestCase
{
    use MakeFundTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFund()
    {
        $fund = $this->fakeFundData();
        $this->json('POST', '/api/v1/funds', $fund);

        $this->assertApiResponse($fund);
    }

    /**
     * @test
     */
    public function testReadFund()
    {
        $fund = $this->makeFund();
        $this->json('GET', '/api/v1/funds/'.$fund->id);

        $this->assertApiResponse($fund->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFund()
    {
        $fund = $this->makeFund();
        $editedFund = $this->fakeFundData();

        $this->json('PUT', '/api/v1/funds/'.$fund->id, $editedFund);

        $this->assertApiResponse($editedFund);
    }

    /**
     * @test
     */
    public function testDeleteFund()
    {
        $fund = $this->makeFund();
        $this->json('DELETE', '/api/v1/funds/'.$fund->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/funds/'.$fund->id);

        $this->assertResponseStatus(404);
    }
}
