<?php

use Faker\Factory as Faker;
use App\Models\CityTranslation;
use App\Repositories\CityTranslationRepository;

trait MakeCityTranslationTrait
{
    /**
     * Create fake instance of CityTranslation and save it in database
     *
     * @param array $cityTranslationFields
     * @return CityTranslation
     */
    public function makeCityTranslation($cityTranslationFields = [])
    {
        /** @var CityTranslationRepository $cityTranslationRepo */
        $cityTranslationRepo = App::make(CityTranslationRepository::class);
        $theme = $this->fakeCityTranslationData($cityTranslationFields);
        return $cityTranslationRepo->create($theme);
    }

    /**
     * Get fake instance of CityTranslation
     *
     * @param array $cityTranslationFields
     * @return CityTranslation
     */
    public function fakeCityTranslation($cityTranslationFields = [])
    {
        return new CityTranslation($this->fakeCityTranslationData($cityTranslationFields));
    }

    /**
     * Get fake data of CityTranslation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCityTranslationData($cityTranslationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'city_id' => $fake->randomDigitNotNull,
            'language_id' => $fake->randomDigitNotNull,
            'city_name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cityTranslationFields);
    }
}
