<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $name)
    {
        return "It's Working Fine! " .$id. " with " .$name;
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "this is create method";
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //$data =array("id" => "1","name" => "Haris");
    
    public function content(){  //$id , $name
        // $dataa = [
        //     'id' => "codeIgniter 4 Blog" ,
        //     'name' => "This is our Blog" ,
        // ];
        // return view('content')->with('dataa',$dataa);
        //return view('content')->with('data',$data);
        //return view('content')->with('id',$id)->with('name',$name);  //suitable for passing only one variable
        
        if($this->request->getMethod() == 'post'){
            $tilte = $_POST['Title'];
            $body = $_POST['Body'];
            DB::insert('insert into posts(Title,Body) values(?,?)',[$tile,$body]);
        }
        
        return view('content',compact('id','name'));   //suitable for passing only multiple variable...,
    }

    public function contact(){
        $people = ['haris', 'Munir', 'wasif'];

        return view('contact',compact('people'));
    }
}
