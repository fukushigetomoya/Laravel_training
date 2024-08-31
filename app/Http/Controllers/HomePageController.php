<?php

namespace App\Http\Controllers;

use App\Models\BookRecord;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display the list of book records.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookRecords = BookRecord::all();
        return view('home', compact('bookRecords'));
    }
}
