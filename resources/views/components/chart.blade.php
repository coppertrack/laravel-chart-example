@props(['labels', 'values', 'chartLabel' => '', 'type' => 'line'])

<div
    x-data="chart(@js($labels), @js($values))"
>
    <script>
        function chart(labels, values) {
            return {
                init() {
                    this.chart = new Chart(this.$refs.canvas.getContext('2d'), {
                        type: '{{ $type }}',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Quotes',
                                data: values,
                                backgroundColor: '#d4d4d4',
                                borderColor: '#d4d4d4',
                                fill: true,
                                borderWidth: 2,
                                pointHitRadius: 20,
                            }],
                        },
                        options: {
                            responsive: false,
                            maintainAspectRatio: true,
                            interaction: { intersect: false },
                            scales: {
                                x: {
                                    ticks: {
                                        callback: function (value) {
                                            let label = this.getLabelForValue(value);

                                            return label.length > 4
                                                ? label.substr(0, 4) + '...'
                                                : label;
                                        }
                                    }
                                },
                                y: { beginAtZero: true }
                            },
                            plugins: {
                                legend: { display: true },
                                lineTension: '{{ $type === 'line' ? '0.4' : '' }}',
                                scales: {
                                    x: { display: false, },
                                    y: { beginAtZero: true, },
                                },
                                interaction: { intersect: false },
                            }
                        }
                    })
                },
            }
        }
    </script>

    <div wire:ignore>
        <canvas x-ref="canvas"></canvas>
    </div>
</div>
