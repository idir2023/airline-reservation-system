<?php


namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\Insurance;
use App\Models\Consultation;
use App\Models\Contact;
use App\Models\Review;
use App\Models\ApplyForm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques de la base de données
        $totalVisas = Visa::count();
        $totalAssurances = Insurance::count();
        $totalConsultations = Consultation::count();
        $totalContacts = Contact::count();
        $totalReviews = Review::count();
        $totalApplyForm = ApplyForm::count();
        $totalConsultedPersons = Consultation::distinct('user_id')->count('user_id');

        // Passer les données à la vue
        return view('admin.dashboard', compact('totalVisas', 'totalAssurances', 'totalConsultations', 'totalContacts', 'totalReviews', 'totalApplyForm', 'totalConsultedPersons'));
    }
}
