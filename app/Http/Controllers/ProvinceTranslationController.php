<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProvinceTranslationRequest;
use App\Http\Requests\UpdateProvinceTranslationRequest;
use App\Repositories\ProvinceTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProvinceTranslationController extends AppBaseController
{
    /** @var  ProvinceTranslationRepository */
    private $provinceTranslationRepository;

    public function __construct(ProvinceTranslationRepository $provinceTranslationRepo)
    {
        $this->provinceTranslationRepository = $provinceTranslationRepo;
    }

    /**
     * Display a listing of the ProvinceTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provinceTranslationRepository->pushCriteria(new RequestCriteria($request));
        $provinceTranslations = $this->provinceTranslationRepository->all();

        return view('province_translations.index')
            ->with('provinceTranslations', $provinceTranslations);
    }

    /**
     * Show the form for creating a new ProvinceTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('province_translations.create');
    }

    /**
     * Store a newly created ProvinceTranslation in storage.
     *
     * @param CreateProvinceTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinceTranslationRequest $request)
    {
        $input = $request->all();

        $provinceTranslation = $this->provinceTranslationRepository->create($input);

        Flash::success('Province Translation saved successfully.');

        return redirect(route('provinceTranslations.index'));
    }

    /**
     * Display the specified ProvinceTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            Flash::error('Province Translation not found');

            return redirect(route('provinceTranslations.index'));
        }

        return view('province_translations.show')->with('provinceTranslation', $provinceTranslation);
    }

    /**
     * Show the form for editing the specified ProvinceTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            Flash::error('Province Translation not found');

            return redirect(route('provinceTranslations.index'));
        }

        return view('province_translations.edit')->with('provinceTranslation', $provinceTranslation);
    }

    /**
     * Update the specified ProvinceTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateProvinceTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvinceTranslationRequest $request)
    {
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            Flash::error('Province Translation not found');

            return redirect(route('provinceTranslations.index'));
        }

        $provinceTranslation = $this->provinceTranslationRepository->update($request->all(), $id);

        Flash::success('Province Translation updated successfully.');

        return redirect(route('provinceTranslations.index'));
    }

    /**
     * Remove the specified ProvinceTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $provinceTranslation = $this->provinceTranslationRepository->findWithoutFail($id);

        if (empty($provinceTranslation)) {
            Flash::error('Province Translation not found');

            return redirect(route('provinceTranslations.index'));
        }

        $this->provinceTranslationRepository->delete($id);

        Flash::success('Province Translation deleted successfully.');

        return redirect(route('provinceTranslations.index'));
    }
}
