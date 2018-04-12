<?php
namespace App\Domains\Access\Controllers;

use App\Core\Exceptions\GeneralException;
use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\PermissionRepository;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * Instancia objeto do repositorio
     *
     * RoleController constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->middleware('auth');
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Exibe a pagina inicial dos usuários
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Exibe formulário de criação de novo usuários
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('roles.create')
            ->withPermissions($this->permissionRepository->all());
    }

    /**
     * Salva registro no banco de dados
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try{
            $this->roleRepository->create($request->all());
            return redirect()->route('roles.home')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->route('roles.create')
                ->with('errors',$e->getMessageBag())
                ->withInput();
        }
    }

    /**
     * Localiza registro para edição
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try{
            $user = $this->roleRepository->findExists('id',$id);
            return view('roles.edit')
                ->with('user', $user);
        }catch(GeneralException $e){
            return redirect()->route('roles.home')
                ->with('errors',$e->getMessage());
        }
    }

    /**
     * Atualiza registro no banco de dados
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try{
            $this->roleRepository->update($request->all(), $id);
            return redirect()->route('roles.home')->with('success','Registro atualizado com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->route('roles.create')
                ->with('errors',$e->getMessageBag())
                ->withInput();
        }
    }
}