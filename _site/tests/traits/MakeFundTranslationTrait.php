<?php

use Faker\Factory as Faker;
use App\Models\FundTranslation;
use App\Repositories\FundTranslationRepository;

trait MakeFundTranslationTrait
{
    /**
     * Create fake instance of FundTranslation and save it in database
     *
     * @param array $fundTranslationFields
     * @return FundTranslation
     */
    public function makeFundTranslation($fundTranslationFields = [])
    {
        /** @var FundTranslationRepository $fundTranslationRepo */
        $fundTranslationRepo = App::make(FundTranslationRepository::class);
        $theme = $this->fakeFundTranslationData($fundTranslationFields);
        return $fundTranslationRepo->create($theme);
    }

    /**
     * Get fake instance of FundTranslation
     *
     * @param array $fundTranslationFields
     * @return FundTranslation
     */
    public function fakeFundTranslation($fundTranslationFields = [])
    {
        return new FundTranslation($this->fakeFundTranslationData($fundTranslationFields));
    }

    /**
     * Get fake data of FundTranslation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFundTranslationData($fundTranslationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fund_id' => $fake->randomDigitNotNull,
            'language_id' => $fake->randomDigitNotNull,
            'title' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $fundTranslationFields);
    }
}
