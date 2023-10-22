<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;


class ContactController extends Controller
{
    //
    private ContactService $contactService;
    public function __construct(ContactService $contactService)
    {
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
        return $this->contactService->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $request['contact'] = $id;
        return $this->contactService->store($request);
    }


    public function destroy($id)
    {
        //
        return $this->contactService->delete($id);
    }

    public function contactByUser()
    {
        $contacts = $this->contactService->show();
        return view('layouts.contact',compact('contacts'));
    }

    public function contactsearch()
    {
        return $this->contactService->show();
    }
    public function userOfApplication()
    {
        $contacts = $this->contactService->showUser();
        return view('viewcontact',compact('contacts'));
    }
}
