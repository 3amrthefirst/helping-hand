<?php

namespace App\Http\Controllers;

use App\Model\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tips=Tip::all();
        return view("admin.tips.default")->with("data",$tips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tips.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);
        Tip::create($request->all());

        Session::flash('message','Tips added successfully ');
        Session::flash('alert-class', 'alert-success');
        return redirect("admin/tips/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tip = Tip::find($id);
        return view("admin.tips.edit" , compact('tip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png,svg',
        ]);
        $tip = Tip::find($id);
        $tip->update($request->all());

        Session::flash('message','Tips updated successfully ');
        Session::flash('alert-class', 'alert-success');
        return redirect("admin/tips/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tip = Tip::find($id);
        $tip->delete();
        Session::flash('message','Tips Deleted successfully ');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
