<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{transactionModel};

/**
 * Class TransactionService
 * @package App\Services
 */
class TransactionService
{
    private ValidationService $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function store(Request $request)
    {
        $transaction = transactionModel::create($request->all());
        if($transaction)
        {
            $this->validationService->store($transaction);
            return response(['message'=>'Save transaction.'],200);
        }
        return response(['message'=>'not Save transaction.'],400);
    }
     public function show()
    {
        $transactionModel = transactionModel::orderBy('created_at', 'desc')->get();
        if($transactionModel)
        {
            return response(['transaction'=>$transactionModel],200);
        }
    }
    public function showById($id)
    {
        $transactionModel = transactionModel::find($id);
        if($transactionModel)
        {
            return response(['transaction'=>$transactionModel],200);
        }
        return response(['transaction'=>'not Save transaction.'],401);
    }
    public function update(Request $request,$id)
    {
        $transactionModel = transactionModel::find($id);
        if($transactionModel->update($request->all()))
        {
            return Response('success Update transaction',200);
        }

        return response(['transaction'=>'not Update transaction.'],401);
    }

    public function delete($id)
    {
        $transactionModel = transactionModel::find($id);
        if($transactionModel)
        {
            return response(['transaction'=>'transaction not found.'+ $transactionModel->delete()],200);
        }
        return response(['transaction'=>'transaction not found.'],401);
    }
}
