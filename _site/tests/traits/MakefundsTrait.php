<?php

use Faker\Factory as Faker;
use App\Models\Fund;
use App\Repositories\FundsRepository;

trait MakefundsTrait
{
    /**
     * Create fake instance of funds and save it in database
     *
     * @param array $fundsFields
     * @return Fund
     */
    public function makefunds($fundsFields = [])
    {
        /** @var FundsRepository $fundsRepo */
        $fundsRepo = App::make(FundsRepository::class);
        $theme = $this->fakefundsData($fundsFields);
        return $fundsRepo->create($theme);
    }

    /**
     * Get fake instance of funds
     *
     * @param array $fundsFields
     * @return Fund
     */
    public function fakefunds($fundsFields = [])
    {
        return new Fund($this->fakefundsData($fundsFields));
    }

    /**
     * Get fake data of funds
     *
     * @param array $postFields
     * @return array
     */
    public function fakefundsData($fundsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'description' => $fake->text,
            'logo' => $fake->word,
            'picture' => $fake->word,
            'link' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $fundsFields);
    }
}
