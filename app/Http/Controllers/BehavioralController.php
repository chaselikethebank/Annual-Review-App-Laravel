<?php

namespace App\Http\Controllers;

use App\Models\Behavioral;
use Illuminate\Http\Request;
use App\Models\Qualifier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BehavioralController extends Controller
{
    public function index()
    {
        $behaviorals = Behavioral::paginate(10);
        return view('behaviorals.index', compact('behaviorals'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifiers' => 'required|array|min:5',
            'qualifiers.*.title' => 'required|string|max:255',
            'qualifiers.*.note' => 'required|string',
        ]);

        $behavior = Behavioral::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        Log::info('Behavioral ID before inserting qualifier:', ['behavioral_id' => $behavior->id]);


        if (!empty($request->qualifiers) && is_array($request->qualifiers)) {
            Log::info('Behavioral ID:', ['id' => $behavior->id]);
            foreach ($request->qualifiers as $rating => $qualifier) {
                Log::info('Inserting qualifier:', [
                    'title' => $qualifier['title'],
                    'note' => $qualifier['note'],
                    'rating' => (int) $rating,
                    'behavioral_id' => $behavior->id,
                ]);

                Qualifier::create([
                    'title' => $qualifier['title'] ?? '',
                    'note' => $qualifier['note'] ?? '',
                    'rating' => (int) $rating,
                    'behavioral_id' => $behavior->id,
                ]);
            }
        }

        return redirect()->route('behaviorals.index')->with('success', 'Behavioral question created!');
    }


    public function show($id)
    {
        $behavioral = Behavioral::with('qualifiers')->findOrFail($id);
        return view('behaviorals.show', compact('behavioral'));
    }

    public function edit(Behavioral $behavioral)
    {
        return view('behaviorals.edit', compact('behavioral'));
    }

    public function update(Request $request, Behavioral $behavioral)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $behavioral->update($request->all());

        return redirect()->route('behaviorals.index')->with('success', 'Behavioral category updated successfully.');
    }

    public function destroy(Behavioral $behavioral)
    {
        $behavioral->delete();
        return redirect()->route('behaviorals.index')->with('success', 'Behavioral category deleted successfully.');
    }

    public function create()
    {
        return view('behaviorals.create');
    }
}
