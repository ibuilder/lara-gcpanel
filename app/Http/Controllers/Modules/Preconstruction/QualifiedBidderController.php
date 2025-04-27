php
<?php

namespace App\Http\Controllers\Modules\Preconstruction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QualifiedBidder;

class QualifiedBidderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('qualified_bidders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qualified_bidders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'trade' => 'required',
            'address' => 'required',
        ]);

        // Store the qualified bidder...
        QualifiedBidder::create($validatedData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('qualified_bidders.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'trade' => 'required',
            'address' => 'required',
        ]);

        // Update the qualified bidder...
        QualifiedBidder::whereId($id)->update($validatedData);
    }
    
    public function destroy(string $id){}
}