<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index()
    {
    	return view('page.lienhe');
    }

    // public function post(Request $req)
    // {
    // 	$req->validate([
    // 		'name'=>'required',
    // 		''
    // 	]);
    // }
}
