<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\User;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UsersController
 * @package App\Http\Controllers\API
 */

class UsersAPIController extends AppBaseController
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the users.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usersRepository->pushCriteria(new RequestCriteria($request));
        $this->usersRepository->pushCriteria(new LimitOffsetCriteria($request));

        $users = $this->usersRepository->all();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }


    /**
     * Store a newly created funds in storage.
     * POST /funds
     *
     * @param CreateFundAPIRequest $request
     *
     * @return Response
     */

    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();

        $user = $this->usersRepository->create($input);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified funds.
     * GET|HEAD /funds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */

    public function show ($id)
    {
        $user = $this->usersRepository->findWithoutFail($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }
        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }
}




