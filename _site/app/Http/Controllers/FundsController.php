<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFundRequest;
use App\Http\Requests\UpdateFundRequest;
use App\Repositories\FundsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FundsController extends AppBaseController
{
    /** @var  FundsRepository */
    private $fundsRepository;

    public function __construct(FundsRepository $fundsRepo)
    {
        $this->middleware('auth');
        $this->fundsRepository = $fundsRepo;
    }

    /**
     * Display a listing of the funds.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundsRepository->pushCriteria(new RequestCriteria($request));
        $funds = $this->fundsRepository->all();

        return view('funds.index')
            ->with('funds', $funds);
    }

    /**
     * Show the form for creating a new funds.
     *
     * @return Response
     */
    public function create()
    {
        return view('funds.create');
    }

    /**
     * Store a newly created funds in storage.
     *
     * @param CreateFundRequest $request
     *
     * @return Response
     */
    public function store(CreateFundRequest $request)
    {
        $input = $request->all();

        $funds = $this->fundsRepository->create($input);

        Flash::success('Fund saved successfully.');

        return redirect(route('funds.index'));
    }

    /**
     * Display the specified funds.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        return view('funds.show')->with('funds', $funds);
    }

    /**
     * Show the form for editing the specified funds.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        return view('funds.edit')->with('funds', $funds);
    }

    /**
     * Update the specified funds in storage.
     *
     * @param  int              $id
     * @param UpdateFundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundRequest $request)
    {
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        $funds = $this->fundsRepository->update($request->all(), $id);

        Flash::success('Fund updated successfully.');

        return redirect(route('funds.index'));
    }

    /**
     * Remove the specified funds from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        $this->fundsRepository->delete($id);

        Flash::success('Fund deleted successfully.');

        return redirect(route('funds.index'));
    }
}
