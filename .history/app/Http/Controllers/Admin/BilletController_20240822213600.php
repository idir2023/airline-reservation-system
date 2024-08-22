<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class BilletController extends Controller
{
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'prenom' => 'required|string|max:255',
    //         'tele' => 'required|string|max:20',
    //         'email' => 'required|string|email|max:255',
    //         'pdf_path' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
    //     ]);

    //     // Enregistrement du billet
    //     $billet = new Billet($validatedData);

    //     if ($request->hasFile('pdf_path')) {
    //         $billet->pdf_path = $request->file('pdf_path')->store('billets_pdfs', 'public');
    //     }

    //     $billet->save();

    //     return redirect()->back()->with('success', 'Billet réservé avec succès!');
    // }
    public function index(billet &)
    {
        // Récupérer tous les billets
        // $billets = Billet::all();

        // Retourner la vue avec les données
        return view('admin.billet.index', compact('billet'));
    }
}
