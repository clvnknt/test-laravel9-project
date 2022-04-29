<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Exception;
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
        // SELECT * FROM organizations WHERE id=$id
        $organization = Organization::find($id);
        if (!is_null($organization)) {
            return view('edit-organization', compact('organization'));
        }
        Session::flash('error', 'We cannot find the record you are looking for.');
        return redirect()->back();
    }

    public function showNewForm()
    {
        return view('new-organization-form');
    }

    public function saveOrganizationChanges(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'contact_number' => 'required|max:20'
        ]);

        try {
            $id = $request->id;
            $organization = Organization::find($id);
            // UPDATE organizations SET
            // name=$request->name,
            // type=$request->type,
            // contact_number=$request->contact_number,
            // address=$request->address,
            // website_url=$request->website_url
            // WHERE id=$request->id
            $organization->update([
                'name' => $request->name,
                'type' => $request->type,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'website_url' => $request->website_url
            ]);
            // $organization->setName($request->name);
            // $organization->setAddress($request->address);
            // $organization->setContactNumber($request->contact_number);
            // $organization->setType($request->type);
            // $organization->setWebsiteURL($request->website_url);

            Session::flash('message', 'Successfully updated organization');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later');
        }
        
        return redirect('/organizations');
    }

    public function saveNewOrganization(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'contact_number' => 'required|max:20'
        ]);

        try {
            $org = Organization::create([
                'name' => $request->name,
                'type' => $request->type,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'website_url' => $request->website_url
            ]);
            if (!is_null($org)) {
                Session::flash('message', 'Successfully added a new organization');
            } else {
                throw new Exception('Unable to create a new organization');
            }
            
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later');
        }

        return redirect('/organizations');
    }

    public function deleteOrganization($id)
    {
        $organization = Organization::find($id);
        $organization->delete();
        // DELETE FROM organizations WHERE id=$id

        Session::flash('message', 'Successfully removed a record');
        return redirect('/organizations');
    }
}
