<template>
    <div class="py-12" id="info-math">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('exercises.index') }}">
                        <h1 class="text-2xl">Mathématiques</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>

  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-4" id="info-addition">
        <div class="pt-8 sm:justify-start sm:pt-0">
            <p>L'addition est une opération mathématique très courante qui permet de combiner deux ou plusieurs nombres pour obtenir une somme. Elle est représentée par un plus (+) entre les nombres. Il est important de se rappeler des règles de priorité des opérations pour résoudre les problèmes d'addition correctement. L'addition est utilisée dans de nombreux domaines tels que les finances, la géométrie et les statistiques.</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-4" id="info-soustraction">
        <div class="pt-8 sm:justify-start sm:pt-0">
            <p>La soustraction est une opération mathématique qui permet de retirer un nombre d'un autre nombre. Elle est représentée par un moins (-) entre les nombres. Il est important de comprendre l'ordre des opérations pour résoudre les problèmes de soustraction correctement. La soustraction est utilisée dans de nombreux domaines tels que les finances, la géométrie et les statistiques. Elle est souvent utilisée pour calculer des différences entre des nombres.</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-4" id="info-multiplication">
        <div class="pt-8 sm:justify-start sm:pt-0">
            <p>La multiplication est une opération mathématique qui permet de multiplier un nombre par un autre nombre. Elle est représentée par un astérisque (*) entre les nombres ou par un x. Il est important de comprendre les propriétés de la multiplication pour résoudre les problèmes de multiplication correctement. La multiplication est utilisée dans de nombreux domaines tels que les sciences, les mathématiques et les statistiques. Elle est souvent utilisée pour calculer des totaux ou des produits.</p>
        </div>
    </div> 

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-4" id="info-division">
        <div class="pt-8 sm:justify-start sm:pt-0">
            <p>La division est une opération mathématique qui permet de diviser un nombre par un autre nombre. Elle est représentée par un slash (/) entre les nombres ou par un signe de division. Il est important de comprendre les propriétés de la division pour résoudre les problèmes de division correctement. La division est utilisée dans de nombreux domaines tels que les sciences, les mathématiques et les statistiques. Elle est souvent utilisée pour calculer des quotients et des parts égales.</p>
        </div>
    </div> 

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-4" id="info-comparaison">
        <div class="pt-8 sm:justify-start sm:pt-0">
            <p> La comparaison est une opération mathématique qui permet de déterminer si un nombre est plus grand, plus petit ou égal à un autre nombre. Elle est représentée par des signes de comparaison tels que &gt;, &lt; ou =. Il est important de comprendre les règles de comparaison pour résoudre les problèmes de comparaison correctement. La comparaison est utilisée dans de nombreux domaines tels que les sciences, les mathématiques et les statistiques. Elle est souvent utilisée pour classer les nombres ou pour déterminer des relations entre eux.</p>
        </div>
    </div> 

</template>

<script>
export default {
    mounted() {
        const t1 = gsap.timeline({delay:1, defaults:{duration:1, ease:"back.out(1.7)"}})
        t1.from("#info-math", {y:-100, opacity:0,duration:1, stagger:0.25,alpha:0})
        t1.from("#info-addition", {x:-200, opacity:0,duration:1, stagger:0.5,alpha:0})
        t1.from("#info-soustraction", {x:+200, opacity:0,duration:1, stagger:0.75,alpha:0})
        t1.from("#info-multiplication", {x:-200, opacity:0,duration:1, stagger:1,alpha:0})
        t1.from("#info-division", {x:+200, opacity:0,duration:1, stagger:0.75,alpha:0})
        t1.from("#info-comparaison", {x:-200, opacity:0,duration:1, stagger:0.5,alpha:0})
    }
}
</script>