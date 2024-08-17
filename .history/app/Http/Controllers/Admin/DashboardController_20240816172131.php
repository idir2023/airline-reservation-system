
namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\Review;
use App\Models\Actualite;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $visas = Visa::all();
        $reviews = Review::all();
        $actualites = Actualite::all();

        // Pass data to the view
        return view('admin.dashboard', compact('visas', 'reviews', 'actualites'));
    }
}
