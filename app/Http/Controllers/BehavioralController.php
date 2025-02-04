<?php

namespace App\Http\Controllers;

use App\Models\Behavioral;
use Illuminate\Http\Request;

class BehavioralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $behaviorals = Behavioral::all();
        return view('behaviorals.index', compact('behaviorals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('behaviorals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifying_1' => 'required|string',
            'qualifying_1_note' => 'required|string',
            'qualifying_2' => 'required|string',
            'qualifying_2_note' => 'required|string',
            'qualifying_3' => 'required|string',
            'qualifying_3_note' => 'required|string',
            'qualifying_4' => 'required|string',
            'qualifying_4_note' => 'required|string',
            'qualifying_5' => 'required|string',
            'qualifying_5_note' => 'required|string',
        ]);

        // Store the new behavioral question
        Behavioral::create([
            'title' => $request->title,
            'description' => $request->description,
            'qualifying_1' => $request->qualifying_1,
            'qualifying_1_note' => $request->qualifying_1_note,
            'qualifying_2' => $request->qualifying_2,
            'qualifying_2_note' => $request->qualifying_2_note,
            'qualifying_3' => $request->qualifying_3,
            'qualifying_3_note' => $request->qualifying_3_note,
            'qualifying_4' => $request->qualifying_4,
            'qualifying_4_note' => $request->qualifying_4_note,
            'qualifying_5' => $request->qualifying_5,
            'qualifying_5_note' => $request->qualifying_5_note,
        ]);

        // Redirect after storing
        return redirect()->route('behaviorals.index')->with('success', 'Behavioral Question created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $behavioral = Behavioral::findOrFail($id);
    
        return view('behaviorals.show', compact('behavioral'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    // Controller: BehavioralController.php

// Show the edit form for a specific behavioral question
    public function edit(Behavioral $behavioral)
        {
            return view('behaviorals.edit', compact('behavioral'));
        }

        // Update the specific behavioral question
        public function update(Request $request, Behavioral $behavioral)
        {
            // Validate the incoming data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'qualifying_1' => 'nullable|string',
                'qualifying_2' => 'nullable|string',
                'qualifying_3' => 'nullable|string',
                'qualifying_4' => 'nullable|string',
                'qualifying_5' => 'nullable|string',
                'qualifying_1_note' => 'nullable|string',
                'qualifying_2_note' => 'nullable|string',
                'qualifying_3_note' => 'nullable|string',
                'qualifying_4_note' => 'nullable|string',
                'qualifying_5_note' => 'nullable|string',
            ]);

            // Update the behavioral question with the validated data
            $behavioral->update($validated);

            // Redirect back to the index page
            return redirect()->route('behaviorals.index')->with('success', 'Behavioral question updated successfully.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Behavioral $behavioral)
    {
        $behavioral->delete();

        return redirect()->route('behaviorals.index')->with('success', 'Behavioral question deleted successfully.');
    }
}
