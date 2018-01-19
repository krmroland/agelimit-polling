<?php

namespace App\Admin;

use App\AgeLimitPoll;
use App\PollResultIp;

class Summary
{
    public function pieCharts()
    {
        return [
            'Brief Summary Vote Count' => AgeLimitPoll::simplePieChart(),
            'Polling By Region' => $this->pieByRegion(),
        ];
    }

    public function lineCharts()
    {
        return [
            'Polling Agregated By Date' => AgeLimitPoll::lineChart(),
        ];
    }

    protected function pieByRegion()
    {
        return cache()->remember('poll_results_details', 1440, function () {
            return PollResultIp::selectRaw('count(*) as region_count, regionName')
                                ->groupBy('regionName')
                                ->get()
                                ->map(function ($result) {
                                    $name = $result->regionName;
                                    $label = $name;
                                    $y = (int) $result->region_count;

                                    return compact('name', 'label', 'y');
                                });
        });
    }
}
