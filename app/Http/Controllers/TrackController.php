<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Track;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Request as ClientRequest;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->orderBy('title')->get();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string','required', 'max:255'],
            'artist' => ['string','required', 'max:255'],
            'image' => ['image','required'],
            'music' => ['file','required', 'extensions:mp3,wav'],
            'display' => ['boolean','required'],
        ]);

        $uuid = 'trk-' . Str::uuid();
        $imageExtension = $request->image->extension();
        $imagePath = $request->image->storeAS('tracks/images', $uuid . '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $musicPath = $request->music->storeAS('tracks/music', $uuid . '.' . $musicExtension);

        Track::create([
            'title' => $request->title,
            'uuid' =>  $uuid,
            'artist' => $request->artist,
            'image' => $imagePath,
            'music' => $musicPath,
            'display' => $request->display,
        ]);

        return redirect()->route('tracks.index');
    }

    public function edit(Track $track){
        return Inertia::render('Track/Edit', [
            'track' => $track,
        ]);
    }

    public function update(Request $request, Track $track){
        $request->validate([
            'title' => ['string', 'required', 'max:255'],
            'artist' => ['string', 'required', 'max:255'],
            'display' => ['boolean', 'required'],
        ]);

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;
        $track->save();

        return redirect()->route('tracks.index');
    }

    public function destroy(Track $track){
        $track->delete();
        return redirect()->route('tracks.index');
    }
}