<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFundTranslationAPIRequest;
use App\Http\Requests\API\UpdateFundTranslationAPIRequest;
use App\Models\FundTranslation;
use App\Repositories\FundTranslationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FundTranslationController
 * @package App\Http\Controllers\API
 */

class FundTranslationAPIController extends AppBaseController
{
    /** @var  FundTranslationRepository */
    private $fundTranslationRepository;

    public function __construct(FundTranslationRepository $fundTranslationRepo)
    {
        $this->fundTranslationRepository = $fundTranslationRepo;
    }

    /**
     * Display a listing of the FundTranslation.
     * GET|HEAD /fundTranslations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundTranslationRepository->pushCriteria(new RequestCriteria($request));
        $this->fundTranslationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $fundTranslations = $this->fundTranslationRepository->all();

        return $this->sendResponse($fundTranslations->toArray(), 'Fund Translations retrieved successfully');
    }

    /**
     * Store a newly created FundTranslation in storage.
     * POST /fundTranslations
     *
     * @param CreateFundTranslationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFundTranslationAPIRequest $request)
    {
        $input = $request->all();

        $fundTranslations = $this->fundTranslationRepository->create($input);

        return $this->sendResponse($fundTranslations->toArray(), 'Fund Translation saved successfully');
    }

    /**
     * Display the specified FundTranslation.
     * GET|HEAD /fundTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FundTranslation $fundTranslation */
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            return $this->sendError('Fund Translation not found');
        }

        return $this->sendResponse($fundTranslation->toArray(), 'Fund Translation retrieved successfully');
    }

    /**
     * Update the specified FundTranslation in storage.
     * PUT/PATCH /fundTranslations/{id}
     *
     * @param  int $id
     * @param UpdateFundTranslationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundTranslationAPIRequest $request)
    {
        $input = $request->all();

        /** @var FundTranslation $fundTranslation */
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            return $this->sendError('Fund Translation not found');
        }

        $fundTranslation = $this->fundTranslationRepository->update($input, $id);

        return $this->sendResponse($fundTranslation->toArray(), 'FundTranslation updated successfully');
    }

    /**
     * Remove the specified FundTranslation from storage.
     * DELETE /fundTranslations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FundTranslation $fundTranslation */
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            return $this->sendError('Fund Translation not found');
        }

        $fundTranslation->delete();

        return $this->sendResponse($id, 'Fund Translation deleted successfully');
    }
}
