<?php

namespace App\Http\Controllers;

use App\Models\Qualifier;
use App\Models\Behavioral;
use Illuminate\Http\Request;

class QualifierController extends Controller
{
    public function index()
    {
        $qualifiers = Qualifier::all();
        return view('qualifiers.index', compact('qualifiers'));
    }

    public function create()
    {
        $behaviorals = Behavioral::all();
        return view('qualifiers.create', compact('behaviorals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'note' => 'nullable|string',
            'extra' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'behavioral_id' => 'required|exists:behaviorals,id',
        ]);

        Qualifier::create($request->all());

        return redirect()->route('qualifiers.index')->with('success', 'Qualifier created successfully.');
    }

    public function show(Qualifier $qualifier)
    {
        return view('qualifiers.show', compact('qualifier'));
    }

    public function edit(Qualifier $qualifier)
    {
        $behaviorals = Behavioral::all();
        return view('qualifiers.edit', compact('qualifier', 'behaviorals'));
    }

    public function update(Request $request, Qualifier $qualifier)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'note' => 'nullable|string',
            'extra' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'behavioral_id' => 'required|exists:behaviorals,id',
        ]);

        $qualifier->update($request->all());

        return redirect()->route('qualifiers.index')->with('success', 'Qualifier updated successfully.');
    }

    public function destroy(Qualifier $qualifier)
    {
        $qualifier->delete();
        return redirect()->route('qualifiers.index')->with('success', 'Qualifier deleted successfully.');
    }
}
