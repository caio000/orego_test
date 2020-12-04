<?php

namespace App\Http\Controllers;

use App\Models\Planos;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        return Planos::simplePaginate(15);
    }
}
