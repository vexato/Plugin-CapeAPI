<?php

namespace Azuriom\Plugin\SkinApi\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Azuriom\Models\User;

class ApiController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_skin($user_id)
    {
        if(Storage::disk('public')->exists("skins/{$user_id}.png"))
        {
            return Storage::disk('public')->response("skins/{$user_id}.png", 'skin.png', [
                'Content-Type' => 'image/png'
            ]);
        } else {
            return response()->file(base_path().'/plugins/skin-api/assets/img/steve.png', [
                'Content-Type' => 'image/png'
            ]);
        }
    }

    public function update_skin(Request $request)
    {
        $this->validate($request, [
            'access_token' => 'required|string',
            'skin' => 'required | mimes:png | max:1000',
        ]);

        $user = User::firstWhere('access_token', $request->input('access_token'));

        if ($user === null) {
            return response()->json(['status' => false, 'message' => 'Invalid token'], 422);
        }

        if ($user->is_banned) {
            return response()->json(['status' => false, 'message' => 'User banned'], 422);
        }

        $path = Storage::disk('public')->putFileAs(
            'skins', $request->file('skin'), "{$user->id}.png"
        );

        return $path;
    }
}
