<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityTranslationRequest;
use App\Http\Requests\UpdateCityTranslationRequest;
use App\Repositories\CityTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CityTranslationController extends AppBaseController
{
    /** @var  CityTranslationRepository */
    private $cityTranslationRepository;

    public function __construct(CityTranslationRepository $cityTranslationRepo)
    {
        $this->cityTranslationRepository = $cityTranslationRepo;
    }

    /**
     * Display a listing of the CityTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cityTranslationRepository->pushCriteria(new RequestCriteria($request));
        $cityTranslations = $this->cityTranslationRepository->all();

        return view('city_translations.index')
            ->with('cityTranslations', $cityTranslations);
    }

    /**
     * Show the form for creating a new CityTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('city_translations.create');
    }

    /**
     * Store a newly created CityTranslation in storage.
     *
     * @param CreateCityTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateCityTranslationRequest $request)
    {
        $input = $request->all();

        $cityTranslation = $this->cityTranslationRepository->create($input);

        Flash::success('City Translation saved successfully.');

        return redirect(route('cityTranslations.index'));
    }

    /**
     * Display the specified CityTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            Flash::error('City Translation not found');

            return redirect(route('cityTranslations.index'));
        }

        return view('city_translations.show')->with('cityTranslation', $cityTranslation);
    }

    /**
     * Show the form for editing the specified CityTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            Flash::error('City Translation not found');

            return redirect(route('cityTranslations.index'));
        }

        return view('city_translations.edit')->with('cityTranslation', $cityTranslation);
    }

    /**
     * Update the specified CityTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateCityTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityTranslationRequest $request)
    {
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            Flash::error('City Translation not found');

            return redirect(route('cityTranslations.index'));
        }

        $cityTranslation = $this->cityTranslationRepository->update($request->all(), $id);

        Flash::success('City Translation updated successfully.');

        return redirect(route('cityTranslations.index'));
    }

    /**
     * Remove the specified CityTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cityTranslation = $this->cityTranslationRepository->findWithoutFail($id);

        if (empty($cityTranslation)) {
            Flash::error('City Translation not found');

            return redirect(route('cityTranslations.index'));
        }

        $this->cityTranslationRepository->delete($id);

        Flash::success('City Translation deleted successfully.');

        return redirect(route('cityTranslations.index'));
    }
}
