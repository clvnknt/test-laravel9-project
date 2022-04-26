<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;

class FriendController extends Controller
{
    public function index()
    {
        $mga_kaibigan = Friend::all();
        return view('friends', compact('mga_kaibigan'));
    }

    public function showEditForm($id)
    {
        // SELECT * FROM friends WHERE id=$id
        $friend = Friend::find($id);
        return view('edit-friend', compact('friend'));
    }

    public function saveFriendChanges(Request $request)
    {
        $id = $request->id;

        $friend = Friend::find($id);
        $friend->update([
            'complete_name' => $request->complete_name,
            'contact_number' => substr($request->contact_number, 0, 20),
            'email' => $request->email
        ]);
        // $friend->setCompleteName($request->complete_name);
        // $friend->setContactNumber($request->contact_number);
        // $friend->setEmail($request->email);

        return redirect('/friends');
    }
}
