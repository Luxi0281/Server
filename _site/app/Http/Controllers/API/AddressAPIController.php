<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAddressAPIRequest;
use App\Http\Requests\API\UpdateAddressAPIRequest;
use App\Models\Address;
use App\Repositories\AddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AddressController
 * @package App\Http\Controllers\API
 */

class AddressAPIController extends AppBaseController
{
    /** @var  AddressRepository */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    /**
     * Display a listing of the Address.
     * GET|HEAD /addresses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->addressRepository->pushCriteria(new RequestCriteria($request));
        $this->addressRepository->pushCriteria(new LimitOffsetCriteria($request));
        $addresses = $this->addressRepository->all();

        return $this->sendResponse($addresses->toArray(), 'Addresses retrieved successfully');
    }

    /**
     * Store a newly created Address in storage.
     * POST /addresses
     *
     * @param CreateAddressAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressAPIRequest $request)
    {
        $input = $request->all();

        $addresses = $this->addressRepository->create($input);

        return $this->sendResponse($addresses->toArray(), 'Address saved successfully');
    }

    /**
     * Display the specified Address.
     * GET|HEAD /addresses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Address $address */
        $address = $this->addressRepository->findWithoutFail($id);

        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        return $this->sendResponse($address->toArray(), 'Address retrieved successfully');
    }

    /**
     * Update the specified Address in storage.
     * PUT/PATCH /addresses/{id}
     *
     * @param  int $id
     * @param UpdateAddressAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressAPIRequest $request)
    {
        $input = $request->all();

        /** @var Address $address */
        $address = $this->addressRepository->findWithoutFail($id);

        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        $address = $this->addressRepository->update($input, $id);

        return $this->sendResponse($address->toArray(), 'Address updated successfully');
    }

    /**
     * Remove the specified Address from storage.
     * DELETE /addresses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Address $address */
        $address = $this->addressRepository->findWithoutFail($id);

        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        $address->delete();

        return $this->sendResponse($id, 'Address deleted successfully');
    }
}
