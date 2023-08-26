<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // Import the Image facade
use App\Models\Portfolio;
use Carbon\Carbon;

class PortfolioController extends Controller
{
  public function  AllPortfolio(){
    $Portfolio=Portfolio::latest()->get();
    return view('admin.Portfolio.Portfolio_all',compact('Portfolio'));
    }
   
    public function UpdatePortfolio(Request $request){

        $Portfolio_id = $request->id;
        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image'); // Use -> instead of -
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;
            Portfolio::findOrFail($Portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url, // Remove $request-> before $save_url
            ]);
            $notification = array(
                'message' => 'home slide update with image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); // Use -> instead of >
        } else {
            Portfolio::findOrFail($Portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);
            $notification = array(
                'message' => 'home slide update without image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); // Use -> instead of >
        }

    }



    public function destroyImage($id)
    {
        $Portfolio = Portfolio::find($id);
        if ($Portfolio) {
            $Portfolio->delete();
        }    

        return redirect()->back()->with('success', 'image deleted successfully.');
    }

    public function editPortfolio($id){
        $Portfolio = Portfolio::find($id);
        return view('admin.Portfolio.update_portfolio',compact('Portfolio'));
    }
    public function AddPortfolio(Request $request)
    {
        $validatedData = $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'nullable|image|max:2048',
        ]);
    
        $portfolio = new Portfolio();
        $portfolio->portfolio_name = $validatedData['portfolio_name'];
        $portfolio->portfolio_title = $validatedData['portfolio_title'];
        $portfolio->portfolio_description = $validatedData['portfolio_description'];
    
        if ($request->hasFile('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_path = 'upload/home_slide/' . $name_gen;
    
            Image::make($image)->resize(1020, 519)->save($save_path);
    
            $portfolio->portfolio_image = $save_path;
        }
    
        $portfolio->save();
    
        $notification = [
            'message' => 'MultiImage Inserted Successfully',
            'alert-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    }
    
        
        public function AddINGPortfolio(){
        

            return view('admin.Portfolio.Add_portfolio');

        }




     }




