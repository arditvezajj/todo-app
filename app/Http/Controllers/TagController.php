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

    $tag = $request->validate([

        'tag' => 'required|max:200',
    ]);
    
    $tags=Tag::create($tag);
    return back()->with("message","Tag has been created"); 


    }
     public function edit(Tag $tag){

       return view('tags.edit',['tag' => $tag,]);
     }
     public function update(Request $request, Tag $tag)
     {
        $tags = $request->validate([
        'tag' => 'required|max:200',]);
        $tag->update($tags);
         return back()->with("message","Tag has been updated");
     }

     public function destroy(Tag $tag)
     {
         $tag->delete();
         return back()->with('message', 'Tag was deleted');
     }
     protected function query(Request $request)
    {
        $tag = $request->tag();
        $tagSelect = $request->get('select'); 
    }
} 