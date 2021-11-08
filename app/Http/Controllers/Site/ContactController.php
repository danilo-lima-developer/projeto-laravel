<?php

namespace App\Http\Controllers\Site;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Notification; 
//use Illuminate\Notifications\Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.contact.index');
    }

    public function form(ContactFormRequest $request)
    { 
        //dd($request->all());
        $contact = Contact::create($request->all());
        Notification::route('mail', config('mail.from.address'))
            ->notify(new NewContact($contact));

        toastr()->success('O contato foi inserido com sucesso!');
        return back();

        
        // return redirect()->route('site.contact')->with([
        //     'success' => true,
        //     'message' => 'O contato foi criado com sucesso!'
        // ]);
        //ddd($contact); // Retirar o método all para visualizar todos os parâmetros
    }
}
