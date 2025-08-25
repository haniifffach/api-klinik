<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // GET /api/patients
    public function index()
    {
        return response()->json(Patient::all(), 200);
    }

    // POST /api/patients
    public function store(Request $request)
    {
        $patient = Patient::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return response()->json([
            'message' => 'Pasien berhasil ditambahkan',
            'data' => $patient
        ], 201);
    }

    // PUT /api/patients/{id}
public function update(Request $request, $id)
{
    $patient = Patient::findOrFail($id);

    $patient->update([
        'name' => $request->name,
        'phone_number' => $request->phone_number,
        'address' => $request->address
    ]);

    return response()->json([
        'message' => 'Pasien berhasil diperbarui',
        'data' => $patient
    ], 200);
}

// DELETE /api/patients/{id}
    public function destroy($id)
{
    $patient = Patient::findOrFail($id);
    $patient->delete();

    return response()->json([
        'message' => 'Pasien berhasil dihapus'
    ], 200);
}
}
