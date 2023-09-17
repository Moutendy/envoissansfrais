<?php

namespace App\Services;
use App\Models\{ContactModel};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class ContactService
 * @package App\Services
 */
class ContactService
{
    public function store(Request $request)
    {
        $contact = ContactModel::create($request->all());
        if($contact)
        {
            return response(['conact'=>'Add contact.'],200);
        }
        return response(['contact'=>'not Add contact.'],400);
    }


    public function show()
    {

        $contact = DB::select('SELECT email,image_profil,name FROM `contact_models` as ct join users as us on ct.contact = us.id ');


        if($contact)
        {
            return response(['contact'=>$contact],200);
        }
    }

    public function delete($id)
    {
        $contact = ContactModel::find($id);
        if($contact)
        {
            $contact->delete();
            return response(['contact'=>'contact delete '],200);
        }
        return response(['contact'=>'contact not found.'],401);
    }
}
