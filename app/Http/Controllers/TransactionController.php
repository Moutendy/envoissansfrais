<?php

namespace App\Http\Controllers;
use App\Services\{UserService,TransactionService,ContactService,RoleService};
use Illuminate\Http\Request;
use App\Models\{User};
use Carbon\Carbon;
class TransactionController extends Controller
{

    private TransactionService $transactionService;

    private ContactService $contactService;

    private RoleService $roleService;

    private UserService $userService;

    public $showTransactions;

    public function __construct(UserService $userService,RoleService $roleService,TransactionService $transactionService,ContactService $contactService)
    {
        $this->transactionService = $transactionService;
        $this->contactService = $contactService;
        $this->roleService = $roleService;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->transactionService->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desc' => 'required',
            'user_receiver' => 'required',
            'start' => 'required',
            'end' => 'required',
            'user_agencier' => 'required',
        ]);
        $request['user_send'] = auth()->user()->id;
        $request['accept_transaction'] = 0;
        return $this->transactionService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->transactionService->show($id);
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
        $request['accept_transaction'] = 1;
        return $this->transactionService->update($request, $id);
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
        return $this->transactionService->delete($id);
    }


    public function addtransaction($userId)
    {
         $users = User::find($userId);;
         $listContact = $this->contactService->show();
         return view('layouts.addtransaction',compact('users','listContact'));
    }

    public function transactionclient()
    {
        //
        $date = Carbon::now()->format('y-m-d H:i:s');
      $role = $this->roleService->showById(auth()->user()->role_model);
        if($role->name == 'agencier')
        {
           $this->showTransactions = $this->transactionService->showUserAgencier();
           $transactionSend = $this->showTransactions;

           return view('layouts.transaction',compact('transactionSend','role','date'));
        }

           $this->showTransactions = $this->transactionService->showUserSend();
           $transactionSend = $this->showTransactions;
        return view('layouts.transaction',compact('transactionSend','role','date'));



    }

    public function transactionreceiver()
    {
        $role = $this->roleService->showById(auth()->user()->role_model);

        if($role->name == 'client')
        {
           $this->showTransactions = $this->transactionService->showUserReceiver();
        }
        $transactionSend = $this->showTransactions;
        return view('layouts.transaction',compact('transactionSend'));
    }


}
