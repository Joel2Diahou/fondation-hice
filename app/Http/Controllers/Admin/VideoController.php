<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'url' => 'nullable|url',
            'fichier' => 'nullable|file|mimes:mp4,webm,ogg,avi,mov|max:102400', // Max 100MB
            'description' => 'nullable|string',
            'categorie' => 'nullable|string',
            'thumbnail' => 'nullable|url',
            'est_publie' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Gérer l'upload du fichier vidéo
        if ($request->hasFile('fichier')) {
            $path = $request->file('fichier')->store('videos', 'public');
            $data['fichier'] = $path;
        }

        Video::create($data);
        return redirect()->route('admin.videos.index')->with('success', 'Vidéo ajoutée avec succès !');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'url' => 'nullable|url',
            'fichier' => 'nullable|file|mimes:mp4,webm,ogg,avi,mov|max:102400',
            'description' => 'nullable|string',
            'categorie' => 'nullable|string',
            'thumbnail' => 'nullable|url',
            'est_publie' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Gérer l'upload du fichier vidéo
        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier
            if ($video->fichier && Storage::disk('public')->exists($video->fichier)) {
                Storage::disk('public')->delete($video->fichier);
            }
            $path = $request->file('fichier')->store('videos', 'public');
            $data['fichier'] = $path;
        }

        $video->update($data);
        return redirect()->route('admin.videos.index')->with('success', 'Vidéo mise à jour !');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Supprimer le fichier vidéo
        if ($video->fichier && Storage::disk('public')->exists($video->fichier)) {
            Storage::disk('public')->delete($video->fichier);
        }

        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Vidéo supprimée !');
    }
}
