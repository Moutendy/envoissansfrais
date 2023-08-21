<?php

namespace App\Services;
use App\Models\MessageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
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

    public function indexInbox($rec,$me)
    {
        $message =  DB::select('SELECT * FROM `message_models` WHERE issue=:me AND recipient=:rec', ['me' => $me,'rec'=>$rec]);
        return response(['message' => $message], 201);
    }

    public function index($name)
    {
        if(!$name)
        {
            return response(['message' => 'no fund message'], 404);
        }
        $message =  DB::select('select * from message_models
         where issue = :name', ['name' =>$name]);
        return response(['message' => $message], 201);
    }

    public function store(Request $request)
    {
        // $attrs = $request->validate([
        //     'issue' => 'required|string',
        //     'recipient' => 'required|string',
        //     'sms_text' => 'string',
        //     'sms_image' => 'string'
        // ]);
        //  $request->sms_image;
        // if ($request->sms_image) {

        //     $image = $this->imageService->saveImage($request->sms_image, 'message');
        //     $sms = MessageModel::create([
        //         'issue' => $attrs['issue'],
        //         'recipient' => $attrs['recipient'],
        //         'transaction_model' =>2,
        //         'sms_text' =>$attrs['sms_text'],
        //         'sms_image' => $image,
        //     ]);
        // } else {
        //     $sms = MessageModel::create([
        //         'issue' => $attrs['issue'],
        //         'recipient' => $attrs['recipient'],
        //         'transaction_model' =>2,
        //         'sms_text' =>$attrs['sms_text'],
        //         'sms_image' => '',
        //     ]);
        // }

        // return response(['message' => 'Message send.', 'message' => $sms], 201);

//

$attrs = $request->validate([
    'issue' => 'required|string',
    'recipient' => 'required|string',
    'sms_text' => 'string',
    'sms_image' => ''
]);


if (!empty($request->file('sms_image'))) {
    $path = 'public/imagesmessage';
    $fileimage = $request->file('sms_image');
    $nameimage = $fileimage->getClientOriginalName();
    $request->file('sms_image')->move('storage\public\imagesmessage', $nameimage);

    $message = MessageModel::create([
        'issue' => $attrs['issue'],
        'transaction_model' => 2,
        'recipient' => $attrs['recipient'],
        'sms_text' =>$attrs['sms_text'],
        'image' => URL::to('/') . '/storage/' . $path . '/' . $nameimage,
    ]);
} else {
    $message = MessageModel::create([
        'issue' => $attrs['issue'],
        'transaction_model' => 2,
        'recipient' => $attrs['recipient'],
        'sms_text' =>$attrs['sms_text'],
        'image' => '',
    ]);
}

return response(['message' => 'message send.', 'message' => $message], 201);
    }


    public function update(Request $request, $id)
    {
        $message = MessageModel::find($id);
        if (!$message) {
            return response(['message' => 'message not found.'], 403);
        }
        $attrs = $request->validate([
            'sms_text' => 'string',

        ]);
        if (!empty($request->file('sms_image')) && !$attrs['sms_text']) {
            $path = 'public/imagesmessage';
            $fileimage = $request->file('sms_image');
            $nameimage = $fileimage->getClientOriginalName();
            $request->file('sms_image')->move('storage\public\imagesmessage', $nameimage);

            $message->update([
                    'sms_text' =>$attrs['sms_text'],
                    'sms_image' =>URL::to('/') . '/storage/' . $path . '/' . $nameimage,
            ]);
            }
            else{

                $message->update([
                    'sms_text' =>$attrs['sms_text'],
            ]);

            }




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
