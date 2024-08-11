<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        //check permission

        if ($request->ajax()) {
            $data = Appointment::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('appointments.show', $row->id) . '" type="button" class="btn btn-sm  btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('appointments.edit', $row->id) . '" type="button" class="btn btn-sm  btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('appointments.destroy', $row->id) . '"  class="btn btn-sm  btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', fn($row) => formatDate($row->created_at))
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.appointments.index');
    }

    public function create()
    {
        return view('admin.appointments.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

            // Création du rendez-vous avec les données validées
            Appointment::create($validated);

            // Redirection avec un message de succès
            return redirect()->route('appointments.index')->with([
                'message' => __('messages.success_create'), // message de succès à personnaliser
                'icon' => 'success',
            ]);
       
    }


    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', compact("appointment"));
    }

    public function edit(Appointment $appointment)
    {

        return view('admin.appointments.edit', compact("appointment"));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // Validation des données
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            // Mise à jour du rendez-vous avec les données validées
            $appointment->update($validated);

            // Redirection avec un message de succès
            return redirect()->route('appointments.index')->with([
                'message' => __('messages.success_update'), // message de succès à personnaliser
                'icon' => 'success',
            ]);
        } catch (\Throwable $th) {
            // Gestion des erreurs avec un message d'erreur
            return redirect()->back()->with([
                'message' => $th->getMessage(),
                'icon' => 'error',
            ]);
        }
    }


    public function destroy(Appointment $appointment)
    {
        //check permission
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
