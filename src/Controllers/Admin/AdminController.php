<?php

namespace Azuriom\Plugin\SkinApi\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skin-api::admin.index');
    }
}
