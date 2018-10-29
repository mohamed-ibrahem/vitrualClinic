<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /**
     * @user mohamed-ibrahim 2018
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }
}
