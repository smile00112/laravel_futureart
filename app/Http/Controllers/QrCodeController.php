<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function show(Album $album, Foto $foto)
    {
        if(!$foto->status || !$foto->thumbnail)
            abort(404);
        //return $album->title . '/' . Storage::url($foto->thumbnail);
        return QrCode::size(400)->generate(
            Storage::url($foto->thumbnail)
        );
    }
}
