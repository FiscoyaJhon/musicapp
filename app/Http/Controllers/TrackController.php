<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::all();
		return view('tracks.index',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Crear Musica';
        $route = route('tracks.store');
        $button = 'Register';
        return view('tracks.create', compact('title', 'route', 'button'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'music' => 'required|mimes:mp3',
        ]);
        $path = "public/music/noname.mp3";
        if ($request->hasFile('music'))
            $path = $request->music->store('public/music');
        $track = Track::create([
            'title' => $request->title,
            'path' => $path,
        ]);
        $track->save();
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        $title = 'Editar Muscia';
        $route = route('tracks.update', ['track' => $track]);
        $button = 'Update';
        return view('tracks.edit', compact('title', 'route', 'button', 'track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required|max:100',
            'music' => 'required|mimes:mp3',
        ]);
        $path = "public/music/noname.mp3";
        if ($request->hasFile('music'))
            $path = $request->music->store('public/music');
        $track = Track::create([
            'title' => $request->title,
            'path' => $path,
        ]);
        $track->save();
        return redirect()->route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index')->with('success', 'Deleted with success');
    }
}
