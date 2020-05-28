<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class instagramController extends Controller
{
    function index(){  
         $photo = DB::table("photo")->get();
         $comment = DB::table('comment')->get();

        return view("index",["photo" => $photo,"comment"=>$comment]);
    }
    function create(){
        return view("create");
    }
    function store(Request $request){
        $title=$request->input("title");
        $description=$request->input("description");
        $image = $request->file("image")->store("public");
        DB::table("photo")->insert(
            ["image" => $image, "title"=>$title, "description" => $description]);
            return redirect("/photos");
    }
    function storeComment($id, Request $request){
        $comment=$request->input("comment");
        DB::table("comment")->insert(
            ["message" => $comment, "photo_id" => $id]);
            return redirect("/photos");
    }
    function edit($id){
        $photo = DB::table("photo")->find($id);
        return view("edit", ["photo" => $photo]);
    }
    function update($id, Request $request){
        $image = $request->file("photo")->store("public");
        $title = $request->input('title');
        $description = $request->input('description'); 
        DB::table("photo")->where("id",$id)->update(["id"=>$id, "image"=>$image ,"title"=>$title,"description"=>$description]);
        return redirect("/photos");
    }
    function destroy($id){
        DB::table('photo')->where('id', '=', $id)->delete();
        return redirect("/photos");
       }
}