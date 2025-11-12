<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\PickupOrder;
use App\Models\UserMission;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        // Get user stats
        $totalPoints = $user->points ?? 0;

        $totalPlasticKg = Transaction::where('user_id', $user->id)
            ->where('status', 'completed')
            ->sum('weight') / 1000;

        $completedMissions = UserMission::where('user_id', $user->id)
            ->where('is_completed', true)
            ->count();

        $activePickups = PickupOrder::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'confirmed', 'on_the_way'])
            ->count();

        $recentTransactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Fun facts about recycling
        $funFacts = [
            "Only 9% of all plastic produced is recycled, so be sure to have the spirit!🔥",
            "It takes 450 years for a plastic bottle to decompose in nature.",
            "Recycling one ton of plastic can save 7.4 cubic yards of landfill space.",
            "Indonesia produces over 65.2 million tons of waste annually.",
            "Recycling plastic saves twice as much energy as burning it.",
            "Every minute, one garbage truck of plastic is dumped into our oceans.",
            "By 2050, there will be more plastic than fish in the ocean by weight.",
            "Plastic bags are used for an average of 12 minutes but take 1,000 years to decompose.",
        ];

        $todaysFunFact = $funFacts[date('z') % count($funFacts)]; // Different fact each day of year

        return view('home', compact(
            'totalPoints',
            'totalPlasticKg',
            'completedMissions',
            'activePickups',
            'recentTransactions',
            'todaysFunFact'
        ));
    }
}