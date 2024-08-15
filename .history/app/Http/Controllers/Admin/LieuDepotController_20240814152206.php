<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LieuDepotController extends Controller
{
    //
}
// app/Http/Controllers/LieuDepotController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LieuDepot;

class LieuDepotController extends Controller
{
    public function create()
    {
        // Pas besoin de données spécifiques ici pour le formulaire de création
        return view('admin.lieu_depots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        LieuDepot::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('lieu_depots.create')->with('success', 'Lieu de dépôt ajouté avec succès!');
    }
}
