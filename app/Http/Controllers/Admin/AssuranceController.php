<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AssuranceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assurances = Assurance::query()->get();
            return DataTables::of($assurances)
                ->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('assurances.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('assurances.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
                })
                ->addColumn('image', function($row) {
                    return $row->image 
                        ? '<img src="' . Storage::disk('public')->url($row->image) . '" alt="' . htmlspecialchars($row->title) . '" style="width: 70px; height: auto;">' 
                        : 'N/A';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.assurances.index');
    }

    public function create()
    {
        return view('admin.assurances.create');
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
            $data['image'] = $request->file('image')->store('assurances', 'public');
        }

        Assurance::create($data);

        return redirect()->route('assurances.index')->with([
            'message' => 'Assurance créée avec succès!',
            'icon' => 'success',
        ]);
    }

    public function show(Assurance $assurance)
    {
        return view('admin.assurances.show', compact('assurance'));
    }

    public function edit(Assurance $assurance)
    {
        return view('admin.assurances.edit', compact('assurance'));
    }

    public function update(Request $request, Assurance $assurance)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            if ($assurance->image) {
                Storage::disk('public')->delete($assurance->image);
            }
            $data['image'] = $request->file('image')->store('assurances', 'public');
        }

        $assurance->update($data);

        return redirect()->route('assurances.index')->with([
            'message' => 'Assurance mise à jour avec succès!',
            'icon' => 'success',
        ]);
    }

    public function destroy(Assurance $assurance)
    {
        if ($assurance->image) {
            Storage::disk('public')->delete($assurance->image);
        }
        $assurance->delete();

        return redirect()->route('assurances.index')->with([
            'message' => 'Assurance supprimée avec succès!',
            'icon' => 'success',
        ]);
    }
}
