<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
}
namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use DataTables;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        // Check permission (add your logic here)
        
        if ($request->ajax()) {
            $data = ContactUs::query()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('contact-us.show', $row->id) . '" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('contact-us.edit', $row->id) . '" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('contact-us.destroy', $row->id). '" class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.contact_us.index');
    }

    public function create()
    {
        // Check permission (add your logic here)

        return view('admin.contact_us.create');
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
            // Create the contact us record
            ContactUs::create($validated);

            return redirect()->route('contact-us.index')->with([
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

    public function show(ContactUs $contactUs)
    {
        // Check permission (add your logic here)

        return view('admin.contact_us.show', compact('contactUs'));
    }

    public function edit(ContactUs $contactUs)
    {
        // Check permission (add your logic here)

        return view('admin.contact_us.edit', compact('contactUs'));
    }

    public function update(Request $request, ContactUs $contactUs)
    {
        // Validate the data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'tele' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        try {
            // Update the contact us record with validated data
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

        // Delete the contact us record
        $contact->delete();

        return redirect()->route('contact.index')->with([
            'message' => __('messages.delete'),
            'icon' => 'success',
        ]);
    }
}
