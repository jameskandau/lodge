<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\roomType;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $rooms = Room::orderBy('id','DESC')->get();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RoomType::pluck('name','id');
        return view('rooms.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',
            'description'=>'required']);
        $room = new Room();
        $room->room_number = $request->input('name');
        $room->type_id = $request->input('type');
        $room->description = $request->input('description');
        $room->save();
        return redirect()->to('/rooms')->with('success','Room Added Succesfully');

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
        $room = Room::findOrFail($id);
         $types = RoomType::pluck('name','id');
        return view('rooms.edit', compact('room','types'));
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
        $room = Room::findOrFail($id);
        $room->room_number = $request->input('room_number');
        $room->type_id = $request->input('type');
        $room->description = $request->input('description');
        $room->update();
        return redirect()->to('/rooms')->with('updated','Room Updated Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $room = Room::findOrFail($id);
       $room->delete();
       return back()->with('deleted','Room Succesfully Deleted');
    }
}
