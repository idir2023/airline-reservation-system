<?php
// app/Http/Controllers/Admin/ReviewController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $reviews = Review::query()->get();
            return DataTables::of($reviews)
                ->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('reviews.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('reviews.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.reviews.index');
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomcomplet' => 'required|string|max:255',
            'datededepot' => 'required|date',
            'dateReponse' => 'nullable|date',
            'accordounon' => 'required|boolean',
            'description' => 'required|string',
        ]);

        Review::create($request->all());

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
