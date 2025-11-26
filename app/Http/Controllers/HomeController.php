<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        // Default fallback supaya gak error
        $totalPoints = $user->points ?? 0;

        // Cek dulu apakah model Transaction ada
        if (class_exists('\App\Models\Transaction')) {
            $totalPlasticKg = \App\Models\Transaction::where('user_id', $user->id)
                ->where('status', 'completed')
                ->sum('weight') / 1000;

            $recentTransactions = \App\Models\Transaction::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else {
            $totalPlasticKg = 0;
            $recentTransactions = collect();
        }

        // Cek model PickupOrder
        if (class_exists('\App\Models\PickupOrder')) {
            $activePickups = \App\Models\PickupOrder::where('user_id', $user->id)
                ->whereIn('status', ['pending', 'confirmed', 'on_the_way'])
                ->count();
        } else {
            $activePickups = 0;
        }

        // Cek relasi completedMissions
        $completedMissions = method_exists($user, 'completedMissions')
            ? $user->completedMissions()->count()
            : 0;

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

        $todaysFunFact = $funFacts[date('z') % count($funFacts)];

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