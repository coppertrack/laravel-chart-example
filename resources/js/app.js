import Alpine from 'alpinejs'
import { chart } from './components/chart'

window.Alpine = Alpine

/**
 * Component registratie
 */
Alpine.data('chart', chart)

Alpine.start()
