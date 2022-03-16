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
use App\Models\Pricing;
use App\Models\Contact;


class LandingPageController extends Controller
{
    public function LandingPage()
    {
        $dataHome = Home::paginate(1);
        $dataAbout = About::paginate(1);
        $dataDeskAbout = DeskripsiAbout::paginate(3);
        $dataDetails = Detail::paginate(1);
        $dataTeam = Team::all();
        $dataPricing = Pricing::paginate(4);
        $dataFaq = Faq::all();
        $dataContact = Contact::paginate(1);

        return view('index',compact('dataHome', 'dataAbout', 'dataDeskAbout', 'dataDetails', 'dataTeam',  'dataPricing', 'dataFaq', 'dataContact'));
    }
}
