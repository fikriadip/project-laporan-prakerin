<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduction;
use App\Models\Testimonial;
use App\Models\DeskDetail;
use App\Models\Contact;
use App\Models\Detail;
use App\Models\Video;
use App\Models\Team;
use App\Models\Hero;
use App\Models\Faq;

class GuestController extends Controller
{
    public function home()
    {
        $hero = Hero::all();
        $detail = Detail::all();
        $desk_detail = DeskDetail::all();
        $video = Video::all();
        $testimonial = Testimonial::latest()->get();
        $faq = Faq::latest()->get();
        return view('guest.home', compact('hero','detail','desk_detail','video','testimonial','faq'));
    }

    public function about()
    {
        $introduction = Introduction::all();
        $team = Team::all();
        return view('guest.about', compact('introduction','team'));
    }

    public function contact()
    {
        $contact = Contact::all();
        return view('guest.contact', compact('contact'));
    }
}
