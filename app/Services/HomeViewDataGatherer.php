<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/23/16
 * Time: 11:51 AM
 */

namespace App\Services;


use App\Blog\Article;
use App\Charity;
use App\Expedition;
use App\ExpeditionLocationPresenter;
use App\Profile;
use App\Sponsor;
use Illuminate\Support\Facades\Cache;
use Michaeljoyner\Edible\ContentRepository;

class HomeViewDataGatherer
{
    /**
     * @var ContentRepository
     */
    private $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function getHomeData()
    {
        return [
            'homePage' => $this->getHomePage(),
            'profiles' => $this->getProfiles(),
            'expeditions' => $this->getExpeditions(),
            'sponsors' => $this->getSponsors(),
            'charities' => $this->getCharities(),
            'articles' => $this->getArticles(),
            'mapLocations' => $this->getMapLocations()
        ];
    }

    protected function getHomePage()
    {
        return Cache::remember('ediblehome', 60, function() {
           return $this->contentRepository->getPageByName('home page');
        });
    }

    protected function getProfiles()
    {

        return Cache::remember('profiles', 60, function() {
            return $this->getCompletedProfiles(3);
        });
    }

    protected function getExpeditions()
    {
        return Cache::remember('expeditions', 60, function() {
            return Expedition::latest()->take(4)->get();
        });

    }

    protected function getSponsors()
    {
        return Cache::remember('sponsors', 60, function() {
            return Sponsor::ordered()->get();
        });
    }

    protected function getCharities()
    {
        return Cache::remember('charities', 60, function() {
            return Charity::ordered()->get();
        });

    }

    protected function getArticles()
    {
        return Cache::remember('articles', 60, function() {
            return Article::where('published', 1)->latest()->take(3)->get();
        });

    }

    protected function getMapLocations()
    {
        return Cache::remember('maplocations', 60, function() {
            return (new ExpeditionLocationPresenter())->jsonForAllLocations();
        });

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
}