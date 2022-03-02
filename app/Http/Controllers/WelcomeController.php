<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public array $labels = [];

    public array $values = [];

    public function __invoke(Request $request)
    {
        $quotes = Quote::query()
            ->without(['items'])
            ->select([
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(id) as count')
            ])
            ->groupByRaw('year, month')
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->get();

        $quotes->map(function ($month) {
            /** @phpstan-ignore-next-line */
            $monthName = DateTime::createFromFormat('!m', $month->month)->format('M');
            $this->labels[] = $monthName;
            /** @phpstan-ignore-next-line */
            $this->values[] = $month->count;
        });

        return view('welcome', [
            'labels' => $this->labels,
            'values' => $this->values,
        ]);
    }
}
