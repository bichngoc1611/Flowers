<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Slide;
use App\Cart;
use App\News;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function getIndex(){
		$slide = Slide::all();
		$new_product = Product::where('new',1)->paginate(4);
		$product_sale = Product::where('promotion_price','<>',0)->paginate(8);
		$new_bar = News::all();
		//return view('page.trangchu',['slide'=>$slide]);
		return view('page.trangchu',compact('slide','new_product','product_sale','new_bar'));

	}

	public function getSanPham(){
		$product = Product::paginate(8);	
		return view('page.sanpham',compact('product'));
	}

	public function getLoaiSp($type){
		$sp_theoloai = Product::where('id_type',$type)->paginate(4);
		$sp_khac = Product::where('id_type','<>',$type)->paginate(4);
		$loai_sp = ProductType::where('id',$type)->first();
		$new_bar = News::all();
		return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai_sp','new_bar'));
	}

	public function getChitiet(Request $req){
		$ct_sanpham  = Product::where('id',$req->id)->first();
		$sp_tuongtu = Product::where('id_type',$ct_sanpham->id_type)->paginate(3);
		$new_product = Product::where('new',1)->get();
		return view('page.chitiet_sanpham',compact('ct_sanpham','sp_tuongtu','new_product'));

	}

	public function getLienHe(){
		return view('page.lienhe');
	}

	public function getGioiThieu(){
		return view('page.gioithieu');
	}

	public function getTinTuc(){
		$new = News::paginate(4);
		$new_bar = News::all();
		return view('page.tintuc',compact('new','new_bar'));
	}

	public function getAddtoCart(Request $req, $id){
		$product = Product::find($id);
		$oldCart = Session('cart')?Session::get('cart'):null;
		$cart = new Cart ($oldCart);
		$cart->add($product,$id);
		$req->session()->put('cart',$cart);
		return redirect()->back();
	}

	public function getDelItemCart($id){
		$oldCart = Session::has('cart')?Session::get('cart'):null;
		$cart = new Cart ($oldCart);
		$cart ->removeItem($id);
		if (count($cart->items)>0) {
			Session::put('cart',$cart);			
		}
		else{
			Session::forget('cart');
		}
		
		return redirect()->back();
	}

	public function getCheckout(){
		return view('page.checkout');
	}

	public function postCheckout(Request $req){
		$cart = Session::get('cart');
		
		$customer = new Customer;
		$customer->name = $req->full_name;
		$customer->email = $req->email;
		$customer->address = $req->address;
		$customer->phone_number = $req->phone;
		$customer->note = $req->notes;
		$customer->save();

		$bill = new Bill;
		$bill->id_customer = $customer->id;
		$bill->date_order = date('Y-m-d');
		$bill->total = $cart->totalPrice;
		$bill->payment = $req->payment;
		$bill->note = $req->notes;
		$bill->save();

		foreach ($cart->items as $key => $value) {
			$bill_detail = new BillDetail;
			$bill_detail->id_bill = $bill->id;
			$bill_detail->id_product = $key;//$key=$value['item']['id']
			$bill_detail->quantity = $value['qty'];
			$bill_detail->unit_price = ($value['price']/$value['qty']);
			$bill_detail->save();
		}
		Session::forget('cart');
		return redirect()->back()->with('thongbao','Đặt hàng thành công');
	}

	public function getLogin(){
		return view('page.login');
	}

	public function postLogin(Request $req){
		$this->validate($req,
			[								
				'email'=>'required|email',
				'password'=>'required|min:6|max:20'				
			],
			[
				'email.required'=>'Vui lòng nhập email',
				'email.email'=>'Không đúng định dạng email',		
				'password.required'=>'Vui lòng nhập mật khẩu',		
				'password.min'=>'Mật khẩu ít nhất 6 ký tự',
				'password.max'=>'Mật khẩu quá 20 ký tự',			
			]);
		$credentials = array('email'=>$req->email ,'password'=>$req->password); 
		if (Auth::attempt($credentials)) {
			return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
		}else{
			return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
		}
		
	}

	public function getSignup(){
		return view('page.sigup');
	}

	public function postSignup(Request $req){
		$this->validate($req,
			[		
				'name'=>'required', 			
				'email'=>'required|email',
				'password'=>'required|min:6|max:20',			
				're_password'=>'required|same:password'
			],
			[
				'email.required'=>'Vui lòng nhập email',
				'email.email'=>'Không đúng định dạng email',
				'email.unique'=>'Email đã có người sử dụng',
				'password.required'=>'Vui lòng nhập mật khẩu',		
				'password.min'=>'Mật khẩu ít nhất 6 ký tự',
				'password.max'=>'Mật khẩu quá 20 ký tự',
				're_password.same'=>'Mật khẩu không giống nhau',
			]);
		$user = new User();
		$user->full_name = $req->name;
		$user->email = $req->email;
		$user->password = Hash::make($req->password);
		$user->phone = $req->phone;
		$user->save();
		return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
	}

	public function getSearch(Request $req){
		$products =Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->get();
		return view('page.search',compact('products'));
	}

	public function getIndexadmin(){
		return view('admin.layout.master');
	}


}
