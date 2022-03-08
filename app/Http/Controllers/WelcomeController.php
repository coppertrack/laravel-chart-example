<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Support\ChartData;
use App\Support\Dataset;
use App\Support\RGBA;
use Flowframe\Trend\Trend;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    /**
     * De controller bevat nu eigenlijk geen logica meer
     * alles is ge-abstract naar eigen klasses
     * dit zorgt voor meer overzicht
     */
    public function __invoke(): View
    {
        $firstDataset = Trend::model(Quote::class)
            ->dateColumn('payment_date')
            ->between(now()->subYears(2), now()->subYear()) // Zodat we een tweede test dataset hebben :)
            ->perMonth()
            ->count();

        $secondDataset = Trend::model(Quote::class)
            ->dateColumn('payment_date')
            ->between(now()->subYear(), now())
            ->perMonth()
            ->count();

        $chart = new ChartData(
            format: 'M, Y', // Date format
            datasets: [
                new Dataset(
                    label: 'First dataset',
                    data: $firstDataset,
                    backgroundColor: new RGBA(255, 99, 132, 0.2),
                    borderColor: new RGBA(255, 99, 132),
                ),
                new Dataset(
                    label: 'Second dataset',
                    data: $secondDataset,
                    backgroundColor: new RGBA(255, 159, 64, 0.2),
                    borderColor: new RGBA(255, 159, 64),
                ),
            ],
        );

        return view('welcome', [
            'chart' => $chart,
        ]);
    }
}
