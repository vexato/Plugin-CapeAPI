<?php

namespace Azuriom\Plugin\SkinApi\Controllers;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class skinApiHomeController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skin-api::index');
    }

    public function update_skin(Request $request)
    {
        $this->validate($request, [
            'skin' => 'required|mimes:png',
        ]);
        $path = Storage::disk('public')->putFileAs(
            'skins', $request->file('skin'), "{$request->user()->id}.png"
        );

        return redirect()->back()->with('success', 'Skin changed');
    }
}
