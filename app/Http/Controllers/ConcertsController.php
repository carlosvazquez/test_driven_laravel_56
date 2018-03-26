<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concert;

class ConcertsController extends Controller
{
    public function index()
    {
        return view('concerts.index');
    }
    public function show($id)
    {
        $concert = Concert::published()->findOrFail($id);
        return view('concerts.show', ['concert' => $concert]);
    }
}
