<?php
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ensure user is authenticated
        $currentUser = Auth::user();

        // Get all users
        $users = User::all();

        // You can also query other required data here

        return view('dashboard', compact('currentUser', 'users'));
    }
}
