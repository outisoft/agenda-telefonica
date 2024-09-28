<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Destination;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::with('destination')->orderBy('name', 'asc')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        return view('contacts.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'department' => 'required',
            'destination_id' => 'required|exists:destinations,id',
            'extension' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Contact::class],
        ]);

        $register = Contact::create($data);

        return redirect()->route('contacts.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        $destinations = Destination::orderBy('name', 'asc')->get();

        return view('contacts.edit', compact('contact', 'destinations'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'department' => 'required',
            'destination_id' => 'required|exists:destinations,id',
            'extension' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $id,
        ]);

        $register = Contact::findOrFail($id);
        $register->update($data);

        return redirect()->route('contacts.index');
    }

    public function destroy(string $id)
    {
        $register = Contact::findOrFail($id);
        $register->delete();

        return redirect()->route('contacts.index');
    }
}
