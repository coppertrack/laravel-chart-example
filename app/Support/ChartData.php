<?php

namespace App\Support;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

// Dit is eigenlijk een mapping naar de Chart.js `data` property
class ChartData implements Arrayable
{
    /**
     * @param string $format
     * @param array<Dataset> $datasets
     */
    public function __construct(
        readonly public string $format,
        readonly public array $datasets,
    ) {
    }

    /**
     * We pakken de labels opbasis van de eerste dataset
     * data binnen een grafiek heeft altijd dezelfde
     * datum filters, anders is het onlogisch
     */
    protected function labels(): Collection
    {
        return collect($this->datasets)
            ->first()
            ->data
            ->pluck('date')
            ->map(
                fn (string $date): string => now()
                    ->parse($date)
                    ->format($this->format)
            );
    }

    /**
     * Hier converteren wij het naar een Array, dit
     * maakt het omzetten naar JS wat makkelijker
     */
    public function toArray(): array
    {
        return [
            'labels' => $this->labels(),
            'datasets' => collect($this->datasets)->map(
                fn (Dataset $dataset): array => $dataset->toArray()
            ),
        ];
    }
}
