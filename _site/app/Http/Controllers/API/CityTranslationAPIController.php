<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCityTranslationAPIRequest;
use App\Http\Requests\API\UpdateCityTranslationAPIRequest;
use App\Models\CityTranslation;
use App\Repositories\CityTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CityTranslationController
 * @package App\Http\Controllers\API
 */

class CityTranslationAPIController extends AppBaseController
{
    /** @var  CityTranslationRepository */
    private $cityTranslationRepository;

    public function __construct(CityTranslationRepository $cityTranslationRepo)
    {
        $this->cityTranslationRepository = $cityTranslationRepo;
    }

    /**
     * Display a listing of the CityTranslation.
     * GET|HEAD /cityTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cityTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->cityTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cityTranslations = $this->cityTranslationRepository->all();

        return $this->sendResponse($cityTranslations->toArray(), 'City Translations retrieved successfully');
    }

    /**
     * Store a newly created CityTranslation in storage.
     * POST /cityTranslations
     *
     * @param CreateCityTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCityTranslationAPIRequest $request)
    {
        $input = $request->all();

        $cityTranslations = $this->cityTranslationRepository->create($input);

        return $this->sendResponse($cityTranslations->toArray(), 'City Translation saved successfully');
    }

    /**
     * Display the specified CityTranslation.
     * GET|HEAD /cityTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CityTranslation $cityTranslation */
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            return $this->sendError('City Translation not found');
        }

        return $this->sendResponse($cityTranslation->toArray(), 'City Translation retrieved successfully');
    }

    /**
     * Update the specified CityTranslation in storage.
     * PUT/PATCH /cityTranslations/{id}
     *
     * @param  int $id
     * @param UpdateCityTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var CityTranslation $cityTranslation */
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            return $this->sendError('City Translation not found');
        }

        $cityTranslation = $this->cityTranslationRepository->update($input, $id);

        return $this->sendResponse($cityTranslation->toArray(), 'CityTranslation updated successfully');
    }

    /**
     * Remove the specified CityTranslation from storage.
     * DELETE /cityTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CityTranslation $cityTranslation */
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            return $this->sendError('City Translation not found');
        }

        $cityTranslation->delete();

        return $this->sendResponse($id, 'City Translation deleted successfully');
    }
}
