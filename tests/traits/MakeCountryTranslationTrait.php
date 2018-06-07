<?php

use Faker\Factory as Faker;
use App\Models\CountryTranslation;
use App\Repositories\CountryTranslationRepository;

trait MakeCountryTranslationTrait
{
    /**
     * Create fake instance of CountryTranslation and save it in database
     *
     * @param array $countryTranslationFields
     * @return CountryTranslation
     */
    public function makeCountryTranslation($countryTranslationFields = [])
    {
        /** @var CountryTranslationRepository $countryTranslationRepo */
        $countryTranslationRepo = App::make(CountryTranslationRepository::class);
        $theme = $this->fakeCountryTranslationData($countryTranslationFields);
        return $countryTranslationRepo->create($theme);
    }

    /**
     * Get fake instance of CountryTranslation
     *
     * @param array $countryTranslationFields
     * @return CountryTranslation
     */
    public function fakeCountryTranslation($countryTranslationFields = [])
    {
        return new CountryTranslation($this->fakeCountryTranslationData($countryTranslationFields));
    }

    /**
     * Get fake data of CountryTranslation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCountryTranslationData($countryTranslationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'country_id' => $fake->randomDigitNotNull,
            'language_id' => $fake->randomDigitNotNull,
            'country_name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $countryTranslationFields);
    }
}
