<?php

namespace App\Http\Controllers;
use App\Services\{PostService,RoleService,TransactionService,ContactService,ValidationService};
use Illuminate\Http\Request;

class PostController extends Controller
{


    private PostService $postService;
    private RoleService $roleService;
    private TransactionService $transactionService;
    private ContactService $contactService;
    private ValidationService $validationService;
    public $showTransactions;
    public $postBysUser;
    public $pvalBysUser;
    public $contactBysUser;
    public function __construct(ContactService $contactService,ValidationService $validationService,TransactionService $transactionService,RoleService $roleService,PostService $postService)
    {
        $this->postService = $postService;
        $this->transactionService = $transactionService;
        $this->roleService = $roleService;
        $this->validationService = $validationService;
        $this->contactService = $contactService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->postService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->postService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->postService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $this->postService->update($request,$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->postService->destroy($id);
    }


      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepost($id)
    {
        //
         return view('layouts.updatepost',compact('id'));
    }

    public function addviewpost()
    {
        return view('layouts.addpost');
    }
    public function profil()
    {
        $role = $this->roleService->showById(auth()->user()->role_model);

        $this->postBysUser = $this->postService->postByUser();
       $this->pvalBysUser = $this->validationService->validationTransByUser();
      $this->contactBysUser = $this->contactService->show();

        if($role->name == 'agencier')
        {
           $this->showTransactions = $this->transactionService->showUserAgencier();
        }
        if($role->name == 'client')
        {
           $this->showTransactions = $this->transactionService->showUserSend();

        }

        $transactionSend = count($this->showTransactions);
        $post =  count($this->postBysUser);
        $val = count($this->pvalBysUser);
        $cont = count($this->contactBysUser);
        return view('layouts.profil',compact('transactionSend','post','val','role','cont'));
    }

    public function home() {
        $role = $this->roleService->showById(auth()->user()->role_model);
        return view('layouts.post',compact('role'));
    }
}
