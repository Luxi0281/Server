<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountryTranslationRequest;
use App\Http\Requests\UpdateCountryTranslationRequest;
use App\Repositories\CountryTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CountryTranslationController extends AppBaseController
{
    /** @var  CountryTranslationRepository */
    private $countryTranslationRepository;

    public function __construct(CountryTranslationRepository $countryTranslationRepo)
    {
        $this->countryTranslationRepository = $countryTranslationRepo;
    }

    /**
     * Display a listing of the CountryTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->countryTranslationRepository->pushCriteria(new RequestCriteria($request));
        $countryTranslations = $this->countryTranslationRepository->all();

        return view('country_translations.index')
            ->with('countryTranslations', $countryTranslations);
    }

    /**
     * Show the form for creating a new CountryTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('country_translations.create');
    }

    /**
     * Store a newly created CountryTranslation in storage.
     *
     * @param CreateCountryTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryTranslationRequest $request)
    {
        $input = $request->all();

        $countryTranslation = $this->countryTranslationRepository->create($input);

        Flash::success('Country Translation saved successfully.');

        return redirect(route('countryTranslations.index'));
    }

    /**
     * Display the specified CountryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            Flash::error('Country Translation not found');

            return redirect(route('countryTranslations.index'));
        }

        return view('country_translations.show')->with('countryTranslation', $countryTranslation);
    }

    /**
     * Show the form for editing the specified CountryTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            Flash::error('Country Translation not found');

            return redirect(route('countryTranslations.index'));
        }

        return view('country_translations.edit')->with('countryTranslation', $countryTranslation);
    }

    /**
     * Update the specified CountryTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateCountryTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryTranslationRequest $request)
    {
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            Flash::error('Country Translation not found');

            return redirect(route('countryTranslations.index'));
        }

        $countryTranslation = $this->countryTranslationRepository->update($request->all(), $id);

        Flash::success('Country Translation updated successfully.');

        return redirect(route('countryTranslations.index'));
    }

    /**
     * Remove the specified CountryTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countryTranslation = $this->countryTranslationRepository->findWithoutFail($id);

        if (empty($countryTranslation)) {
            Flash::error('Country Translation not found');

            return redirect(route('countryTranslations.index'));
        }

        $this->countryTranslationRepository->delete($id);

        Flash::success('Country Translation deleted successfully.');

        return redirect(route('countryTranslations.index'));
    }
}
