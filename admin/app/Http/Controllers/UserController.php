<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $_userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->_userRepo = $userRepo;
    }

    public function index()
    {
        try {
            $users = $this->_userRepo->all();

            return $this->jsonData($users);
        } catch(\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $user = $this->_userRepo->store($request);

            return $this->jsonData($user);
        } catch(\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $user = $this->_userRepo->find($id);

            return $this->jsonData($user);
        } catch(\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = $this->_userRepo->update($request, $id);

            return $this->jsonData($user);
        } catch(\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }


    public function destroy($id)
    {

    }
}
