<?php

namespace App\Services;
use App\Models\MessageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class MessageService
 * @package App\Services
 */
class MessageService
{

    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function indexInbox($name,$me)
    {
        $message =  DB::select('select * from message_models ms
         join users as u on u.name = ms.recipient
         where  ms.issue = :name and ms.recipient = :me', ['name' => $name,'me'=>$me]);
        return response(['message' => $message], 201);
    }

    public function index($name)
    {
        $message =  DB::select('select * from message_models 
         where recipient = :name', ['name' => $name]);
        return response(['message' => $message], 201);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'issue' => 'required|string',
            'recipient' => 'required|string',
            'transaction_model' => 'required|number',
            'sms_text' => 'string',
            'sms_image' => 'string'
        ]);
         $request->sms_image;
        if ($request->sms_image) {

            $image = $this->imageService->saveImage($request->sms_image, 'message');
            $sms = MessageModel::create([
                'issue' => $attrs['issue'],
                'recipient' => $attrs['recipient'],
                'transaction_model' =>$attrs['transaction_model'],
                'sms_text' =>$attrs['sms_text'],
                'sms_image' => $image,
            ]);
        } else {
            $sms = MessageModel::create([
                'issue' => $attrs['issue'],
                'recipient' => $attrs['recipient'],
                'transaction_model' =>$attrs['transaction_model'],
                'sms_text' =>$attrs['sms_text'],
                'sms_image' => '',
            ]);
        }

        return response(['message' => 'Message send.', 'message' => $sms], 201);
    }


    public function update(Request $request, $id)
    {
        $message = MessageModel::find($id);
        if (!$message) {
            return response(['message' => 'message not found.'], 403);
        }
        $attrs = $request->validate([
            'issue' => 'required|string',
            'recipient' => 'required|string',
            'transaction_model' => 'required|number',
            'sms_text' => 'string',
            'sms_image' => 'string'
        ]);
        $message->update([
                'issue' => $attrs['issue'],
                'recipient' => $attrs['recipient'],
                'transaction_model' =>$attrs['transaction_model'],
                'sms_text' =>$attrs['sms_text'],
                'sms_image' => '',
        ]);
        return response(['message' => 'message update.', 'message' => $message], 201);
    }

    public function destroy($id)
    {
        $message = MessageModel::find($id);
        if (!$message) {
            return response(['message' => 'Aucun message avec cette id.'], 404);
        }
            $message->delete();
        return response(['message' => $id], 201);
    }
}
