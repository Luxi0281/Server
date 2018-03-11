<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefundsRequest;
use App\Http\Requests\UpdatefundsRequest;
use App\Repositories\fundsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class fundsController extends AppBaseController
{
    /** @var  fundsRepository */
    private $fundsRepository;

    public function __construct(fundsRepository $fundsRepo)
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
     * @param CreatefundsRequest $request
     *
     * @return Response
     */
    public function store(CreatefundsRequest $request)
    {
        $input = $request->all();

        $funds = $this->fundsRepository->create($input);

        Flash::success('Funds saved successfully.');

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
            Flash::error('Funds not found');

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
            Flash::error('Funds not found');

            return redirect(route('funds.index'));
        }

        return view('funds.edit')->with('funds', $funds);
    }

    /**
     * Update the specified funds in storage.
     *
     * @param  int              $id
     * @param UpdatefundsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefundsRequest $request)
    {
        $funds = $this->fundsRepository->findWithoutFail($id);

        if (empty($funds)) {
            Flash::error('Funds not found');

            return redirect(route('funds.index'));
        }

        $funds = $this->fundsRepository->update($request->all(), $id);

        Flash::success('Funds updated successfully.');

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
            Flash::error('Funds not found');

            return redirect(route('funds.index'));
        }

        $this->fundsRepository->delete($id);

        Flash::success('Funds deleted successfully.');

        return redirect(route('funds.index'));
    }
}
