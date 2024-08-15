<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationFormulaire;


use Illuminate\Http\Request;
use App\Models\LieuDepot;
// app/Http/Controllers/Admin/LieuDepotController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LieuDepot;
use Illuminate\Http\Request;

class LieuDepotController extends Controller
{
    public function create()
    {
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

        return redirect()->route('revi.create')->with('success', 'Lieu de dépôt ajouté avec succès!');
    }
}
