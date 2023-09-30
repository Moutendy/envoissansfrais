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

        return DB::select('SELECT email,image_profil,name,us.id,us.tel FROM `users` as us join contact_models as ct on ct.contact = us.id where ct.user =:id',['id'=>auth()->user()->id]);
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
