<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressTranslationRequest;
use App\Http\Requests\UpdateAddressTranslationRequest;
use App\Repositories\AddressTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AddressTranslationController extends AppBaseController
{
    /** @var  AddressTranslationRepository */
    private $addressTranslationRepository;

    public function __construct(AddressTranslationRepository $addressTranslationRepo)
    {
        $this->addressTranslationRepository = $addressTranslationRepo;
    }

    /**
     * Display a listing of the AddressTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->addressTranslationRepository->pushCriteria(new RequestCriteria($request));
        $addressTranslations = $this->addressTranslationRepository->all();

        return view('address_translations.index')
            ->with('addressTranslations', $addressTranslations);
    }

    /**
     * Show the form for creating a new AddressTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('address_translations.create');
    }

    /**
     * Store a newly created AddressTranslation in storage.
     *
     * @param CreateAddressTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressTranslationRequest $request)
    {
        $input = $request->all();

        $addressTranslation = $this->addressTranslationRepository->create($input);

        Flash::success('Address Translation saved successfully.');

        return redirect(route('addressTranslations.index'));
    }

    /**
     * Display the specified AddressTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            Flash::error('Address Translation not found');

            return redirect(route('addressTranslations.index'));
        }

        return view('address_translations.show')->with('addressTranslation', $addressTranslation);
    }

    /**
     * Show the form for editing the specified AddressTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            Flash::error('Address Translation not found');

            return redirect(route('addressTranslations.index'));
        }

        return view('address_translations.edit')->with('addressTranslation', $addressTranslation);
    }

    /**
     * Update the specified AddressTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateAddressTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressTranslationRequest $request)
    {
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            Flash::error('Address Translation not found');

            return redirect(route('addressTranslations.index'));
        }

        $addressTranslation = $this->addressTranslationRepository->update($request->all(), $id);

        Flash::success('Address Translation updated successfully.');

        return redirect(route('addressTranslations.index'));
    }

    /**
     * Remove the specified AddressTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $addressTranslation = $this->addressTranslationRepository->findWithoutFail($id);

        if (empty($addressTranslation)) {
            Flash::error('Address Translation not found');

            return redirect(route('addressTranslations.index'));
        }

        $this->addressTranslationRepository->delete($id);

        Flash::success('Address Translation deleted successfully.');

        return redirect(route('addressTranslations.index'));
    }
}
