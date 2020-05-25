<?php

namespace Azuriom\Plugin\SkinApi\Controllers;

use Azuriom\Http\Controllers\Controller;

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
}
