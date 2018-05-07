<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAddressTranslationAPIRequest;
use App\Http\Requests\API\UpdateAddressTranslationAPIRequest;
use App\Models\AddressTranslation;
use App\Repositories\AddressTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AddressTranslationController
 * @package App\Http\Controllers\API
 */

class AddressTranslationAPIController extends AppBaseController
{
    /** @var  AddressTranslationRepository */
    private $addressTranslationRepository;

    public function __construct(AddressTranslationRepository $addressTranslationRepo)
    {
        $this->addressTranslationRepository = $addressTranslationRepo;
    }

    /**
     * Display a listing of the AddressTranslation.
     * GET|HEAD /addressTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->addressTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->addressTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $addressTranslations = $this->addressTranslationRepository->all();

        return $this->sendResponse($addressTranslations->toArray(), 'Address Translations retrieved successfully');
    }

    /**
     * Store a newly created AddressTranslation in storage.
     * POST /addressTranslations
     *
     * @param CreateAddressTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressTranslationAPIRequest $request)
    {
        $input = $request->all();

        $addressTranslations = $this->addressTranslationRepository->create($input);

        return $this->sendResponse($addressTranslations->toArray(), 'Address Translation saved successfully');
    }

    /**
     * Display the specified AddressTranslation.
     * GET|HEAD /addressTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AddressTranslation $addressTranslation */
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            return $this->sendError('Address Translation not found');
        }

        return $this->sendResponse($addressTranslation->toArray(), 'Address Translation retrieved successfully');
    }

    /**
     * Update the specified AddressTranslation in storage.
     * PUT/PATCH /addressTranslations/{id}
     *
     * @param  int $id
     * @param UpdateAddressTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var AddressTranslation $addressTranslation */
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            return $this->sendError('Address Translation not found');
        }

        $addressTranslation = $this->addressTranslationRepository->update($input, $id);

        return $this->sendResponse($addressTranslation->toArray(), 'AddressTranslation updated successfully');
    }

    /**
     * Remove the specified AddressTranslation from storage.
     * DELETE /addressTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AddressTranslation $addressTranslation */
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            return $this->sendError('Address Translation not found');
        }

        $addressTranslation->delete();

        return $this->sendResponse($id, 'Address Translation deleted successfully');
    }
}
