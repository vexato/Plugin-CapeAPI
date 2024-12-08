<?php

namespace Azuriom\Plugin\CapeApi\Controllers;
use Azuriom\Plugin\CapeApi\CapeAPI;
use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CapeApiHomeController extends Controller
{
    /**
     * Show the home plugin page.
     */
    public function index(Request $request)
    {
        return view('capeapi::index', [

            'capeUrl' => route('capeapi.api.showCapes', $request->user()->id).'?v='.Str::random(4),
        ]);
    }

    public function updateCape(Request $request)
    {
        $this->validate($request, [
            'cape' => [
                'required',
                'mimes:jpeg,png,jpg,gif,svg',
            ],
        ]);
        $capePathPng = "capes/{$request->user()->id}.png";
        $capePathGif = "capes/{$request->user()->id}.gif";

        if (Storage::disk('public')->exists($capePathPng)) {
            Storage::disk('public')->delete($capePathPng);
        }

        if (Storage::disk('public')->exists($capePathGif)) {
            Storage::disk('public')->delete($capePathGif);
        }
        $request->file('cape')->storeAs('capes', "{$request->user()->id}.{$request->file('cape')->extension()}", 'public');
        return redirect()->back()->with('success', trans('capeapi::messages.updatedCape'));
    }
}
