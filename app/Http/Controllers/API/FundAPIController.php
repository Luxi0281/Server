<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFundAPIRequest;
use App\Http\Requests\API\UpdateFundAPIRequest;
use App\Models\Fund;
use App\Repositories\FundRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FundController
 * @package App\Http\Controllers\API
 */

class FundAPIController extends AppBaseController
{
    /** @var  FundRepository */
    private $fundRepository;

    public function __construct(FundRepository $fundRepo)
    {
        $this->fundRepository = $fundRepo;
    }

    /**
     * Display a listing of the Fund.
     * GET|HEAD /funds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundRepository->pushCriteria(new RequestCriteria($request));
        $this->fundRepository->pushCriteria(new LimitOffsetCriteria($request));
        $funds = $this->fundRepository->all();

        return $this->sendResponse($funds->toArray(), 'Funds retrieved successfully');
    }

    /**
     * Store a newly created Fund in storage.
     * POST /funds
     *
     * @param CreateFundAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFundAPIRequest $request)
    {
        $input = $request->all();

        $funds = $this->fundRepository->create($input);

        return $this->sendResponse($funds->toArray(), 'Fund saved successfully');
    }

    /**
     * Display the specified Fund.
     * GET|HEAD /funds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Fund $fund */
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            return $this->sendError('Fund not found');
        }

        return $this->sendResponse($fund->toArray(), 'Fund retrieved successfully');
    }

    /**
     * Update the specified Fund in storage.
     * PUT/PATCH /funds/{id}
     *
     * @param  int $id
     * @param UpdateFundAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundAPIRequest $request)
    {
        $input = $request->all();

        /** @var Fund $fund */
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            return $this->sendError('Fund not found');
        }

        $fund = $this->fundRepository->update($input, $id);

        return $this->sendResponse($fund->toArray(), 'Fund updated successfully');
    }

    /**
     * Remove the specified Fund from storage.
     * DELETE /funds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Fund $fund */
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            return $this->sendError('Fund not found');
        }

        $fund->delete();

        return $this->sendResponse($id, 'Fund deleted successfully');
    }
}
