<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminPromotionController extends Controller
{
    public function index()
    {
        $active = 'promotion';
        $promotions = Promotion::all();
        return view('admin.promotion', compact('active', 'promotions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'Image_eng' => 'required|image',
            'Image_ch'  => 'required|image'
        ]);
        $imageName1 = time() . '.' . $request->Image_eng->extension();
        $imageName2 = time() . '.' . $request->Image_ch->extension();
        $request->Image_eng->storeAs('Promotion/english', $imageName1);
        $request->Image_ch->storeAs('Promotion/china', $imageName2);
    
        $input = [ 'Image_eng' => $imageName1,'Image_ch' => $imageName2];
    
        Promotion::create($input);
        return redirect()->back()->with('success', 'Promotion Banner Inserted Sucessfully');
    }
    public function destroy($id)
    {
        $promotion = Promotion::where('id', $id)->first();
        $pic_eng = $promotion->Image_eng;
        $pic_ch = $promotion->Image_ch;
        File::delete("Promotion/english/" . $pic_eng);
        File::delete("Promotion/china/" . $pic_ch);
        $promotion->delete();
        return redirect()->back()->with('error', 'Promotion Banner Deleted Sucessfully');
    }
}
