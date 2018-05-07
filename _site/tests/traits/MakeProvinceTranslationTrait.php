<?php

use Faker\Factory as Faker;
use App\Models\ProvinceTranslation;
use App\Repositories\ProvinceTranslationRepository;

trait MakeProvinceTranslationTrait
{
    /**
     * Create fake instance of ProvinceTranslation and save it in database
     *
     * @param array $provinceTranslationFields
     * @return ProvinceTranslation
     */
    public function makeProvinceTranslation($provinceTranslationFields = [])
    {
        /** @var ProvinceTranslationRepository $provinceTranslationRepo */
        $provinceTranslationRepo = App::make(ProvinceTranslationRepository::class);
        $theme = $this->fakeProvinceTranslationData($provinceTranslationFields);
        return $provinceTranslationRepo->create($theme);
    }

    /**
     * Get fake instance of ProvinceTranslation
     *
     * @param array $provinceTranslationFields
     * @return ProvinceTranslation
     */
    public function fakeProvinceTranslation($provinceTranslationFields = [])
    {
        return new ProvinceTranslation($this->fakeProvinceTranslationData($provinceTranslationFields));
    }

    /**
     * Get fake data of ProvinceTranslation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProvinceTranslationData($provinceTranslationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'province_id' => $fake->randomDigitNotNull,
            'language_id' => $fake->randomDigitNotNull,
            'province_name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $provinceTranslationFields);
    }
}
