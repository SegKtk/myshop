<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;

class PhotoController extends Controller
{
    public function create()
    {
        return view('photo');
    }

    public function store(ImagesRequest $request)
    {
        $request->file('image')->storeAs(
            'articles',
            'lolo2.jpg',
            'public'
        );

        //$request->image->store(config('images.path'), 'public');

        return view('photo_ok');
    }
}
