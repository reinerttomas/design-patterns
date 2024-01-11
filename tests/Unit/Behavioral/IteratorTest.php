<?php

declare(strict_types=1);

namespace Tests\Unit\Behavioral;

use App\Behavioral\Iterator\RadioStation;
use App\Behavioral\Iterator\StationList;

it('can add radio station', function () {
    $stationList = new StationList();
    $stationList->addStation(new RadioStation(100));
    $stationList->addStation(new RadioStation(101));
    $stationList->addStation(new RadioStation(102));
    $stationList->addStation(new RadioStation(103));

    expect($stationList)->toHaveCount(4);

    foreach ($stationList as $station) {
        expect($station->frequency)->toBeIn([100, 101, 102, 103]);
    }
});

it('can remove radio station', function () {
    $stationList = new StationList();
    $stationList->addStation(new RadioStation(100));
    $stationList->addStation(new RadioStation(101));
    $stationList->addStation(new RadioStation(102));
    $stationList->addStation(new RadioStation(103));

    $stationList->removeStation(new RadioStation(100));

    expect($stationList)->toHaveCount(3);

    foreach ($stationList as $station) {
        expect($station->frequency)->not()->toBe(100);
    }
});
