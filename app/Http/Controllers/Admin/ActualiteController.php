<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ActualiteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $actualites = Actualite::query()->get();
            return DataTables::of($actualites)
                ->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('actualites.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('actualites.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
                })
                ->addColumn('image', function($row) {
                    return $row->image 
                        ? '<img src="' . Storage::disk('public')->url($row->image)  . '" alt="' . htmlspecialchars($row->title) . '" style="width: 70px; height: auto;">' 
                        : 'N/A';
                })
                
                ->rawColumns(['action','image'])
                ->make(true);
        }

        return view('admin.actualites.index');
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('actualites', 'public');
        }

        Actualite::create($data);

        return redirect()->route('actualites.index')->with([
            'message' => 'Actualité créée avec succès!',
            'icon' => 'success',
        ]);
    }

    public function show(Actualite $actualite)
    {
        return view('admin.actualites.show', compact('actualite'));
    }

    public function edit(Actualite $actualite)
    {
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($actualite->image) {
                Storage::disk('public')->delete($actualite->image);
            }
            $data['image'] = $request->file('image')->store('actualites', 'public');
        }

        $actualite->update($data);

        return redirect()->route('actualites.index')->with([
            'message' => 'Actualité mise à jour avec succès!',
            'icon' => 'success',
        ]);
    }

    public function destroy(Actualite $actualite)
    {
        if ($actualite->image) {
            Storage::disk('public')->delete($actualite->image);
        }
        $actualite->delete();

        return redirect()->route('actualites.index')->with([
            'message' => 'Actualité supprimée avec succès!',
            'icon' => 'success',
        ]);
    }
}
