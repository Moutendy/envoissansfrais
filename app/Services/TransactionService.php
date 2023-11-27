<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\{transactionModel};
use Illuminate\Support\Facades\DB;
use App\Models\{User};
use Carbon\Carbon;
/**
 * Class TransactionService
 * @package App\Services
 */
class TransactionService
{
    private ValidationService $validationService;
    private EmailService $emailService;
    public function __construct(EmailService $emailService,ValidationService $validationService)
    {
        $this->validationService = $validationService;
        $this->emailService = $emailService;
    }

    public function store(Request $request)
    {
        $date1 = Carbon::createFromFormat('d/m/Y H:i:s',Carbon::parse( $request['end'])->format('d/m/Y H:i:s'));

        $date2 = Carbon::createFromFormat('d/m/Y H:i:s',Carbon::parse( $request['start'])->format('d/m/Y H:i:s'));
       if($date1->gt($date2))
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
        $this->emailService->sendEmailNewTransaction($user_agencier);
        if($transaction)
        {
            $this->validationService->store($transaction);
            return redirect()->back()->with('message', 'ajout de transaction');;
        }
       }

        return redirect()->back()->with('message', 'Aucun ajout de transaction');
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
            $this->emailService->sendEmailAccepterTransaction($transactionModel->user_send,$transactionModel->user_receiver);
            return redirect()->back()->with("modifier");
        }
        return response(['transaction'=>'not Update transaction.'],401);
    }

    public function delete($id)
    {
        $transactionModel = transactionModel::find($id);
        if($transactionModel->accept_transaction == 0)
        {
            $transactionModel->delete();
            return back()->with("message","Transaction annulée");
        }
        return back()->with("message","Impossible d'annuler ,Transaction accepter par l'agencier");
    }

    public function showUserSend()
    {
        return DB::select('SELECT ts.id,ts.nom_user_send,ts.tel_user_send,ts.tel_receiver,ts.nom_receiver,ts.agencier_name,ts.agencier_tel,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc, us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_send = us.id join validation_models as vt on vt.transaction_model = ts.id where us.id = :id and vt.user_receiver =:id_receveur',['id'=>auth()->user()->id,'id_receveur'=>0]);}

    public function showUserReceiver()
    {
        return DB::select('SELECT ts.id,ts.nom_user_send,ts.tel_user_send,ts.tel_receiver,ts.nom_receiver,ts.agencier_name,ts.agencier_tel,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_receiver = us.id join validation_models as vt on vt.transaction_model = ts.id where us.id = :id and vt.user_receiver =:id_receveur',['id'=>auth()->user()->id,'id_receveur'=>0]);}

    public function showUserAgencier()
    {
        return DB::select('SELECT ts.id,ts.nom_user_send,ts.tel_user_send,ts.tel_receiver,ts.nom_receiver,ts.agencier_name,ts.agencier_tel ,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_agencier = us.id join validation_models as vt on vt.transaction_model = ts.id where us.id = :id and vt.user_receiver =:id_receveur',['id'=>auth()->user()->id,'id_receveur'=>0]);}

    public function showUserAgencierById($id)
    {
        return DB::select('SELECT ts.id ,ts.start as startdate,ts.end,ts.accept_transaction ,ts.desc , us.email,us.image_profil,us.name,us.tel FROM `users` as us join transaction_models as ts on ts.user_agencier = us.id where us.id = :id',['id'=>$id]);}

        public function calculDate($dateend)
        {
            $date1 = Carbon::createFromFormat('d/m/Y H:i:s',Carbon::parse($dateend)->format('d/m/Y H:i:s'));
            $date2 = Carbon::now()->format('d/m/Y H:i:s');
            if($date1->gt($date2)){
                return 1;
            }
            return 0;
        }
}
