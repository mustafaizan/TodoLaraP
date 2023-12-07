<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
0

İ
        $apps = App::latest()->paginate(5);
        return view('apps.index',compact('apps'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('apps.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):  RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        App::create($request->all());

        return redirect()->route('apps.index')->with('success','App created successfully.');
    }
  
    /**
     * Display the specified resource.
     */ 
    public function show(App $app): View
    { 

        return view('apps.show')->with(compact('app'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(App $app): View
    {
        return view('apps.edit')->with(compact('app'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, App $app)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $app->update($request->all());

        return redirect()->route('apps.index')->with('success','App updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(App $app)
    {
        $app->delete();
        return redirect()->route('apps.index')->with('seccess', 'App deleted successfully');

    }
}
