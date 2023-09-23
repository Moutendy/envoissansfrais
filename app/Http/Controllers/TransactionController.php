<?php

namespace App\Http\Controllers;
use App\Services\{TransactionService,ContactService};
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    private TransactionService $transactionService;

    private ContactService $contactService;

    public function __construct(TransactionService $transactionService,ContactService $contactService)
    {
        $this->transactionService = $transactionService;
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
        return $this->transactionService->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$userId)
    {
        $request['user_send'] = $userId;
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
         $listContact = $this->contactService->show();
         return view('layouts.addtransaction',compact('userId','listContact'));
    }

    public function showUserSend()
    {
        //
        $showUserSendTransaction = $this->transactionService->showUserAgencier();

        return view('layouts.transaction',compact('showUserSendTransaction'));
    }

}
