<?php

namespace App\Http\Controllers\Home;
use App\Models\HomeSlide;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // Import the Image facade

class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        $homedlider = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homedlider'));
    }
   
    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide'); // Use -> instead of -
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;
            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'home_slide' => $save_url, // Remove $request-> before $save_url
                'video_url' => $request->video_url,
            ]);
            $notification = array(
                'message' => 'home slide update with image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); // Use -> instead of >
        } else {
            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);
            $notification = array(
                'message' => 'home slide update without image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); // Use -> instead of >
        }
    }
}
