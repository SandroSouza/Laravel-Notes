<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        // laod user1s notes

        //show home view
        return view('home');
    }

    public function newNote(){
        echo "Está na new note";
    }
}
