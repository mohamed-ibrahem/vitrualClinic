<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Setting;
use App\Speciality;
use Barryvdh\TranslationManager\Models\Translation;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;
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
        $specialties = $this->getTopSpecialties();

        return view('admin.index', compact('doctors', 'members', 'messages', 'registrants', 'specialties'));
    }

    /**
     * @project VirtualClinic - Nov/2018
     *
     * @param \Barryvdh\TranslationManager\Manager $manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings(\Barryvdh\TranslationManager\Manager $manager)
    {
        return view('admin.settings', [
            'locales' => $manager->getLocales()
        ]);
    }

    public function postSettings(Request $request)
    {
        (new Setting)->addArray(array_except($request->all(), ['_token']));

        return redirect()->back();
    }

    private function getUsersRegistrationsDate()
    {
        $registrants = ['year' => [], 'month' => [], 'week' => []];

        $years = Carbon::range(now()->subYear(2)->startOfYear(), CarbonInterval::fromString('1 Year'), now()->endOfYear());
        foreach ($years as $year) {
            $registrants['year'][] = [
                'label' => $year->format('Y'),
                'doctors' => Role::Doctors()->user()->whereBetween('created_at', [$year, Carbon::parse($year)->endOfYear()])->count(),
                'members' => Role::Members()->user()->whereBetween('created_at', [$year, Carbon::parse($year)->endOfYear()])->count()
            ];
        }

        $months = Carbon::range(now()->startOfYear(), CarbonInterval::fromString('1 month'), now());
        foreach ($months as $month) {
            $registrants['month'][] = [
                'label' => $month->format('Y-m-d'),
                'doctors' => Role::Doctors()->user()->whereBetween('created_at', [$month, Carbon::parse($month)->endOfMonth()])->count(),
                'members' => Role::Members()->user()->whereBetween('created_at', [$month, Carbon::parse($month)->endOfMonth()])->count()
            ];
        }

        $weeks = Carbon::range(now()->subWeeks(3), CarbonInterval::fromString('1 week'), now()->endOfWeek());
        foreach ($weeks as $week) {
            $registrants['week'][] = [
                'label' => $week->format('Y-m-d'),
                'doctors' => Role::Doctors()->user()->whereBetween('created_at', [$week, Carbon::parse($week)->endOfWeek()])->count(),
                'members' => Role::Members()->user()->whereBetween('created_at', [$week, Carbon::parse($week)->endOfWeek()])->count()
            ];
        }

        return $registrants;
    }

    private function getTopSpecialties()
    {
        return Speciality::Top()
            ->filter(function($speciality) {
                return $speciality['value'] > 0;
            })
            ->take(5)
            ->values()->all();
    }
}
