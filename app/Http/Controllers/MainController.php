<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        echo "Está na index";
    }

    public function newNote(){
        echo "Está na new note";
    }
}
