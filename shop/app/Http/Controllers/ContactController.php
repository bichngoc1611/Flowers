<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
	public function index()
	{
		$contact = Contact::all();
		$user = User::all();
		return view('admin.contact.index',['contact'=>$contact,'user'=>$user]);
	}

	public function store(Request $request)
	{
		if (Auth::check()) {
			$id_user = Auth::id();
			$user = User::find($id_user);

			$user->full_name = $request->name;
			$user->address = $request->address;
			$user->email = $request->email;
			$user->phone_number = $request->phone_number;
			$user->save();


			$contact = new Contact;
			$contact->message = $request->message;
			$contact->user_id = Auth::id();
			$contact->save();
			return redirect()->back()->with('thongbao','Bạn đã gửi liên hệ thành công');
		}
		else
		{
			return redirect('dangnhap')->with('thongbao','Bạn phải đăng nhập để liên hệ');
		}
	}

	public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
}
