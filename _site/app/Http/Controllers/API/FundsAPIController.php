<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFundAPIRequest;
use App\Http\Requests\API\UpdateFundAPIRequest;
use App\Models\Fund;
use App\Repositories\FundsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class fundsController
 * @package App\Http\Controllers\API
 */

class FundsAPIController extends AppBaseController
{
    /** @var  FundsRepository */
    private $fundsRepository;

    public function __construct(FundsRepository $fundsRepo)
    {
        $this->fundsRepository = $fundsRepo;
    }

    /**
     * Display a listing of the funds.
     * GET|HEAD /funds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundsRepository->pushCriteria(new RequestCriteria($request));
        $this->fundsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $funds = $this->fundsRepository->all();

        return $this->sendResponse($funds->toArray(), 'Funds retrieved successfully');
    }

    /**
     * Store a newly created funds in storage.
     * POST /funds
     *
     * @param CreateFundAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFundAPIRequest $request)
    {
        $input = $request->all();

        $funds = $this->fundsRepository->create($input);

        return $this->sendResponse($funds->toArray(), 'Funds saved successfully');
    }

    /**
     * Display the specified funds.
     * GET|HEAD /funds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Fund $funds */
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            return $this->sendError('Fund not found');
        }

        return $this->sendResponse($funds->toArray(), 'Fund retrieved successfully');
    }

    /**
     * Update the specified funds in storage.
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

        /** @var Fund $funds */
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            return $this->sendError('Fund not found');
        }

        $funds = $this->fundsRepository->update($input, $id);

        return $this->sendResponse($funds->toArray(), 'Fund updated successfully');
    }

    /**
     * Remove the specified funds from storage.
     * DELETE /funds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Fund $funds */
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            return $this->sendError('Fund not found');
        }

        $funds->delete();

        return $this->sendResponse($id, 'Fund deleted successfully');
    }
}
