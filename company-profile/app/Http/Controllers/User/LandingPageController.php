<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\DeskripsiAbout;
use App\Models\Detail;
use App\Models\Team;
use App\Models\Faq;

class LandingPageController extends Controller
{
    public function LandingPage()
    {
        $dataHome = Home::all();
        $dataAbout = About::all();
        $dataDeskAbout = DeskripsiAbout::all();
        $dataDetails = Detail::all();
        $dataTeam = Team::all();
        $dataFaq = Faq::all();

        return view('index',compact('dataHome', 'dataAbout', 'dataDeskAbout', 'dataDetails', 'dataTeam', 'dataFaq'));
    }
}
