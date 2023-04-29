<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promntions;

class PromntionsController extends Controller
{
    public function store(Request $request) {
        Promntions::create([
            'name'=>$request->name,
            'discount'=>$request->discount,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'course_id'=>$request->course_id,
        ]);
        return redirect()->back();
    }
    public function index(){
        $posts = Promntions::all();
        return view('promotions', compact('posts'));
    }
    public function edit($id){
        $post =Promntions::findorFail($id);
        return view('promotioninformation',compact('post'));
    }
    public function Mofifier($id){

        $post =Promntions::findorFail($id);
        return view('modifypromotion',compact('post'));
    }
    public function delete($id){
        Promntions::findorFail($id)->delete();
        return redirect()->back();
        
    }
    public function deletetout($id){
        //?
    }
    public function deleteinformation ($id){
        Promntions::findorFail($id)->delete();
        return redirect()->route('page.promotions');
    }
    public function update(Request $request,$id){
        $post =Promntions::findorFail($id);
        $post->update([
            'name'=>$request->name,
            'discount'=>$request->discount,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            // 'course_id'=>$request->course_id
        ]);
        // $post->name = $request->name;
        // $post->discount = $request->discount;
        // $post->start_date = $request->start_date;
        // $post->end_date = $request->end_date;
        // $post->course_id = $request->course_id;
        return redirect()->route('page.promotions');
    }


    
}
