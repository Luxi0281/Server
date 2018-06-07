<?php

use Faker\Factory as Faker;
use App\Models\AddressTranslation;
use App\Repositories\AddressTranslationRepository;

trait MakeAddressTranslationTrait
{
    /**
     * Create fake instance of AddressTranslation and save it in database
     *
     * @param array $addressTranslationFields
     * @return AddressTranslation
     */
    public function makeAddressTranslation($addressTranslationFields = [])
    {
        /** @var AddressTranslationRepository $addressTranslationRepo */
        $addressTranslationRepo = App::make(AddressTranslationRepository::class);
        $theme = $this->fakeAddressTranslationData($addressTranslationFields);
        return $addressTranslationRepo->create($theme);
    }

    /**
     * Get fake instance of AddressTranslation
     *
     * @param array $addressTranslationFields
     * @return AddressTranslation
     */
    public function fakeAddressTranslation($addressTranslationFields = [])
    {
        return new AddressTranslation($this->fakeAddressTranslationData($addressTranslationFields));
    }

    /**
     * Get fake data of AddressTranslation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAddressTranslationData($addressTranslationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'address_id' => $fake->randomDigitNotNull,
            'language_id' => $fake->randomDigitNotNull,
            'full_address' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $addressTranslationFields);
    }
}
