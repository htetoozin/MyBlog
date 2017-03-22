<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{

 
    public function getIndex(){
    	$posts = Post::OrderBy('created_at', 'desc')->limit('7')->get();
    	return view('pages.welcome', compact('posts'));
    }

	public function getAbout(){
    	return view('pages.about');
    }

    public function getContact(){
    	return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'BodyMessage' => $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('htetoo.zin09@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was sent');
        return redirect('contact');
    }

}
