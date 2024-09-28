<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use Illuminate\Http\Request;


class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        return view('destinations.index', compact('destinations'));
    }
}
