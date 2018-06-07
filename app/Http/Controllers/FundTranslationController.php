<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFundTranslationRequest;
use App\Http\Requests\UpdateFundTranslationRequest;
use App\Repositories\FundTranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FundTranslationController extends AppBaseController
{
    /** @var  FundTranslationRepository */
    private $fundTranslationRepository;

    public function __construct(FundTranslationRepository $fundTranslationRepo)
    {
        $this->fundTranslationRepository = $fundTranslationRepo;
    }

    /**
     * Display a listing of the FundTranslation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundTranslationRepository->pushCriteria(new RequestCriteria($request));
        $fundTranslations = $this->fundTranslationRepository->all();

        return view('fund_translations.index')
            ->with('fundTranslations', $fundTranslations);
    }

    /**
     * Show the form for creating a new FundTranslation.
     *
     * @return Response
     */
    public function create()
    {
        return view('fund_translations.create');
    }

    /**
     * Store a newly created FundTranslation in storage.
     *
     * @param CreateFundTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateFundTranslationRequest $request)
    {
        $input = $request->all();

        $fundTranslation = $this->fundTranslationRepository->create($input);

        Flash::success('Fund Translation saved successfully.');

        return redirect(route('fundTranslations.index'));
    }

    /**
     * Display the specified FundTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            Flash::error('Fund Translation not found');

            return redirect(route('fundTranslations.index'));
        }

        return view('fund_translations.show')->with('fundTranslation', $fundTranslation);
    }

    /**
     * Show the form for editing the specified FundTranslation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            Flash::error('Fund Translation not found');

            return redirect(route('fundTranslations.index'));
        }

        return view('fund_translations.edit')->with('fundTranslation', $fundTranslation);
    }

    /**
     * Update the specified FundTranslation in storage.
     *
     * @param  int              $id
     * @param UpdateFundTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundTranslationRequest $request)
    {
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            Flash::error('Fund Translation not found');

            return redirect(route('fundTranslations.index'));
        }

        $fundTranslation = $this->fundTranslationRepository->update($request->all(), $id);

        Flash::success('Fund Translation updated successfully.');

        return redirect(route('fundTranslations.index'));
    }

    /**
     * Remove the specified FundTranslation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fundTranslation = $this->fundTranslationRepository->findWithoutFail($id);

        if (empty($fundTranslation)) {
            Flash::error('Fund Translation not found');

            return redirect(route('fundTranslations.index'));
        }

        $this->fundTranslationRepository->delete($id);

        Flash::success('Fund Translation deleted successfully.');

        return redirect(route('fundTranslations.index'));
    }
}
