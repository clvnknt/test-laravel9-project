<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Session;

class OrganizationController extends Controller
{
    public function index()
    {
        // SELECT * FROM organizations
        $organizations = Organization::all();
        return view('organizations', compact('organizations'));
    }

    public function showEditForm($id)
    {
        $organization = Organization::find($id);
        if (!is_null($organization)) {
            return view('edit-organization', compact('organization'));
        }
        return redirect()->back();
    }

    public function saveOrganizationChanges(Request $request)
    {
        $id = $request->id;
        $organization = Organization::find($id);
        $organization->setName($request->name);
        $organization->setAddress($request->address);
        $organization->setContactNumber($request->contact_number);
        $organization->setType($request->type);

        Session::flash('message', 'Successfully updated organization');
        return redirect('/organizations');
    }
}
