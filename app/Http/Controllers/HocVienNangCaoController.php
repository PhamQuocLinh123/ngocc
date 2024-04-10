<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HocVienNangCao;

class HocVienNangCaoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            // Define your validation rules here
        ]);

        // Create a new instance of HocVienNangCao
        $hocVienNangCao = HocVienNangCao::create($validatedData);

        // Return a response or redirect
    }
}
