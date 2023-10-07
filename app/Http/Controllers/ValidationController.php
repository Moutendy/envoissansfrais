<?php

namespace App\Http\Controllers;

use App\Services\{ValidationService,RoleService};
use Illuminate\Http\Request;
use App\Models\{validationModel,transactionModel};
class ValidationController extends Controller
{
    private ValidationService $validationService;
    private RoleService $roleService;
    public function __construct(RoleService $roleService,ValidationService $validationService)
    {
        $this->validationService = $validationService;
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->validationService->show();
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
        return $this->validationService->store($request);
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
        return $this->validationService->show($id);
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
        return $this->validationService->update($request, $id);
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
        return $this->validationService->delete($id);
    }

    public function validation()
    {

    $validation = $this->validationService->showAgencier();
    return view('layouts.validation',compact('validation'));}

    public function validationByUser($idUser)
    {
    $validationTransactions = $this->validationService->nomValidationTransBy($idUser);
    $role = $this->roleService->showById(auth()->user()->role_model);
    return view('layouts.validation',compact('validationTransactions','role'));}

    public function noteTransaction(Request $request,$nameUser,$id)
    {
        $validationModel = validationModel::find($id);
       $trans = transactionModel::find($validationModel->transaction_model);
        if($nameUser =='client')
        {
            $request['user_send']=1;
            $this->validationService->update($request, $id);
        }
        else if($nameUser =='agencier')
        {
            $request['user_agencier']=1;
            $this->validationService->update($request, $id);
        }

        if($trans->user_receiver == auth()->user()->id)
        {
            $request['user_receiver']=1;
            $this->validationService->update($request, $id);
        }

        return back();
    }

    public function noteTransactionreceiver(Request $request,$id)
    {
            $request['user_receiver']=1;
            $this->validationService->update($request, $id);
    }
}
