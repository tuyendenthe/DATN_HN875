<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('uploads', 'public');
            $url = Storage::url($path);

            return response()->json([
                'url' => $url,
            ]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
