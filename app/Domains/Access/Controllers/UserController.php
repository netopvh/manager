<?php

namespace App\Domains\Access\Controllers;

use App\Core\Exceptions\GeneralException;
use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use Illuminate\Http\Request;
use App\Domains\Access\Models\User;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected $roleRepository;

    /**
     * Instancia o repositorio
     *
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Exibe a pagina inicial dos usuários
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(remove_bars('["administrador"]'));
        return view('users.index');
    }

    /**
     * Exibe formulário de criação de novo usuários
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create')
            ->withRoles($this->roleRepository->with('permissions')->all());
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
            $this->userRepository->create($request->all());
            return redirect()->route('users.home')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->route('users.create')
                ->with('errors',$e->getMessageBag())
                ->withInput();
        }catch (GeneralException $e){
            return redirect()->route('users.create')
                ->with('errors',$e->getMessage())
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
            $user = $this->userRepository->findExists('id',$id);
            return view('users.edit',compact('user'));
        }catch(GeneralException $e){
            return redirect()->route('users.home')
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
            $this->userRepository->update($request->all(), $id);
            return redirect()->route('users.home')->with('success','Registro atualizado com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->route('users.create')
                ->with('errors',$e->getMessageBag())
                ->withInput();
        }
    }

}
