<?php

namespace Azuriom\Plugin\CapeApi\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\CapeApi\CapeAPI;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Azuriom\Models\User;

class ApiController extends Controller
{
    /**
     * Show the plugin API default page.
     */

    public function showCapes(string $user)
    {
        if (Str::endsWith($user, '.png') || Str::endsWith($user, '.gif')) {
            $user = Str::beforeLast($user, '.');
        }

        $userId = User::where('id', $user)->orWhere('name', $user)->value('id');

        if ($userId === null) {
            return response()->file(base_path().'/plugins/cape-api/assets/img/cape.png', [
                'Content-Type' => 'image/png',
            ]);
        }

        $capePathPng = "capes/{$userId}.png";
        $capePathGif = "capes/{$userId}.gif";

        if (Storage::disk('public')->exists($capePathPng)) {
            return Storage::disk('public')->response($capePathPng, 'cape.png', [
                'Content-Type' => 'image/png',
            ]);
        } elseif (Storage::disk('public')->exists($capePathGif)) {
            return Storage::disk('public')->response($capePathGif, 'cape.gif', [
                'Content-Type' => 'image/gif',
            ]);
        } else {
            return response()->file(base_path().'/plugins/cape-api/assets/img/cape.png', [
                'Content-Type' => 'image/png',
            ]);
        }
    }

    public function updateCape(Request $request)
    {
        $this->validate($request, [
            'access_token' => 'required|string',
            'cape' => ['required', 'mimes:png,gif', CapeAPI::getCapeRule()],
        ]);

        $user = User::firstWhere('access_token', $request->input('access_token'));

        if ($user === null) {
            return response()->json(['status' => false, 'message' => 'Invalid token'], 422);
        }

        if ($user->isBanned()) {
            return response()->json(['status' => false, 'message' => 'User banned'], 422);
        }

        // Delete existing capes
        $capePathPng = "capes/{$user->id}.png";
        $capePathGif = "capes/{$user->id}.gif";

        if (Storage::disk('public')->exists($capePathPng)) {
            Storage::disk('public')->delete($capePathPng);
        }

        if (Storage::disk('public')->exists($capePathGif)) {
            Storage::disk('public')->delete($capePathGif);
        }

        // Store the new cape
        return $request->file('cape')->storeAs('capes', "{$user->id}.{$request->file('cape')->extension()}", 'public');
    }
}
