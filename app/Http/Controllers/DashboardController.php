<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard after user logged in
     *
     * @return void
     */
    public function dashboard(Request $request)
    {
        $users = User::all()->except(Auth::id());

        $receiver = null;
        if(!(empty($request->receiver))){
            $receiver = $users->find($request->receiver);
        }else{
            $receiver = $users->first();
        }

        $receiverId= $receiver->id;
        $senderId= Auth::id();

        /**
         * Retrive all messages between two users.
         */
        $messages = Message::where( function (Builder $query) use ($receiverId, $senderId) {
                $query->where('receiver_id', $receiverId)->where('sender_id', $senderId);
            } )->orWhere( function (Builder $query) use ($receiverId, $senderId){
                $query->where('receiver_id', $senderId)->where('sender_id', $receiverId);
            } )->get();


        return view('dashboard', compact('users', 'receiver', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->sender_id = $request->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        broadcast(new MessageSent($message))->toOthers();
        return redirect()->back();
    }
}
