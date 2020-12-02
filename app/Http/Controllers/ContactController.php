<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ContactNotification;
use App\Models\User;
use Notification;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact/index');
    }

    public function store(Request $request)
    {
//        // Check for empty fields
//        if(empty(request('name'))     ||
//            empty(request('email'))   ||
//            empty(request('phone'))   ||
//            empty(request('message')) ||
//            empty(request('subject')) ||
//            !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//        {
//            echo "No arguments Provided!";
//            return false;
//        }

        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/(06)[0-9]{8}/',
            'message' => 'required|max:255',
            'subject' => 'required|max:50'
        ]);


        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'message' => request('message'),
            'subject' => request('subject')
        ];
        $receiver = User::where('email', 'stefankessel@hotmail.com')->first();
        Notification::send($receiver, new ContactNotification($data));

        return redirect()->route('contact.index');
    }
}
