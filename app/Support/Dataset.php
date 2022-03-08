<?php

namespace App\Support;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class Dataset implements Arrayable
{
    /**
     * @param string $label
     * @param \Illuminate\Support\Collection<\Flowframe\Trend\TrendValue> $data
     * @param \App\Support\RGBA $backgroundColor
     * @param \App\Support\RGBA $borderColor
     */
    public function __construct(
        public readonly string $label,
        public readonly Collection $data,
        public readonly RGBA $backgroundColor,
        public readonly ?RGBA $borderColor = null, // Optionele borderColor
    ) {
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'data' => $this->data->pluck('aggregate'),
            'backgroundColor' => $this->backgroundColor->__toString(),
            'borderColor' => $this->borderColor?->__toString(),
            'borderWidth' => ! is_null($this->borderColor), // Toon geen borderWidth als er geen kleur is
            // Je zou hier extra opties kunnen toevoegen, dan werk je minder met JS :)
        ];
    }
}
