<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  public function index(){

    $tags=Tag::all();

    return view ('tags.index', ['tags' => $tags]);
    }   

 public function store(Request $request){

    $data = $request->validate([

        'tag' => 'nullable',
    ]);
    
    Tag::create($data);
    
    return back ();
    }
     public function edit(Tag $tags){

       return view('tags.index');
     }

     public function destroy(Tag $tag)
     {
         $tag->delete();
         return back()->with('message', 'Tag was deleted');
     }
}