<?php

namespace App\Http\Controllers\DivisionLead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function ai()
    {
        return view('division_lead.curriculum_resources.ai');
    }

    public function devops()
    {
        return view('division_lead.curriculum_resources.devops');
    }

    public function dl()
    {
        return view('division_lead.curriculum_resources.dl');
    }

    public function gaming()
    {
        return view('division_lead.curriculum_resources.gaming');
    }

    public function networking()
    {
        return view('division_lead.curriculum_resources.networking');
    }
}
