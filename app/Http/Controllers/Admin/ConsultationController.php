<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $consultations = Consultation::query();
            return DataTables::of($consultations)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image
                        ? '<img src="' . Storage::disk('public')->url($row->image) . '" alt="' . htmlspecialchars($row->title) . '" style="width: 70px; height: auto;">'
                        : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('consultations.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('consultations.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.consultations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consultations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('consultations', 'public');
        }

        Consultation::create($data);

        return redirect()->route('consultations.index')->with([
            'message' => 'Consultation created successfully!',
            'icon' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        return view('admin.consultations.edit', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            if ($consultation->image) {
                Storage::disk('public')->delete($consultation->image);
            }
            $data['image'] = $request->file('image')->store('consultations', 'public');
        }

        $consultation->update($data);

        return redirect()->route('consultations.index')->with([
            'message' => 'Consultation updated successfully!',
            'icon' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        if ($consultation->image) {
            Storage::disk('public')->delete($consultation->image);
        }
        $consultation->delete();

        return redirect()->route('consultations.index')->with([
            'message' => 'Consultation deleted successfully!',
            'icon' => 'success',
        ]);
    }
}
