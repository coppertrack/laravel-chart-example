<?php

namespace App\Support;

// Types over strings :)
class RGBA
{
    public function __construct(
        readonly public float|int $r,
        readonly public float|int $g,
        readonly public float|int $b,
        readonly public float|int $a = 1,
    ) {
    }

    // Handige helper voor het genereren van een RGBA string
    public function __toString(): string
    {
        return "rgba({$this->r}, {$this->g}, {$this->b}, {$this->a})";
    }
}
