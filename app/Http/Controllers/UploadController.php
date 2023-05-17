<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Http\Requests\Media\UploadImageRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UploadImageRequest $request)
    {
        $file = $request->file('file');
        $name = $file->hashName();

        $upload = Storage::put("uploads/{$name}", $file);

        Media::query()->create(
            attributes: [
                'name' => "{$name}",
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'path' => "uploads/" . $name . $file,
                'disk' => config('app.uploads.disk'),
                'collection' => $request->get('collection'),
                'size' => $file->getSize(),
            ],
        );
    }
}
