<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Hindari error kalau method belum ada di model User
        $currentStreak = method_exists($user, 'completedMissions')
            ? $user->completedMissions()->count()
            : 0;

        // Hindari error kalau model Mission belum ada
        if (class_exists('\App\Models\Mission')) {
            $missions = \App\Models\Mission::all();
        } else {
            $missions = collect();
        }

        return view('missions.index', compact('currentStreak', 'missions'));
    }

    private function calculateStreak($userId)
    {
        $activityDates = DB::table('transactions')
            ->where('user_id', $userId)
            ->selectRaw('DATE(created_at) as date')
            ->distinct()
            ->orderBy('date', 'desc')
            ->pluck('date');

        $streak = 0;
        $today = now()->startOfDay();

        foreach ($activityDates as $date) {
            $date = \Carbon\Carbon::parse($date)->startOfDay();
            $expected = $today->copy()->subDays($streak);

            if ($date->equalTo($expected)) {
                $streak++;
            } else {
                break;
            }
        }

        return $streak;
    }
}