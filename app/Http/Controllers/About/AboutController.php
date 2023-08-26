<?php

namespace App\Http\Controllers\About;

use App\Models\About;
use Intervention\Image\Facades\Image; // Import the Image facade
use App\Models\MultiImage;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About()
    {
        $about = About::find(1);
        return view('admin.about_page.about', compact('about'));
    }



    public function AboutPage()
    {
        $about = About::find(1);
        return view('visiteur.about_page', compact('about'));
    }


    public function UpdateAbout(Request $request)
    {
        $About_id = $request->id;
        if ($request->file('about_image')) {
            $image = $request->file('about_image'); // Use -> instead of -
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;
            About::findOrFail($About_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_description' => $request->about_description,

                'about_image' =>  $save_url,
            ]);
            $notification = array(
                'message' => 'home About update with image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); // Use -> instead of >
        } else {
            About::findOrFail($About_id)->update([

                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_description' => $request->about_description,

            ]);
            $notification = array(
                'message' => 'home slide update without image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); // Use -> instead of >
        }
    }



    public function AboutMultiImage()
    {
        return view('admin.about_page.multimage');
    }


    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('multi_images');
        foreach ($image as $multi_image) {

            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(220, 220)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;
            MultiImage::insert([


                'multi_images' =>  $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => ' MultiImage Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); // Use -> instead of >

    }


    public function AllMultiImage()
    {
        $allmultiImage = MultiImage::all();
        return view('admin.about_page.all_multiImage', compact('allmultiImage'));
    }

    public function destroyImage($id)
    {
        $MultiImage = MultiImage::find($id);
        if ($MultiImage) {
            $MultiImage->delete();
        }    

        return redirect()->back()->with('success', 'image deleted successfully.');
    }


    public function foreach()
    {
        $allmultiImage = MultiImage::all(); // Fetch all articles from the database

        return view('admin.about_page.all_multiImage', compact('allmultiImage'));
    }


    public function updateMultiImage(Request $request, $id)
    {
        $image = $request->file('multi_images');

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Delete previous image
            $multiImage = MultiImage::findOrFail($id);
            $previous_image = $multiImage->multi_images;
            if (file_exists($previous_image)) {
                unlink($previous_image);
            }

            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;

            $multiImage->multi_images = $save_url;
            $multiImage->save();

            $notification = array(
                'message' => 'Home About update with image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.foreach')->with($notification);
        } else {
            // Handle the case when no image is provided
            $notification = array(
                'message' => 'Please select an image to update.',
                'alert-type' => 'error'
            );

            return view('admin.about_page.all_multiImage')->with($notification);
        }
    }


    public function editimage(Request $request, $id)
    {

        $multiImage = MultiImage::findOrFail($id);

        return view('admin.about_page.upadte_image', compact('multiImage'));
    }



}
