<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Visa;
use App\Models\Insurance;
use App\Models\Consultation;
use App\Models\Contact;
use App\Models\Review;
use App\Models\ApplyForm;
use App\Models\Assurance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisas = Visa::count();
        $totalAssurances = Assurance::count();
        $totalConsultations = Consultation::count();
        $totalContacts = Contact::count();
        $totalReviews = Review::count();
        // $totalInsuranceApplications = ApplyForm::count();
    
        return view('admin.index', compact('totalVisas', 'totalAssurances', 'totalConsultations', 'totalContacts', 'totalReviews'));
    }
    
}
