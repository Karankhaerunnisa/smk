<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RegistrantStatus;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Registrant;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Registrant::count(),
            'pending' => Registrant::where('status', RegistrantStatus::PENDING)->count(),
            'accepted' => Registrant::where('status', RegistrantStatus::ACCEPTED)->count(),
            'rejected' => Registrant::where('status', RegistrantStatus::REJECTED)->count(),
        ];

        $latestRegistrants = Registrant::where('status', RegistrantStatus::PENDING)
            ->with('major')
            ->latest()
            ->take(5)
            ->get();

        $majorStats = Major::withCount('registrants')->get();

        return view('admin.dashboard', compact('stats', 'latestRegistrants', 'majorStats'));
    }
}
