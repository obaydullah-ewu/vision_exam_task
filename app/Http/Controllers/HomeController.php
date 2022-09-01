<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data['pageTitle'] = 'Home';
        $data['navHomeActiveClass'] = 'active';
        return view('home')->with($data);
    }
}
