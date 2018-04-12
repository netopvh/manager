<?php

namespace App\Domains\Access\Repositories;

use App\Core\Exceptions\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Domains\Access\Models\User;
use App\Domains\Access\Validators\UserValidator;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Validator\Contracts\ValidatorInterface;

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

    public function create(array $attributes)
    {
        if (!is_null($this->validator)) {
            if( $this->versionCompare($this->app->version(), "5.2.*", ">") ){
                $attributes = $this->model->newInstance()->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();
            }else{
                $model = $this->model->newInstance()->forceFill($attributes);
                $model->addVisible($this->model->getHidden());
                $attributes = $model->toArray();
            }

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }
        $user = parent::create($attributes);
        if ($user){
            if(! count($attributes['role_id'])){
                throw new GeneralException('É necessário atribuir um perfil para o usuário');
            }
            $user->attachRole($attributes['role_id']);
            $this->resetModel();
            event(new RepositoryEntityCreated($this, $user));
            return $this->parserResult($user);
        }
    }
    
}
