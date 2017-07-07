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

class ProductGroupController extends Controller
{
    public function index()
    {
    	$prodGroup=ProductGroup::orderBy('updated_at','DESC')->get();
    	return view('ViciCMS::product-group.show',compact('prodGroup',$prodGroup));
    }
     public function create()
    {
    	return view('ViciCMS::product-group.insert');
    }
    public function edit($id)
    {
        // $prodtype=ProductGroup::all();
    	$prodGroup=ProductGroup::find($id);
    	return view('ViciCMS::product-group.edit',compact('prodGroup',$prodGroup));
    }
    public function update(Request $request,$id)
    {
    	$prodGroup=ProductGroup::find($id);
    	$prodGroup->name=$request->get('name');
        $prodGroup->replicate();
    	$prodGroup->save();
    	Session::flash('message', 'Cập nhật thành công!');
        return Redirect::to('admin/product-group');
    }
    
    public function store(Request $request)
    {
    	
    	$prodGroup=new ProductGroup;
        $prodGroup->name=$request->get('name');
        $prodGroup->replicate();
    	$prodGroup->save();
    	Session::flash('message', 'Tạo mới thành công!');
        return Redirect::to('admin/product-group');
    }
    public function destroy($id)
    {
    	ProductGroup::find($id)->delete();
    	Session::flash('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('admin/product-group');
    }
}
