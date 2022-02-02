<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;
Use App\Category;
class BookController extends Controller
{
    function list(){
        //get all books from db
        $books=Book::get();
      // dd($books);
        // view 
        return view('books',[
            'Books'=>$books,
            
        ]);
    }
    function show($id){
        $book=Book::where('id','=',$id)->first();
        
        return view('show',[
            'book'=>$book
        ]);
    }
//create form 
function create(){
    $categories=Category::get();
    return view('create',[
        'categories'=>$categories
    ]);
}


function store(Request $request){
    $validator = \Validator::make($request->all(), 
    [ 
    'name' => 'required|max:100|min:3', 
   'desc' => 'required|max:100|min:3', 
    'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
  ]); 
if($validator->fails()) 
    { 

        return redirect('books/create') 
            ->withErrors($validator) 
            ->withInput(); 
    }

    //image 
    if ($request->hasFile('image')) 
    {
        $image = $request->file('image'); 
$name = time().'_'.\Str::random(15).\Str::random(20).'.'.$image->getClientOriginalExtension(); 
        $destinationPath = public_path('/images'); 
        $image->move($destinationPath, $name); $imageName='images/'.$name; 
    }
    //create
    $book=new Book();
   $book->name=$request->name;
    $book->desc=$request->desc;
    $book->image=$imageName;
    $book->save();
 
$book->categories()->attach($request->categories);

    return redirect('books/list');
 }


 function edit($id)
    {
        $book=Book::find($id);
        return view('edit',[
            'book'=>$book
        ]);
    }
    function update($id, Request $request)
    {
         $validator = \Validator::make($request->all(), 
        [ 
        'name' => 'required|max:100|min:3', 
       'desc' => 'required|max:100|min:3', 
        'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]); 
    if($validator->fails()) 
        { 
            return redirect('books/edit/'.$id) 
                ->withErrors($validator) 
                ->withInput(); 
        }
        
        
        //get the book 
        $book=Book::find($id);
        $book->name=$request->name;
        $book->desc=$request->desc;
        
        //image 
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image'); 
    $name = time().'_'.\Str::random(15).\Str::random(20).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $name); $imageName='images/'.$name; 
            if(isset($book->image))
                unlink($book->image);
            $book->image=$imageName;
            
        }
        
        $book->save();
        
        return redirect('books/show/'.$id);
        
    }

    function delete($id)
    {
        //get record from db 
        $book=Book::find($id);
        if(isset($book->image))
            unlink($book->image);
        $book->delete();
        
        return redirect('books/list');
        
        
    }



}
