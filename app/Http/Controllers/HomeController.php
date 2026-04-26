<?php

namespace App\Http\Controllers;

use App\Models\{Project, User, Announcement};

class HomeController extends Controller
{
    public function index()
    {
        try {
            $featuredProjects = Project::whereIn('status', ['approved', 'in_progress'])
                ->orderByRaw("FIELD(priority,'critical','high','medium','low')")
                ->take(3)
                ->get();

            $totalProjects   = (int) Project::count();
            $totalVolunteers = (int) User::where('role', 'volunteer')->count();
            $totalCompleted  = (int) Project::where('status', 'completed')->count();
            $totalOwners     = (int) User::where('role', 'project_owner')->count();

            $announcements = Announcement::where('is_published', true)
                ->where('target', 'all')
                ->latest()
                ->take(3)
                ->get();

        } catch (\Exception $e) {
            $featuredProjects = collect();
            $totalProjects    = 0;
            $totalVolunteers  = 0;
            $totalCompleted   = 0;
            $totalOwners      = 0;
            $announcements    = collect();
        }

        return view('welcome', compact(
            'featuredProjects',
            'totalProjects',
            'totalVolunteers',
            'totalCompleted',
            'totalOwners',
            'announcements'
        ));
    }
}