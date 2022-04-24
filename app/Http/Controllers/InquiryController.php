<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // SELECT * FROM inquiries
        $inquiries = Inquiry::all();
        return view('inquiries', compact('inquiries'));
    }
}
