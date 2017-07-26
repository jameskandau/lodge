<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = RoomType::orderBy('id','DESC')->get();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required|integer',
            'description'=>'required']);
        $type = new RoomType();
        $type->name = $request->input('name');
        $type->price = $request->input('price');
        $type->description = $request->input('description');
        $type->save();
        return redirect()->to('/room-types')->with('success','Room Type Created Successfully');
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
        $room = RoomType::findOrFail($id);
        return view('types.edit', compact('room'));
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
        $type = RoomType::findOrFail($id);
        $type->name = $request->input('name');
        $type->price = $request->input('price');
        $type->description = $request->input('description');
        $type->update();
        return redirect()->to('/room-types')->with('updated','Room Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
