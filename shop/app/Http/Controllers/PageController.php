<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Slide;
use App\Cart;
use App\News;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Session;
use Mail;
use Illuminate\Support\Facades\Input;
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
		$sp_km = Product::paginate(8);
		$ct_sanpham  = Product::where('id',$req->id)->first();
		$sp_tuongtu = Product::where('id_type',$ct_sanpham->id_type)->paginate(3);
		$new_product = Product::where('new',1)->get();
		return view('page.chitiet_sanpham',compact('ct_sanpham','sp_tuongtu','new_product','sp_km'));

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
		if(Auth::check()){
			$product = Product::find($id);
			$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart ($oldCart);
			if($req->sl >0){
				for ($i = 0; $i<$req->sl;$i++) {

					$cart->add($product,$id);
				}	
			}else{
				$cart->add($product,$id);
			}			
			
			$req->session()->put('cart',$cart);
			return redirect()->back();
		}
		else 
		{
			return redirect('dangnhap')->with('thongbao2','Bạn phải đăng nhập để mua hàng');
		}
		
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
		
		$user = new User;
		$user->full_name = $req->full_name;
		$user->email = $req->email;
		$user->address = $req->address;
		$user->phone_number = $req->phone;
		$user->note = $req->notes;
		$user->save();

		$bill = new Bill;
		$bill->id_users = $user->id;
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

		$product_cart = $cart->items;
		$data = ['name'=>$req->full_name,'email'=>$req->email, 'address'=>$req->address, 'phone_number'=>$req->phone,'product'=>$product_cart, 'totalPrice'=> $cart->totalPrice,];
		Mail::send('mail',$data,function($msg){
			$msg->from('taynesflowers123@gmail.com','taynesflowers');
			$msg->to(Input::get('email'),'tôi')->subject('taynesflowers');
		});


		Session::forget('cart');
		return redirect()->back()->with('thongbao','Đặt hàng thành công. Vui lòng kiểm tra email của bạn!');
	}


	public function getSearch(Request $req){
		$products =Product::where('name','like','%'.$req->search.'%')->orWhere('unit_price',$req->search)->get();
		return view('page.search',compact('products'));
	}

	public function getIndexadmin(){
		return view('admin.layout.master');
	}


}
