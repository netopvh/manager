<?php

namespace App\Domains\Access\Repositories;

use App\Core\Exceptions\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Domains\Access\Models\User;
use App\Domains\Access\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Domains\Access\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @return string
     */
    public function validator()
    {
        return UserValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findUser($id)
    {
        $result = $this->model->newQuery()->where('id', $id)->get()->first();
        if (is_null($result)) {
            throw new GeneralException("Não foi localizado nenhum registro no banco de dados");
        }else{
            return $result;
        }
    }
    
}
