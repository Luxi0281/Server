<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCountryTranslationAPIRequest;
use App\Http\Requests\API\UpdateCountryTranslationAPIRequest;
use App\Models\CountryTranslation;
use App\Repositories\CountryTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CountryTranslationController
 * @package App\Http\Controllers\API
 */

class CountryTranslationAPIController extends AppBaseController
{
    /** @var  CountryTranslationRepository */
    private $countryTranslationRepository;

    public function __construct(CountryTranslationRepository $countryTranslationRepo)
    {
        $this->countryTranslationRepository = $countryTranslationRepo;
    }

    /**
     * Display a listing of the CountryTranslation.
     * GET|HEAD /countryTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->countryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->countryTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $countryTranslations = $this->countryTranslationRepository->all();

        return $this->sendResponse($countryTranslations->toArray(), 'Country Translations retrieved successfully');
    }

    /**
     * Store a newly created CountryTranslation in storage.
     * POST /countryTranslations
     *
     * @param CreateCountryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryTranslationAPIRequest $request)
    {
        $input = $request->all();

        $countryTranslations = $this->countryTranslationRepository->create($input);

        return $this->sendResponse($countryTranslations->toArray(), 'Country Translation saved successfully');
    }

    /**
     * Display the specified CountryTranslation.
     * GET|HEAD /countryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CountryTranslation $countryTranslation */
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            return $this->sendError('Country Translation not found');
        }

        return $this->sendResponse($countryTranslation->toArray(), 'Country Translation retrieved successfully');
    }

    /**
     * Update the specified CountryTranslation in storage.
     * PUT/PATCH /countryTranslations/{id}
     *
     * @param  int $id
     * @param UpdateCountryTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var CountryTranslation $countryTranslation */
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            return $this->sendError('Country Translation not found');
        }

        $countryTranslation = $this->countryTranslationRepository->update($input, $id);

        return $this->sendResponse($countryTranslation->toArray(), 'CountryTranslation updated successfully');
    }

    /**
     * Remove the specified CountryTranslation from storage.
     * DELETE /countryTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CountryTranslation $countryTranslation */
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            return $this->sendError('Country Translation not found');
        }

        $countryTranslation->delete();

        return $this->sendResponse($id, 'Country Translation deleted successfully');
    }
}
