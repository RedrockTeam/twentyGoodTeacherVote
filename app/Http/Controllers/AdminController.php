<?php

namespace App\Http\Controllers;

use App\Model\Candidate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index() {
        $candidate = Candidate::all();
        return view('admin.index')->with('candidate', $candidate);
    }


}
