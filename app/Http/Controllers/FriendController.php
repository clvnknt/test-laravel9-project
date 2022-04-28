<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;

class FriendController extends Controller
{
    public function index()
    {
        $mga_kaibigan = [];

        try {
            $mga_kaibigan = Friend::all();
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        
        return view('friends', compact('mga_kaibigan'));
    }

    public function showEditForm($id)
    {
        // SELECT * FROM friends WHERE id=$id
        $friend = Friend::find($id);
        return view('edit-friend', compact('friend'));
    }

    public function showNewForm()
    {
        return view('new-friend-form');
    }

    public function saveFriendChanges(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required',
                'complete_name' => 'required|max:100',
                'email' => 'email|unique:friends',
                'contact_number' => 'required|max:20'
            ]);
            $id = $request->id;

            $friend = Friend::find($id);
            $result = $friend->update([
                'complete_name' => $request->complete_name,
                'contact_number' => substr($request->contact_number, 0, 20),
                'email' => $request->email
            ]);

            if ($result == false) {
                $request->session()->flash('error', 'Unable to modify the record');
            } else {
                $request->session()->flash('message', 'Successfully updated record');
            }
        } catch (Exception $e) {
            $request->session()->flash('message', $e->getMessage());
        }

        return redirect('/friends');
    }

    public function saveNewFriend(Request $request)
    {
        $validated = $request->validate([
            'complete_name' => 'required|max:100',
            'email' => 'email|unique:friends',
            'contact_number' => 'required|max:20'
        ]);

        $complete_name = $request->complete_name;
        $email = $request->email;
        $contact_number = substr($request->contact_number, 0, 20);

        $friend = Friend::create([
            'complete_name' => $complete_name,
            'email' => $email,
            'contact_number' => $contact_number
        ]);

        if (!is_null($friend)) {
            $request->session()->flash('message', 'New friend record has been added into the database');
        } else {
            $request->session()->flash('error', 'Unable to save new friend record');
        }

        return redirect('/friends');
    }

    public function deleteFriend(Request $request, $id)
    {
        $friend = Friend::find($id);
        if (!is_null($friend)) {
            $friend->delete();
            $request->session()->flash('message', 'Record has been deleted');
        } else {
            $request->session()->flash('error', 'Unable to remove the record');
        }

        return redirect('/friends');
    }
}
