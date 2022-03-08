import { Chart, registerables } from 'chart.js'

Chart.register(...registerables)

/**
 * Werken met losse Alpine components is net wat strakker,
 * scheelt weer mogelijke GDPR problemen met JS
 * en je bent de baas over je dependencies
 */
export function chart(data, type) {
    return {
        init() {
            new Chart(this.$refs.chart, {
                type,
                data,
            })
        },
    }
}
