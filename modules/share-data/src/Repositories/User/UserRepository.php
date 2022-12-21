<?php

namespace Luccui\ShareData\Repositories\User;

use Luccui\ShareData\Models\User;
use Luccui\ShareData\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface {

    public function model()
    {
        return User::class;
    }

}
