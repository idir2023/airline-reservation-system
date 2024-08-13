<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contact = Contact::query()->get();
            return DataTables::of($contact)
                ->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('contact.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('contact.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>' .
                    '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.contact.index');
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'tele' => 'required|string|max:20',
    //         'email' => 'required|email|max:255',
    //         'description' => 'required|string',
    //     ]);

    //     $data = $request->only('nom', 'tele', 'email', 'description');

    //     Contact::create($data);

    //     return redirect()->route('contact.index')->with([
    //         'message' => 'Contact créé avec succès!',
    //         'icon' => 'success',
    //     ]);
    // }
    
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'tele' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        $data = $request->only('nom', 'tele', 'email', 'description');

        $contact->update($data);

        return redirect()->route('contact.index')->with([
            'message' => 'Contact mis à jour avec succès!',
            'icon' => 'success',
        ]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with([
            'message' => 'Contact supprimé avec succès!',
            'icon' => 'success',
        ]);
    }
}
