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

        $registrants = new Chart();
        $doctorsDates = $this->getUsersRegistrationsDate(Role::Doctors()->user());
        $membersDates = $this->getUsersRegistrationsDate(Role::Members()->user());

        $registrants->labels($doctorsDates->merge($membersDates)->unique()->values());
        $registrants->dataset('Doctors', 'line', $doctorsDates->unique()->keys());
        $registrants->dataset('members', 'line', $membersDates->unique()->keys());

        return view('admin.index', compact('doctors', 'members', 'messages', 'registrants'));
    }

    private function getUsersRegistrationsDate($users)
    {
        return $users->get()->map(function($time) {
            return $time->created_at->format('Y/m/d');
        });
    }
}
