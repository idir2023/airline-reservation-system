<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class BilletController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $data = Billet::select(['id', 'nom', 'prenom', 'tele', 'email', 'pdf_path']);
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '<a href="'.route('billet.show', $row->id).'" class="btn btn-primary">Voir</a>';
            })
            ->make(true);
    }
    
    return view('billet.index');
}
    public function index(billet $billet)
    {
        // Récupérer tous les billets
        // $billets = Billet::all();

        // Retourner la vue avec les données
        return view('admin.billet.index', compact('billet'));
    }
}
