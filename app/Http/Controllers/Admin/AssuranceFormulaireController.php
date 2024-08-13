<?php

namespace App\Http\Controllers\admin;

use App\Models\AssuranceFormulaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;

class AssuranceFormulaireController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $consultations = AssuranceFormulaire::query();
            return DataTables::of($consultations)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('assurance-formulaire.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                        '</div>';
                })
                ->addColumn('title', function($row) {
                    return $row->assurance->title ?? '';
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
    
        return view('admin.assurance-formulaire.index');
    }

   
    public function destroy(AssuranceFormulaire $assuranceFormulaire)
    {
        $assuranceFormulaire->delete();
        return redirect()->route('assurance-formulaire.index')->with([
            'message' => 'Consultation deleted successfully!',
            'icon' => 'success',
        ]);
    }


}