<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->full_name = $request->full_name;
        if ($request->changePassword == "on") {
            $this->validate($request,[
                'password'=>'required|min:3|max:32',
                'repassword'=>'required|same:password'
            ],
            [
                'password.required'=>'Chưa nhập password',
                'password.min'=>'Password phải có ít nhất 3 ký tự',
                'password.max'=>'Password có tối đa 32 ký tự',            
                'repassword.required'=>'Chưa nhập lại password',
                'repassword.same'=>'Password nhập lại chưa khớp'
            ]);

            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }

//dangki
    public function getsignup()
    {
        return view('signup');
    }

    public function postsignup(SignupRequest $request)
    {
        $user = new User();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phone;
        $user->role = 0;
        $user->save();
        return redirect('dangnhap')->with('thanhcong','Tạo tài khoản thành công');
    }

//dangnhap
    public function getlogin()
    {
        return view('login');
    }

    public function postlogin(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email , 'password' => $password, 'role' => 0])) {
            return redirect('index');
        }
        elseif (Auth::attempt(['email' => $email , 'password' => $password, 'role'=>1])) {
            return redirect('admin/home');
        }
        else{
            return redirect()->back()->with('thongbao', 'Đăng nhập không thành công');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('index');
    }

    

    
}
