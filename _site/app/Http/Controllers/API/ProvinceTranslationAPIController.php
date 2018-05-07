<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProvinceTranslationAPIRequest;
use App\Http\Requests\API\UpdateProvinceTranslationAPIRequest;
use App\Models\ProvinceTranslation;
use App\Repositories\ProvinceTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProvinceTranslationController
 * @package App\Http\Controllers\API
 */

class ProvinceTranslationAPIController extends AppBaseController
{
    /** @var  ProvinceTranslationRepository */
    private $provinceTranslationRepository;

    public function __construct(ProvinceTranslationRepository $provinceTranslationRepo)
    {
        $this->provinceTranslationRepository = $provinceTranslationRepo;
    }

    /**
     * Display a listing of the ProvinceTranslation.
     * GET|HEAD /provinceTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provinceTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->provinceTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $provinceTranslations = $this->provinceTranslationRepository->all();

        return $this->sendResponse($provinceTranslations->toArray(), 'Province Translations retrieved successfully');
    }

    /**
     * Store a newly created ProvinceTranslation in storage.
     * POST /provinceTranslations
     *
     * @param CreateProvinceTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinceTranslationAPIRequest $request)
    {
        $input = $request->all();

        $provinceTranslations = $this->provinceTranslationRepository->create($input);

        return $this->sendResponse($provinceTranslations->toArray(), 'Province Translation saved successfully');
    }

    /**
     * Display the specified ProvinceTranslation.
     * GET|HEAD /provinceTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProvinceTranslation $provinceTranslation */
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            return $this->sendError('Province Translation not found');
        }

        return $this->sendResponse($provinceTranslation->toArray(), 'Province Translation retrieved successfully');
    }

    /**
     * Update the specified ProvinceTranslation in storage.
     * PUT/PATCH /provinceTranslations/{id}
     *
     * @param  int $id
     * @param UpdateProvinceTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvinceTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProvinceTranslation $provinceTranslation */
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            return $this->sendError('Province Translation not found');
        }

        $provinceTranslation = $this->provinceTranslationRepository->update($input, $id);

        return $this->sendResponse($provinceTranslation->toArray(), 'ProvinceTranslation updated successfully');
    }

    /**
     * Remove the specified ProvinceTranslation from storage.
     * DELETE /provinceTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProvinceTranslation $provinceTranslation */
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            return $this->sendError('Province Translation not found');
        }

        $provinceTranslation->delete();

        return $this->sendResponse($id, 'Province Translation deleted successfully');
    }
}
