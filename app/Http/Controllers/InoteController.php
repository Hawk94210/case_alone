<?php

namespace App\Http\Controllers;

use App\Models\Inote;
use Illuminate\Http\Request;

class InoteController extends Controller
{
    public function create()
    {
        return view('backend.create');
    }


    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'content' => 'required',
        ]);
        dd(1);
        $path = $request->file('image')->store('public/images');
        $inote = new Inote();
        $inote->title = $request->title;
        $inote->content = $request->content;    
        $request->image = $path;
        $inote->save();
        return redirect()->route('show.index')->with('success','Successfully added');
    }  
    public function edit($id)
    {
        $inote = Inote::findOrFail($id);
        return view('backend.edit',compact('inote'));
    }

    public function update($id,Request $request)
    {   
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $inote_old = Inote::findOrFail($id);
        $inote =  new Inote();
        if ($request->hasFile('image')) {
            $request->validate([
                'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
            $path = $request->file('image')->store('public/images');
            $request->image = $path;
        }
        $inote->title = $request->title;
        $inote->content = $request->content;
        $inote->save();
        $inote_old->delete();
        return redirect()->route('show.index')->with('success','Successful fix');
    }
}
