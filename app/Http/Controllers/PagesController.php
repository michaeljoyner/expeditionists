<?php

namespace App\Http\Controllers;

use App\Blog\Article;
use App\Charity;
use App\Content\Page;
use App\Expedition;
use App\Profile;
use App\Sponsor;
use App\TeamMember;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $homePage = Page::where('name', 'home')->with('editableAreas')->firstOrFail();
        $profiles = $this->getCompletedProfiles();
        $expeditions = Expedition::latest()->take(4)->get();
        $sponsors = Sponsor::take(5)->get();
        $charities = Charity::take(5)->get();
        $articles = Article::where('published', 1)->latest()->take(3)->get();

        return view('front.pages.index')->with(compact('homePage', 'profiles', 'expeditions', 'sponsors', 'charities', 'articles'));
    }

    public function getInvolved()
    {
        $page = Page::where('name', 'get involved')->with('editableAreas')->firstOrFail();
        $sponsors = Sponsor::take(5)->get();
        $charities = Charity::take(5)->get();
        return view('front.pages.getinvolved')->with(compact('page', 'sponsors', 'charities'));
    }

    public function profile($slug)
    {
        $profile = Profile::where('slug', $slug)->firstOrFail();

        return view('front.pages.profile')->with(compact('profile'));
    }

    public function expedition($slug)
    {
        $expedition = Expedition::with('expeditionists')->where('slug', $slug)->firstOrFail();

        return view('front.pages.expedition')->with(compact('expedition'));
    }

    public function expeditions()
    {
        $expeditions = Expedition::latest()->get();
        $page = Page::where('name', 'expeditions')->firstOrFail();
        return view('front.pages.expeditionsindex')->with(compact('expeditions', 'page'));
    }

    public function expeditionists()
    {
        $profiles = $this->getCompletedProfiles();
        $page = Page::where('name', 'expeditionists')->firstOrFail();

        return view('front.pages.expeditionists')->with(compact('profiles', 'page'));
    }

    public function about()
    {
        $aboutPage = Page::where('name', 'about')->firstOrFail();
        $members = TeamMember::ordered()->get();
        return view('front.pages.about')->with(compact('aboutPage', 'members'));
    }

    /**
     * @return mixed
     */
    private function getCompletedProfiles()
    {
        $profiles = Profile::completed()->get()->filter(function ($profile) {
            return $profile->hasProfilePic();
        });
        return $profiles->count() > 3 ? $profiles->random(3) : $profiles;
    }
}
