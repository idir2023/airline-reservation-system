<?php
// app/Http/Controllers/Admin/ReviewController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\LieuDepot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{public function index(Request $request)
    {
        if ($request->ajax()) {
            $reviews = Review::with('lieuDepot')->get(); // Eager load the lieuDepot relationship
    
            return DataTables::of($reviews)
                ->addIndexColumn()
                ->addColumn('lieu_depot', function ($review) {
                    return $review->lieuDepot ? $review->lieuDepot->name : 'N/A'; // Display the name of the lieu_depot
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('reviews.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('reviews.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
                })
                ->addColumn('accordounon', function ($review) {
                    return $review->accordounon 
                        ? '<span style="color: green; font-weight: bold;">Accordé</span>' 
                        : '<span style="color: red; font-weight: bold;">Non Accordé</span>';
                })
                ->rawColumns(['action', 'accordounon'])
                ->make(true);
        }
    
        return view('admin.reviews.index');
    }
    
    
   

public function create()
{
    // Récupérer tous les lieux de dépôt pour les passer à la vue
    $lieuDepotOptions = LieuDepot::all();

    return view('admin.reviews.create', compact('lieuDepotOptions'));
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'nomcomplet' => 'required|string|max:255',
        'datededepot' => 'required|date',
        'dateReponse' => 'nullable|date',
        'accordounon' => 'required|boolean',
        'description' => 'required|string',
        'lieu_depot_id' => 'required|exists:lieu_depots,id',  // Validate the foreign key
    ]);

    Review::create($validatedData);

    return redirect()->route('reviews.index')->with([
        'message' => 'Review créée avec succès!',
        'icon' => 'success',
    ]);
}


    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'nomcomplet' => 'required|string|max:255',
            'datededepot' => 'required|date',
            'dateReponse' => 'nullable|date',
            'accordounon' => 'required|boolean',
            'description' => 'required|string',
            'lieu_depot_id' => 'required|exists:lieu_depots,id', // Use 'lieu_depot_id' here
        ], [
            'nomcomplet.required' => 'Le nom complet est obligatoire.',
            'datededepot.required' => 'La date de dépôt est obligatoire.',
            'datededepot.date' => 'La date de dépôt doit être une date valide.',
            'accordounon.required' => 'Le champ Accord ou Non est obligatoire.',
            'accordounon.boolean' => 'Le champ Accord ou Non doit être vrai ou faux.',
            'description.required' => 'La description est obligatoire.',
            'lieu_depot_id.required' => 'Le lieu de dépôt est obligatoire.',
            'lieu_depot_id.exists' => 'Le lieu de dépôt sélectionné est invalide.',
        ]);
    
        $review->update($request->all());
    
        return redirect()->route('reviews.index')->with([
            'message' => 'Review mise à jour avec succès!',
            'icon' => 'success',
        ]);
    }
    

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with([
            'message' => 'Review supprimée avec succès!',
            'icon' => 'success',
        ]);
    }
}
