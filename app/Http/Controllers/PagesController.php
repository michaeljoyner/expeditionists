<?php

namespace App\Http\Controllers;

use App\Blog\Article;
use App\Charity;
use App\Content\Page;
use App\Expedition;
use App\ExpeditionLocationPresenter;
use App\FileResource;
use App\Profile;
use App\Sponsor;
use App\TeamMember;
use App\Videos\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Michaeljoyner\Edible\ContentRepository;

class PagesController extends Controller
{

    /**
     * @var ContentRepository
     */
    private $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function home()
    {
        $homePage = $this->contentRepository->getPageByName('home page');
        $profiles = $this->getCompletedProfiles(3);
        $expeditions = Expedition::latest()->take(4)->get();
        $sponsors = Sponsor::take(5)->get();
        $charities = Charity::take(5)->get();
        $articles = Article::where('published', 1)->latest()->take(3)->get();
        $mapLocations = (new ExpeditionLocationPresenter())->jsonForAllLocations();

        return view('front.pages.index')->with(compact('homePage', 'profiles', 'expeditions', 'sponsors', 'charities', 'articles', 'mapLocations'));
    }

    public function getInvolved()
    {
        $page = $this->contentRepository->getPageByName('get involved');
        $sponsors = Sponsor::take(5)->get();
        $charities = Charity::take(5)->get();
        $expeditionistPdf = FileResource::where('name', 'Become an expeditionist')->first();
        $volunteerPdf = FileResource::where('name', 'Become a volunteer')->first();
        return view('front.pages.getinvolved')->with(compact('page', 'sponsors', 'charities', 'expeditionistPdf', 'volunteerPdf'));
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
        $page = $this->contentRepository->getPageByName('expeditions');
        return view('front.pages.expeditionsindex')->with(compact('expeditions', 'page'));
    }

    public function expeditionists()
    {
        $profiles = $this->getCompletedProfiles();
        $page = $this->contentRepository->getPageByName('expeditionists');

        return view('front.pages.expeditionists')->with(compact('profiles', 'page'));
    }

    public function about()
    {
        $aboutPage = $this->contentRepository->getPageByName('about us');
        $members = TeamMember::ordered()->get();
        return view('front.pages.about')->with(compact('aboutPage', 'members'));
    }

    /**
     * @return mixed
     */
    private function getCompletedProfiles($limit = null)
    {
        $profiles = Profile::completed()->get()->filter(function ($profile) {
            return $profile->hasProfilePic();
        });
        return (!is_null($limit) && $profiles->count() > $limit) ? $profiles->random($limit) : $profiles;
    }

    public function gallery()
    {
        $gallery = (new ContentRepository())->getPageByName('gallery')->galleries()->where('name', 'gallery')->first();

        return view('front.pages.gallery')->with(compact('gallery'));
    }

    public function videos()
    {
        $videos = Video::latest()->get();

        return view('front.pages.videos')->with(compact('videos'));
    }
}
