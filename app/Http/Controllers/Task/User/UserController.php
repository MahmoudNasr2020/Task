<?php

namespace App\Http\Controllers\Task\User;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Hospital\Admin\UpdateAdminRequest;
use App\Http\Requests\Task\User\AddUserRequest;
use App\Http\Requests\Task\User\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function index(UserDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(AddUserRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(EditUserRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(User::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(User::class,$request->data);
    }

}
