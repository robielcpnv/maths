import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import { createApp } from 'vue'
import Welcome from './components/Welcome.vue'
import Dashboard from './components/Dashboard.vue'

createApp(Welcome).mount('#welcome')
createApp(Dashboard).mount('#description')

