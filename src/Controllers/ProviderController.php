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

class ProviderController extends Controller
{
    public function index()
    {
    	$prodGroup=ProductGroup::orderBy('updated_at','DESC')->get();
    	$collection = collect();
    	for ($i=0; $i < count($prodGroup) ; $i++) { 
    		$hangsx=Provider::where('productgroup_id',$prodGroup[$i]->id)->get();
    		$collection->push($hangsx);
    		// dd($collection);
    		
    	}
    	return view('ViciCMS::provider.index',compact('prodGroup',$prodGroup,'collection',$collection));
    }
     public function create($id)
    {
    	$prodGroup=ProductGroup::find($id);
    	return view('ViciCMS::provider.insert',compact('prodGroup',$prodGroup));
    }

    public function store(Request $request)
    {
    	
    	$provider=new Provider;
    	$provider->productgroup_id=$request->get('productGID');
        $provider->name=$request->get('name');
        $provider->replicate();
    	$provider->save();
    	Session::flash('message', 'Tạo mới hãng sản xuất thành công!');
        return Redirect::to('admin/manufact');
    }
    public function destroy($id)
    {
    	Provider::find($id)->delete();
    	Session::flash('message', 'Xóa hãng sản xuất thành công!');
        return Redirect::to('admin/manufact');
    }
}
