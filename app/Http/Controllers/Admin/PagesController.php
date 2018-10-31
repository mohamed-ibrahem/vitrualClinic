<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nahid\Talk\Conversations\Conversation;

class PagesController extends Controller
{
    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $doctors = Role::Doctors()->user()->get();
        $members = Role::Members()->user()->get();
        $messages = Conversation::get();

        $registrants = $this->getUsersRegistrationsDate();

        return view('admin.index', compact('doctors', 'members', 'messages', 'registrants'));
    }

    private function getUsersRegistrationsDate()
    {
        $registrants = ['year' => [], 'month' => [], 'week' => []];

        $years = Carbon::range(now()->subYear(2)->startOfYear(), CarbonInterval::fromString('1 Year'), now()->endOfYear());
        foreach ($years as $year) {
            $registrants['year'][] = [
                'date' => $year->format('Y/m/d'),
                'doctors' => Role::Doctors()->user()->whereBetween('created_at', [$year, Carbon::parse($year)->endOfYear()])->count(),
                'members' => Role::Members()->user()->whereBetween('created_at', [$year, Carbon::parse($year)->endOfYear()])->count()
            ];
        }

        $months = Carbon::range(now()->startOfYear(), CarbonInterval::fromString('1 month'), now()->endOfYear());
        foreach ($months as $month) {
            $registrants['month'][] = [
                'date' => $month->format('Y/m/d'),
                'doctors' => Role::Doctors()->user()->whereBetween('created_at', [$month, Carbon::parse($month)->endOfMonth()])->count(),
                'members' => Role::Members()->user()->whereBetween('created_at', [$month, Carbon::parse($month)->endOfMonth()])->count()
            ];
        }

        $weeks = Carbon::range(now()->startOfMonth(), CarbonInterval::fromString('1 week'), now()->endOfMonth());
        foreach ($weeks as $week) {
            $registrants['week'][] = [
                'date' => $week->format('Y/m/d'),
                'doctors' => Role::Doctors()->user()->whereBetween('created_at', [$week, Carbon::parse($week)->endOfWeek()])->count(),
                'members' => Role::Members()->user()->whereBetween('created_at', [$week, Carbon::parse($week)->endOfWeek()])->count()
            ];
        }

        return $registrants;
    }
}
