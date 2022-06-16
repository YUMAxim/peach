<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Recruit;

class DownloadController extends Controller
{
    public function index($id)
    {
        $recruit = Recruit::find($id);
        $filePath = $recruit->file_path;
        $fileName = $recruit->file_name;
        $mimeType = Storage::mimeType($filePath);
        $headers = [['Content-type' => $mimeType]];
        // dd($id, $recruit, $mimeType);
        return Storage::download($filePath, $fileName, $headers);
    }
}
