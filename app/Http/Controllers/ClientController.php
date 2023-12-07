<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index()
    {
        return Inertia::render('Clients/Index', [            
            'clients' => Auth::user()->clients()
                ->with('user')   
                ->get()                                          
        ]);        
    }

    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50'],               
        ]);

        Client::create([
            'name' => Request::get('name'),            
            'user_id' => Auth::user()->id,
        ]);

        return Redirect::route('client')->with('success', 'Client created.');
    }

    public function edit(Client $client)
    {
        return Inertia::render('Clients/Edit', [
            'client' => [
                'id' => $client->id,
                'name' => $client->name,                
            ],
        ]);
    }

    public function update(Client $client)
    {
        Request::validate([
            'name' => ['required', 'max:50'],            
        ]);

        $client->update(Request::only('name'));
        
        return Redirect::route('client')->with('success', 'Client updated.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return Redirect::route('client')->with('success', 'Client deleted.');
    }
}
