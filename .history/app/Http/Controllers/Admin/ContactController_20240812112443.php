<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Check permission (add your logic here)
        
        if ($request->ajax()) {
            $data = Contact::query()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('contact.show', $row->id) . '" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('contact.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('contact.destroy', $row->id). '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.contact.index');
    }

    public function create()
    {
        // Check permission (add your logic here)

        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        // Validate the data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'tele' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        try {
            // Create the contact record
            Contact::create($validated);

            return redirect()->route('contact.index')->with([
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

    public function show(Contact $contact)
    {
        // Check permission (add your logic here)

        return view('admin.contact.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        // Check permission (add your logic here)

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        // Validate the data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'tele' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        try {
            // Update the contact record with validated data
            $contact->update($validated);

            return redirect()->route('contact.index')->with([
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

    public function destroy(Contact $contact)
    {
        // Check permission (add your logic here)

        // Delete the contact record
        $contact->delete();

        return redirect()->route('contact.index')->with([
            'message' => __('messages.delete'),
            'icon' => 'success',
        ]);
    }
}
