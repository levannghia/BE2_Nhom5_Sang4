<?php

namespace App\Http\Controllers;
use DB;
use App\Comment;
use App\Product;
use App\Review;
use App\Category;
use Mail;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class ContactController extends Controller
{
    public function contact()
    {
        return view('pages.contact.contact');
    }

    public function sendMailContactForm(Request $request)
    {
        
        $request->validate(
            [
                'email' => 'required',
                'name' => 'required',
                'message' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa điền vào trường email.',
                'name.required' => 'Bạn chưa điền vào trường tên.',
                'message.required' => 'Bạn chưa nhập lời nhắn.',
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->message,
        ];

        Mail::send('pages.contact.contact_mail', $data, function($message){
            $message->to('levannghia.tdc2018@gmail.com', '{APP_NAME}');
            $message->subject('Thư góp ý');
            Session::put('message', 'Cảm ơn bạn đã góp ý');
        });
        
    }
}
