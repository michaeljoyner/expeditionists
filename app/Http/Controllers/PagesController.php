<?php

namespace App\Http\Controllers;

use App\Blog\Article;
use App\Charity;
use App\Content\Page;
use App\Expedition;
use App\Profile;
use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $homePage = Page::where('name', 'home')->with('editableAreas')->firstOrFail();
        $profiles = Profile::completed()->take(3)->get();
        $expeditions = Expedition::latest()->take(4)->get();
        $sponsors = Sponsor::take(5)->get();
        $charities = Charity::take(5)->get();
        $articles = Article::where('published', 1)->latest()->take(3)->get();

        return view('front.pages.index')->with(compact('homePage', 'profiles', 'expeditions', 'sponsors', 'charities', 'articles'));
    }

    public function profile($slug)
    {
        $profile = Profile::where('slug', $slug)->firstOrFail();

        return view('front.pages.profile')->with(compact('profile'));
    }

    public function expedition($slug)
    {
        $expedition = Expedition::where('slug', $slug)->firstOrFail();

        return view('front.pages.expedition')->with(compact('expedition'));
    }
}
