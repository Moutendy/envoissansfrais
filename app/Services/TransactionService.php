<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{transactionModel};
use Illuminate\Support\Facades\DB;
use App\Models\{User};
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
        $user_agencier = User::find($request['user_agencier']);
        $user_receiver = User::find($request['user_receiver']);

        $request['agencier_tel'] = $user_agencier->tel;
        $request['agencier_name'] = $user_agencier->name;
        $request['nom_receiver'] = $user_receiver->name;
        $request['tel_receiver'] = $user_receiver->tel;
        $request['nom_user_send'] = auth()->user()->name;
        $request['tel_user_send'] = auth()->user()->tel;
        $transaction = transactionModel::create($request->all());
        if($transaction)
        {
            $this->validationService->store($transaction);
            return redirect()->back()->with('message', 'Votre message ici');;
        }
        return redirect()->back()->with('message', 'Votre message ici');;
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
            return redirect()->back()->with("modifier");
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
        return response(['transaction'=>'transaction not found.'],401);}

    public function showUserSend()
    {
        return DB::select('SELECT ts.id,ts.nom_user_send,ts.tel_user_send,ts.tel_receiver,ts.nom_receiver,ts.agencier_name,ts.agencier_tel,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc, us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_send = us.id where us.id = :id',['id'=>auth()->user()->id]);}

    public function showUserReceiver()
    {
        return DB::select('SELECT ts.id,ts.nom_user_send,ts.tel_user_send,ts.tel_receiver,ts.nom_receiver,ts.agencier_name,ts.agencier_tel,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_receiver = us.id where us.id = :id',['id'=>auth()->user()->id]);}

    public function showUserAgencier()
    {
        return DB::select('SELECT ts.id,ts.nom_user_send,ts.tel_user_send,ts.tel_receiver,ts.nom_receiver,ts.agencier_name,ts.agencier_tel ,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_agencier = us.id where us.id = :id',['id'=>auth()->user()->id]);}

    public function showUserAgencierById($id)
    {
        return DB::select('SELECT ts.id ,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_agencier = us.id where us.id = :id',['id'=>$id]);}
}
