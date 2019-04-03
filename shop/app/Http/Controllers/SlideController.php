<?php

namespace App\Http\Controllers;


use App\Http\Requests\SlideRequest;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
	public function index()
	{
		$slide = Slide::all();
		return view('admin.slide.index',['slide'=>$slide]);
	}

	public function create()
	{
		return view('admin.slide.add');
	}

	public function store(SlideRequest $request)
	{
		$slide = new Slide;
		$slide->name = $request->name;
		if ($request->has('link')) {
			$slide->link = $request->link;
		}
		if($request->hasFile('image')){
			$file = $request->file('image');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
				return redirect('admin/slide/add')->with('thongbao','Chỉ được chọn file có đuôi jpg, png, jpeg');
			}
			$name = $file->getClientOriginalName();
			$image = str_random(4).'_'.$name;
			while (file_exists('public/source/images/slide/'.$image)) {
				$image = str_random(4).'_'.$name;
			}
			$file->move('public/source/images/slide', $image);
			$slide->image = $image;
		}
		$slide->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function show( $id)
	{
        //
	}

	public function edit($id)
	{
		$slide = Slide::find($id);
		return view('admin.slide.edit',['slide'=>$slide]);
	}

	public function update(Request $request,$id)
	{
        $slide = Slide::find($id);
        $slide->name = $request->name;
        $slide->link = $request->link;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/product/edit/{{$id}} ')->with('thongbao','Chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while (file_exists('public/source/images/slide/'.$image)) {
                $image = str_random(4)."_". $name;
            }
       
            $file->move('public/source/images/slide/', $image);
            unlink('public/source/images/slide/'.$slide->image);
            $slide->image = $image;
        }      

        $slide->save();
        return redirect()->back()->with('thongbao','Sửa thành công');

	}

	public function destroy( $id)
	{
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
	}
}
