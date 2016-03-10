<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/8/16
 * Time: 1:41 PM
 */

namespace App;


class ExpeditionLocationPresenter
{
    public function jsonLocationsForExpedition(Expedition $expedition)
    {
        return $expedition->locations->map(function ($loc) {
            return $this->createMapImageAttributeArray($loc);
        })->toJson();
    }

    public function jsonForAllLocations()
    {
        return MapLocation::with('expedition')->get()->map(function ($loc) {
            return $this->createMapImageAttributeArray($loc);
        })->toJson();
    }

    protected function createMapImageAttributeArray($loc)
    {
        return [
            "latitude"               => $loc->latitude,
            "longitude"              => $loc->longitude,
            "imageURL"               => "/images/assets/icons/map_pin.png",
            "color"                  => "#FFFFFF",
            "width"                  => 23,
            "height"                 => 23,
            "centered"               => false,
            "labelColor"             => "#ffffff",
            "labelRollOverColor"     => "#85cebf",
            "labelShiftY"            => 0,
            "zoomLevel"              => 4,
            "label"                  => $loc->title,
            "title"                  => $loc->expedition->name,
            "description"            => $this->buildDescriptionFromExpedition($loc->expedition),
            "descriptionWindowWidth" => 225
        ];
    }

    protected function buildDescriptionFromExpedition($expedition)
    {
        $description = "";
        $description .= '<a href="/expeditions/' . $expedition->slug . '">' . $expedition->name . '</a>';
        $description .= '<p><strong>Total Distance: </strong>' . $expedition->distance . 'km</p>';
        $description .= '<p><strong>Distance to Date: </strong>' . $expedition->distance_to_date . 'km</p>';
        $description .= '<p><strong>Donation Goal: </strong>' . $expedition->donation_goal . '</p>';
        $description .= '<p><strong>Donations to Date: </strong>' . $expedition->donations_to_date . '</p>';

        return $description;
    }
}