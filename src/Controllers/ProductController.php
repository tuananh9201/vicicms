<?php

namespace VICITECH\ViciCMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use VICITECH\ViciCMS\Models\Product;
use VICITECH\ViciCMS\Models\ProductGroup;
use VICITECH\ViciCMS\Models\Provider;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use Cviebrock\EloquentSluggable\Sluggable;
class ProductController extends Controller
{
    public function index()
    {
    	$product=Product::orderBy('updated_at','DESC')->paginate(10);
//    	dd('tesst');
    	return view('ViciCMS::product.index',compact('product',$product));
    }
     public function create()
    {
    	$prodtype=ProductGroup::all();
    	return view('ViciCMS::product.insert',compact('prodtype',$prodtype));
    }
    public function edit($id)
    {
        $prodtype=ProductGroup::all();
    	$product=Product::where('id',$id)->first();
    	return view('ViciCMS::product.edit',compact('product',$product,'prodtype',$prodtype));
    }
    public function search(Request $request)
    {
        $keys=$request->get('search');
        return redirect()->route('timkiemsanpham', [$keys]);
    }
    public function timkiem($key)
    {
        // dd($key);
        $product=Product::where('name','LIKE','%' .$key.'%')->paginate(10);
        Session::flash('message', 'Tìm thấy '.count($product).' sản phẩm!');
        return view('ViciCMS::product.search',compact('product',$product));
    }
    public function update(Request $request,$id)
    {
    	$product=Product::find($id);
    	if ($request->file('banner')) {
    	   $filename=$request->file('banner')->getClientOriginalName();
           $path=time() . '-' .$filename;
           Image::make($request->file('banner'))->resize(640,460)->save('images/sanpham/'.$path);
    	}
    	else
    	{
    		$path=$product->image;
    	}
    	$product->productgroup_id=$request->get('prodgrtype');
        $product->provider_id=$request->get('provid');
        $product->name=$request->get('title');
        $product->replicate();
        $product->description=$request->get('shortDesc');
        $product->content=$request->get('content1');
        $product->image=$path;
        $product->unitprice=$request->get('oldPrice');
        $product->baohanh=$request->get('baohanh');
        $product->save();
    	Session::flash('message', 'Cập nhật thành công!');
        return Redirect::to('admin/product');
    }
    
    public function store(Request $request)
    {
    	$filename=$request->file('banner')->getClientOriginalName();
        $path=time() . '-' .$filename;
         Image::make($request->file('banner'))->resize(640,460)->save('images/sanpham/'.$path);
    	$product=new Product;
        $product->productgroup_id=$request->get('prodgrtype');
        $product->provider_id=$request->get('provid');
        $product->name=$request->get('title');
        $product->replicate();
        $product->description=$request->get('shortDesc');
        $product->content=$request->get('content1');
    	$product->image=$path;
    	$product->unitprice=$request->get('oldPrice');
    	$product->baohanh=$request->get('baohanh');
    	$product->save();
    	Session::flash('message', 'Tạo mới thành công!');
        return Redirect::to('admin/product');
    }
    public function destroy($id)
    {
    	Product::find($id)->delete();
    	Session::flash('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('admin/product');
    }
}
