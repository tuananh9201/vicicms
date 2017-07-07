<?php

namespace VICITECH\ViciCMS;

use App\Http\Controllers\Controller;
use VICITECH\ViciCMS\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;

class SlideController extends Controller
{
    public function index()
    {
    	$slide=Slide::all();
    	return view('ViciCMS::banner.index',compact('slide',$slide));
    }
     public function create()
    {
    	// $slide=Slide::all();
    	return view('ViciCMS::banner.insert');
    }
    public function edit($id)
    {
    	$slide=Slide::where('id',$id)->first();
    	return view('ViciCMS::banner.edit',compact('slide',$slide));
    }
    public function update(Request $request,$id)
    {
    	$banner=Slide::find($id);
    	if ($request->file('banner')) {
    	   $filename=$request->file('banner')->getClientOriginalName();
           $path=time() . '-' .$filename;
           Image::make($request->file('banner'))->resize(1680,617)->save('images/'.$path);
    	}
    	else
    	{
    		$path=$banner->image;
    	}
    	$banner->image=$path;
        $banner->caption=$request->get('caption');
        $banner->shortDesc=$request->get('descript');
    	$banner->save();
    	Session::flash('message', 'Cập nhật thành công!');
        return Redirect::to('admin/banner');
    }
    
    public function store(Request $request)
    {
    	$filename=$request->file('banner')->getClientOriginalName();
        $path=time() . '-' .$filename;
         Image::make($request->file('banner'))->resize(1680,617)->save('images/'.$path);
    	$banner=new Slide;
    	$banner->image=$path;
    	$banner->caption=$request->get('caption');
    	$banner->shortDesc=$request->get('descript');
    	$banner->save();
    	Session::flash('message', 'Tạo mới thành công!');
        return Redirect::to('admin/banner');
    }
    public function destroy($id)
    {
    	Slide::find($id)->delete();
    	Session::flash('message', 'Xóa banner thành công!');
        return Redirect::to('admin/banner');
    }
}
