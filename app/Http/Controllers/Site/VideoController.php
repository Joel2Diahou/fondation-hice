<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::where('est_publie', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('site.videos.index', compact('videos'));
    }
}
