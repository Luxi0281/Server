<?php

use Faker\Factory as Faker;
use App\Models\Fund;
use App\Repositories\FundRepository;

trait MakeFundTrait
{
    /**
     * Create fake instance of Fund and save it in database
     *
     * @param array $fundFields
     * @return Fund
     */
    public function makeFund($fundFields = [])
    {
        /** @var FundRepository $fundRepo */
        $fundRepo = App::make(FundRepository::class);
        $theme = $this->fakeFundData($fundFields);
        return $fundRepo->create($theme);
    }

    /**
     * Get fake instance of Fund
     *
     * @param array $fundFields
     * @return Fund
     */
    public function fakeFund($fundFields = [])
    {
        return new Fund($this->fakeFundData($fundFields));
    }

    /**
     * Get fake data of Fund
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFundData($fundFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'picture' => $fake->word,
            'link' => $fake->word,
            'email' => $fake->word,
            'phone' => $fake->word,
            'location_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $fundFields);
    }
}
