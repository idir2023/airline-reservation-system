<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultationFormulaire;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ConsultationFormulaireController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $consultations = ConsultationFormulaire::query();
        return DataTables::of($consultations)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<div class="d-flex">' .
                    '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('consultation-formulaire.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
            })
            ->addColumn('title', function($row) {
                return $row->consultation->title ?? '';
            })
            ->addColumn('nom', function($row) {
                return $row->nom;
            })
            ->addColumn('prenom', function($row) {
                return $row->prenom;
            })
            ->addColumn('numerTele', function($row) {
                return $row->numerTele;
            })
            ->addColumn('description', function($row) {
                return $row->description;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('admin.consultation-formulaire.index');
}


public function destroy(ConsultationFormulaire $ConsultationFormulaire)
    {
        $ConsultationFormulaire->delete();

        return redirect()->route('consultation-formulaire.index')->with([
            'message' => 'Consultation deleted successfully!',
            'icon' => 'success',
        ]);
}
}
