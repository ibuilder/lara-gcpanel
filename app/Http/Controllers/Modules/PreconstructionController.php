<?php

namespace App\Http\Controllers\Modules\Preconstruction;

use App\Http\Controllers\Controller;
use App\Models\Modules\Preconstruction\QualifiedBidder;
use Illuminate\Http\Request;

class QualifiedBidderController extends Controller
{
    public function index()
    {
        $qualifiedBidders = QualifiedBidder::all();
        return view('modules.preconstruction.qualified_bidders.index', compact('qualifiedBidders'));
    }

    public function create()
    {
        return view('modules.preconstruction.qualified_bidders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        QualifiedBidder::create($request->all());
        return redirect()->route('qualified_bidders.index')->with('success', 'Qualified Bidder created successfully.');
    }

    public function show(QualifiedBidder $qualifiedBidder)
    {
        return view('modules.preconstruction.qualified_bidders.show', compact('qualifiedBidder'));
    }

    public function edit(QualifiedBidder $qualifiedBidder)
    {
        return view('modules.preconstruction.qualified_bidders.edit', compact('qualifiedBidder'));
    }

    public function update(Request $request, QualifiedBidder $qualifiedBidder)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        $qualifiedBidder->update($request->all());
        return redirect()->route('qualified_bidders.index')->with('success', 'Qualified Bidder updated successfully.');
    }

    public function destroy(QualifiedBidder $qualifiedBidder)
    {
        $qualifiedBidder->delete();
        return redirect()->route('qualified_bidders.index')->with('success', 'Qualified Bidder deleted successfully.');
    }
}