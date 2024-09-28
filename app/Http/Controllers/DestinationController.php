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

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'country' => 'required',
        ]);

        $register = Destination::create($data);

        return redirect()->route('destinations.index');
    }

    public function edit(string $id)
    {
        $destination = Destination::findOrFail($id);

        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'country' => 'required',
        ]);

        $register = Destination::findOrFail($id);
        $register->update($data);

        return redirect()->route('destinations.index');
    }

    public function destroy(string $id)
    {
        $register = Destination::findOrFail($id);
        $register->delete();

        return redirect()->route('destinations.index');
    }
}
