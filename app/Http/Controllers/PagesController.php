<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to CollectionOfStories!';
       // return view('pages.index', compact('title'));
        return view('sections.index')->with('title', $title);
    }

   /* public function stories(){
        $title = 'Welcome to section stories!';
        //return view('pages.index', compact('title'));
        return view('sections.stories')->with('title', $title);
    }*/
}
