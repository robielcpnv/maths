<script setup>
import { onMounted } from 'vue';
import { animate, spring} from "motion";

onMounted(()=>{
   /*  const zoom = animate({
        from: { scale: 1 },
        to: { scale: 1.5 },
        duration: 1000,
        repeat: Infinity,
        
        yoyo: true,
    }); */
    const exercises = document.querySelectorAll(".exercise-card")
    animate(exercises,
    {scale: 1.5}, 
    {
        duration: 2,
        easing:spring(),
        repeat: Infinity,
        direction: "alternate",
    })
})
</script>