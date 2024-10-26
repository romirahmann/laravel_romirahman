<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Hospital;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('hospital')->get();
        $hospitals = Hospital::all();
        return view('patients.index', compact('patients', 'hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hospitals = Hospital::all();
        return view('patients.create', compact('hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $hospitals = Hospital::all();
        return view('patients.edit', compact('patient', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
       $request->validate([
            'patient_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
