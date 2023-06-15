<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\article;

class ArticleController extends Controller
{
    public function views(){
        
        return view('admin/article');

    }
    public function foreach()
   { $articles = Article::all(); // Fetch all articles from the database

        return view('admin/table_article', compact('articles'));
    }

  

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'qantity' =>'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048', // Assuming you're validating an image upload
        ]);
        $article = new article();
        $article->name = $validatedData['name'];
        $article->qantity = $validatedData['qantity'];
        $article->price = $validatedData['price'];
        $article->stock = $validatedData['stock'];
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $article['image'] = $filename;
        }

     // Save the changes to the database
     $article->save();
        
     return redirect()->route('admin.views');
    }



     public function edit($id){
        $article = Article::find($id);
        return view('admin/article_edite', compact('article'));

     }
     


     public function destroy($id)
     {
         $article = Article::find($id);
         if ($article) {
             $article->delete();
         }
         return redirect()->route('admin.foreach')->with('success', 'Article deleted successfully.');
     }
 
     public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'qantity' =>'required|integer',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|image|max:2048', // Assuming you're validating an image upload
        ]);

        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('admin.foreach')->with('error', 'Article not found.');
        }
        $article->name = $validatedData['name'];
        $article->qantity = $validatedData['qantity'];
        $article->price = $validatedData['price'];
        $article->stock = $validatedData['stock'];
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $article['image'] = $filename;
        }

     // Save the changes to the database
     $article->save();
        
     return redirect()->route('admin.foreach')->with('success', 'Article updated successfully.');
    }
    public function search(Request $request){
        $query = $request->input('query'); 
        $articles = Article::where('name', 'like', "%$query%")
            ->get();
    
            return view('admin/table_article', compact('articles'));    }
    

    public function show($id)
        {
            $article = Article::findOrFail($id);
            return view('admin/table_article', compact('article'));
        }






     }

