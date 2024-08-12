<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use DataTables;
use Storage;

class VisaController extends Controller
{
    public function index(Request $request)
    {
        // Vérifiez la permission d'accès

        if ($request->ajax()) {
            $data = Visa::query()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->setRowClass(fn($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('visas.show', $row->id) . '" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('visas.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('visas.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('image', function ($row) {
                    return $row->image
                        ? '<img src="' . Storage::disk('public')->url($row->image) . '" alt="' . htmlspecialchars($row->title) . '" style="width: 70px; height: auto;">'
                        : 'N/A';
                })
                ->editColumn('created_at', fn($row) => formatDate($row->created_at))
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.visas.index');
    }

    public function create()
    {
        // Vérifiez la permission d'accès

        return view('admin.visas.create');
    }

    public function store(Request $request)
    {

        // Validate the data
        $validated = $request->validate([
            'type_visa' => 'string|max:255',
            'destination_visa' => 'string|max:255',
            'motif' => 'string|max:255',
            'description' => 'nullable|string',
            'pdf_path' => 'file|mimes:pdf|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lieu' => 'nullable|string',

        ]);

        try {
            // Save the PDF file
            if ($request->hasFile('pdf')) {
                $validated['pdf_path'] = $request->file('pdf')->store('visas', 'public');
            }

            // Save the image file
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('visas', 'public');
            }

            // Create the visa record
            Visa::create($validated);

            return redirect()->route('visas.index')->with([
                'message' => __('messages.success'),
                'icon' => 'success',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'message' => $th->getMessage(),
                'icon' => 'error',
            ]);
        }
    }

    public function show(Visa $visa)
    {
        // Vérifiez la permission d'accès

        return view('admin.visas.show', compact('visa'));
    }

    public function edit(Visa $visa)
    {
        // Vérifiez la permission d'accès

        return view('admin.visas.edit', compact('visa'));
    }

    public function update(Request $request, Visa $visa)
    {
        // Check permission (add your logic here)

        // Validate the data
        $validated = $request->validate([
            'type_visa' => 'required|string|max:255',
            'destination_visa' => 'required|string|max:255',
            'motif' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf_path' => 'nullable|file|mimes:pdf|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lieu' => 'nullable|string',
        ]);

        try {
            // Update the PDF file if a new one is uploaded
            if ($request->hasFile('pdf')) {
                // Delete the old file if it exists
                if ($visa->pdf_path) {
                    Storage::disk('public')->delete($visa->pdf_path);
                }
                
                if ($visa->image) {
                    Storage::disk('public')->delete($visa->image);
                }
                // Save the image file
                $validated['image'] = $request->file('image')->store('visas', 'public');

                // Store the new PDF file
                $validated['pdf_path'] = $request->file('pdf')->store('visas', 'public');
            }

            // Update the visa record with validated data
            $visa->update($validated);

            return redirect()->route('visas.index')->with([
                'message' => __('messages.update'),
                'icon' => 'success',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'message' => $th->getMessage(),
                'icon' => 'error',
            ]);
        }
    }


    public function destroy(Visa $visa)
    {
        // Vérifiez la permission d'accès

        // Suppression du fichier PDF associé
        if ($visa->pdf_path) {
            Storage::disk('public')->delete($visa->pdf_path);
        }

        if ($visa->image) {
            Storage::disk('public')->delete($visa->image);
        }

        // Suppression du visa
        $visa->delete();

        return redirect()->route('visas.index')->with([
            'message' => __('messages.delete'),
            'icon' => 'success',
        ]);
    }
}
