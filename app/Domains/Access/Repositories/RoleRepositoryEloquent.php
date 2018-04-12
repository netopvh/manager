<?php

namespace App\Domains\Access\Repositories;

use App\Core\Exceptions\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Models\Role;
use App\Domains\Access\Validators\RoleValidator;
use Prettus\Repository\Events\RepositoryEntityCreated;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Domains\Access\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Classe de validação do model
     *
     * @return string|RoleValidator
     */
    public function validator()
    {
        return RoleValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Save a new entity in repository
     *
     * @throws GeneralException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes) : Role
    {
        //verifica se já possui um perfil igual no banco de dados
        if ($this->roleExists($attributes['name'])) {
            throw new GeneralException('Já existe um perfil com o nome '.$attributes['name']);
        }
        //Verifica se existe permissões a inserir
        if (! isset($attributes['permissions']) || ! count($attributes['permissions'])) {
            $attributes['permissions'] = [];
        }
        //Adiciona o field display_name no banco de dados
        $attributes['display_name'] = $attributes['name'];
        $role = parent::create($attributes);
        if($role){
            $role->permissions()->sync($attributes['permissions']);
            $this->resetModel();
            event(new RepositoryEntityCreated($this, $role));
            return $this->parserResult($role);
        }
        throw new GeneralException('Não foi possível criar o perfil');
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function roleExists($name)
    {
        return $this->model
                ->where('name', $name)
                ->count() > 0;
    }
    
}
