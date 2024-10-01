<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('agenda.index');
    }

    public function mexico()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        $contacts = Contact::whereHas('destination', function($query) {
            $query->where('country', 'Mexico');
        })->get();

        $isAuthenticated = Auth::check();
        return view('agenda.mexico', compact('isAuthenticated', 'contacts', 'destinations'));
    }

    public function searchMexico(Request $request)
    {
        $query = $request->input('query');
        $isAuthenticated = Auth::check();
    
        $contacts = Contact::with('destination')
            ->whereHas('destination', function($q) {
                $q->where('country', 'Mexico');
            })
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('job', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('extension', 'LIKE', "%{$query}%");
            })->get();
    
        return response()->json([
            'contacts' => $contacts,
            'isAuthenticated' => $isAuthenticated
        ]);
    }

    public function jamaica()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        $contacts = Contact::with('destination')->orderBy('name', 'asc')->get();
        $isAuthenticated = Auth::check();
        return view('agenda.jamaica', compact('isAuthenticated', 'contacts', 'destinations'));
    }

    public function searchJamaica(Request $request)
    {
        $query = $request->input('query');
        $isAuthenticated = Auth::check();
    
        $contacts = Contact::with('destination')
            ->whereHas('destination', function($q) {
                $q->where('country', 'Jamaica');
            })
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('job', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('extension', 'LIKE', "%{$query}%");
            })->get();
    
        return response()->json([
            'contacts' => $contacts,
            'isAuthenticated' => $isAuthenticated
        ]);
    }

    public function dominicana()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        $contacts = Contact::with('destination')->orderBy('name', 'asc')->get();
        $isAuthenticated = Auth::check();
        return view('agenda.dominicana', compact('isAuthenticated', 'contacts', 'destinations'));
    }

    public function searchDominicana(Request $request)
    {
        $query = $request->input('query');
        $isAuthenticated = Auth::check();
    
        $contacts = Contact::with('destination')
            ->whereHas('destination', function($q) {
                $q->where('country', 'Republica Dominicana');
            })
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('job', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('extension', 'LIKE', "%{$query}%");
            })->get();
    
        return response()->json([
            'contacts' => $contacts,
            'isAuthenticated' => $isAuthenticated
        ]);
    }

    public function españa()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        $contacts = Contact::with('destination')->orderBy('name', 'asc')->get();
        $isAuthenticated = Auth::check();
        return view('agenda.españa', compact('isAuthenticated', 'contacts', 'destinations'));
    }

    public function searchEspaña(Request $request)
    {
        $query = $request->input('query');
        $isAuthenticated = Auth::check();
    
        $contacts = Contact::with('destination')
            ->whereHas('destination', function($q) {
                $q->where('country', 'España');
            })
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('job', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('extension', 'LIKE', "%{$query}%");
            })->get();
    
        return response()->json([
            'contacts' => $contacts,
            'isAuthenticated' => $isAuthenticated
        ]);
    }
}
