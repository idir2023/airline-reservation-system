<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationFormulaire;

use App\Models\Actualite;
use App\Models\LieuDepot;
use App\Models\User;
use App\Models\Visa;
use App\Models\Contact;
use App\Models\Assurance;
use App\Models\AssuranceFormulaire;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index(Request $request)
    // {
    //     if (view()->exists('template.' . $request->path())) {
    //         return view('template.' . $request->path());
    //     }
    //     return abort(404);
    // }
    public function index()
    {
        // Récupère toutes les données nécessaires
        $actualites = Actualite::all();
        $reviews = Review::all();
        $lieuDepotOptions = LieuDepot::all();
        $visas = Visa::all();
        $consultations = Consultation::all();
        $assurances = Assurance::all();

        // Retourne la vue 'admin.index' avec les données
        return view('client.index', [
            'actualites' => $actualites,
            'reviews' => $reviews,
            'lieuDepotOptions' => $lieuDepotOptions,
            'visas' => $visas,
            'consultations' => $consultations,
            'assurances'=>$assurances
        ]);
    }

    public function root()
    {   
        $count_visa = Visa::count();    
        $count_assurance = Assurance::count();    
        $count_consultation = Consultation::count();    
        $count_review = Review::count();
        $count_actualite = Actualite::count();
        $count_contact = Contact::count();
        $count_formAssurance = AssuranceFormulaire::count();
        $count_formConsultation = ConsultationFormulaire::count();

    
        return view('admin.index', compact('count_visa', 'count_assurance', 'count_consultation', 'count_review','count_actualite','count_contact','count_formAssurance',));
    }    
    // 
   
    // 
    public function getvisa(Request $request)
    {
        // Start with all visas
        $query = Visa::query();

        // Filter by motif if provided
        if ($request->has('motif') && !empty($request->motif)) {
            $query->where('motif', $request->motif);
        }

        // Filter by lieu if provided
        if ($request->has('lieu') && !empty($request->lieu)) {
            $query->where('lieu', $request->lieu);
        }

        // Execute the query and get the results
        $visas = $query->get();

        // Get all possible motifs and lieux for the filter options
        $getvisas = Visa::select('motif', 'lieu')->distinct()->get();

        // Return the view with the filtered visas and the full list of motifs and lieux
        return view('client.visas', compact('visas', 'getvisas'));
    }

    public function getactualite()
    {
        $actualites = Actualite::all(); // Récupère toutes les actualités depuis la base de données
        return view('client.actualite', compact('actualites'));
    }

    public function getconsultation(Request $request)
    {
        $query = Consultation::query();

        if ($request->has('title') && !empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $consultations = $query->get();

        return view('client.consultation', compact('consultations'));
    }

    public function getassuarance(Request $request)
    {
        $query = Assurance::query(); // Récupère toutes les assurances depuis la base de données
        if ($request->has('title') && !empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        $assurances = $query->get();

        return view('client.assuarance', compact('assurances'));
    }

    public function getcontact()
    {
        return view('client.contact');
    }

    public function getreviews(Request $request)
    {
        $lieuDepotOptions = LieuDepot::all(); // Retrieve all locations from the database
        $query = Review::query(); // Start building the query for reviews

        // Check if a specific 'lieu_depot' is selected and not empty
        if ($request->filled('lieu_depot')) {
            $query->where('lieu_depot_id', $request->lieu_depot);
        }

        $reviews = $query->get(); // Get the reviews based on the query
        return view('client.reviews', compact('reviews', 'lieuDepotOptions'));
    }



    public function save_consultation_formulaire(Request $request)
    {
        // Validate the request data
        $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'numerTele' => 'required|string|max:20',
        ]);

        // Store the data in the database
        ConsultationFormulaire::create([
            'consultation_id' => $request->consultation_id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'description' => $request->description,
            'numerTele' => $request->numerTele,
        ]);

        // Return a JSON response
        return response()->json([
            'success' =>
            'Félicitations ! Vous serez contacté par un assistant dans les plus brefs délais.',
        ]);
    }

    public function save_assuarance_formulaire(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'assurance_id' => 'required|exists:assurances,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'numerTele' => 'required|string|max:20',
        ]);

        // Store the data in the database
        AssuranceFormulaire::create($validated);

        // Return a JSON response
        return response()->json([
            'success' => 'Félicitations ! Vous serez contacté par un assistant dans les plus brefs délais.',
        ]);
    }

    // 
   

    public function storeTempFile(Request $request)
    {

        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteTempFile(Request $request)
    {
        $path = storage_path('tmp/uploads');
        if (file_exists($path . '/' . $request->fileName)) {
            unlink($path . '/' . $request->fileName);
        }
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = '/images/' . $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}