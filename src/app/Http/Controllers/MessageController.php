<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecruitRequest;
use App\Models\Recruit;
use App\Models\Role;
use App\Models\RolesCategory;
use App\Models\RecruitRole;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer as TypesInteger;
use Ramsey\Uuid\Type\Integer;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room, int $id)
    {
        // dd($id);
        if ($id == auth()->id()) {
            return redirect()->route('users.show', ['id' => $id]);
        } else {
            $roomId = $room->setRoomId($id);
            $room = Room::find($roomId);
            $messages = Message::where('room_id', $roomId)->get();
            // dd($messages, $roomId, $room);

            $data = ['roomId' => $roomId, 'messages' => $messages];
            return view('components.message', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message;
        $partnerUserId = Room::find($request->room_id)->partnerUserId();
        $message->fill($request->all());
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();
        // dd($request, $partnerUserId, $message);
        return redirect()->route('message.index', ['id' => $partnerUserId]);
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
        //
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
        //
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

    public function list()
    {
        return view('users.message');
    }


}
