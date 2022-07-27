<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class AdminBannerController extends Controller
{
    public function index()
    {
        $active = 'banner';
        $banners = Banner::all();
        return view('admin.banner', compact('active', 'banners'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'Image_eng' => 'required|image',
            'Image_ch'  => 'required|image'
        ]);
        $imageName1 = time() . '.' . $request->Image_eng->extension();
        $imageName2 = time() . '.' . $request->Image_ch->extension();
        $request->Image_eng->storeAs('Banner/english', $imageName1);
        $request->Image_ch->storeAs('Banner/china', $imageName2);
    
        $input = [ 'Image_eng' => $imageName1,'Image_ch' => $imageName2];
    
        Banner::create($input);
        return redirect()->back()->with('success', 'Banner Inserted Sucessfully');
    }
    public function destroy($id)
    {
        $banner = Banner::where('id', $id)->first();
        $pic_eng = $banner->Image_eng;
        $pic_ch = $banner->Image_ch;
        File::delete("Banner/english/" . $pic_eng);
        File::delete("Banner/china/" . $pic_ch);
        $banner->delete();
        return redirect()->back()->with('error', 'Banner Deleted Sucessfully');
    }
}
