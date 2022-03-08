@props(['data', 'type' => 'bar'])

{{-- Verplaatst naar `app.js` --}}
<div x-data="chart(@js($data->toArray()), @js($type))">
    <canvas x-ref="chart"></canvas>
</div>
