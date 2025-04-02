<?php

namespace App\Http\Controllers;

use App\Models\GeneralQualifier;
use App\Models\Guide;
use Illuminate\Http\Request;

class GeneralQualifierController extends Controller
{

    public function index()
    {
        $guides = Guide::with('generalQualifiers')->get();  
        return view('general_qualifiers.index', compact('guides')); 
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
                'rating' => $rating,  
                'guide_id' => $request->guide_id
            ]);
        }
        return redirect()->route('general_qualifiers.index')->with('success', 'General Qualifiers created successfully!');
    }

    public function destroy($id)
{
    $guide = Guide::findOrFail($id);

    $guide->generalQualifiers()->delete();

    return redirect()->route('general_qualifiers.index')
                     ->with('success', 'All General Qualifiers for this guide deleted successfully!');
}

public function edit($id)
{
    $generalQualifier = GeneralQualifier::findOrFail($id);
    return view('general_qualifiers.edit', compact('generalQualifier'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'note' => 'nullable|string',
    ]);

    $generalQualifier = GeneralQualifier::findOrFail($id);
    $generalQualifier->title = $request->title;
    $generalQualifier->note = $request->note;
    // No need to update 'rating', it will remain unchanged
    $generalQualifier->save();

    return redirect()->route('general_qualifiers.index')->with('success', 'Qualifier updated successfully!');
}


}
