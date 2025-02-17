<?php

namespace App\Http\Controllers;

use App\Models\GeneralQualifier;
use App\Models\Guide;
use Illuminate\Http\Request;

class GeneralQualifierController extends Controller
{

    public function index()
    {
        $guides = Guide::all();
        $generalQualifiers = GeneralQualifier::all();
        return view('general_qualifiers.index', compact('generalQualifiers', 'guides'));
    }
    
    public function create()
    {
        $guides = Guide::all();  
        return view('general_qualifiers.create', compact('guides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guide_id' => 'required|exists:guides,id',
            'qualifiers' => 'required|array|min:5|max:5',  
            'qualifiers.*.title' => 'required|string|max:255',
            'qualifiers.*.note' => 'nullable|string',
        ]);

        foreach ($request->qualifiers as $rating => $qualifier) {
            GeneralQualifier::create([
                'title' => $qualifier['title'],
                'note' => $qualifier['note'],
                'rating' => $rating + 1,  
                'guide_id' => $request->guide_id
            ]);
        }

        return redirect()->route('general_qualifiers.index')->with('success', 'General Qualifiers created successfully!');
    }
}
