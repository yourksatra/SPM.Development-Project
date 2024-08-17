<?php

namespace App\Http\Controllers;

use App\Models\IndikatorSPM;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = "Home Page";
        $indikatorList = IndikatorSPM::all();  // Sesuaikan dengan model dan data yang ada
        $puskesmasList = Puskesmas::paginate(10);  // Sesuaikan dengan model dan data yang ada

        return view('home', compact('title', 'indikatorList', 'puskesmasList'));
    }

    public function pagehukum()
    {
        $data['title'] = "Landasan Hukum";
        return view('hukum', $data);
    }

    public function loginPage()
    {
        return view('logPage');
    }
}