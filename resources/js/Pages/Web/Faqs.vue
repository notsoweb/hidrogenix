<script setup>
import Faq    from '@/Components/Web/Card/Faq.vue';
import Title  from '@/Components/Web/Card/Transparent.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div
            class="flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(storage/images/yoga-1.jpg)' }"
        >
            <Title>
                <h4 class="font-bold text-2xl uppercase">Preguntas frecuentes</h4>
            </Title>
        </div>
       
        <div class="mx-auto container space-y-4 py-4">
            <Faq title="¿Qué es el hidrógeno molecular?">
                <p class="text-style">
                    El hidrógeno molecular (H2) es la molécula más pequeña, simple y abundante del universo y está compuesta de dos átomos de hidrógeno.
                    Tiene una alta biodisponibilidad, es decir, tiene una alta velocidad y facilidad con la cual es absorbido y alcanza su punto de acción
                    en nuestro cuerpo.
                </p>
                <p class="text-style">
                    En los últimos años, el H2 ha llamado la atención por su variada actividad preventiva y terapéutica para múltiples enfermedades y posibles
                    beneficios para la salud.
                </p>
            </Faq>
            <Faq title="¿Que hace el hidrógeno molecular en mi cuerpo?">
                <p class="text-style">
                    El hidrógeno molecular actúa como un antioxidante selectivo, lo que significa que ataca y neutraliza a los radicales libres dañinos en el
                    cuerpo sin afectar a los beneficiosos, y al hacer esto reduce el estrés oxidativo y la inflamación en nuestro cuerpo.
                </p>
            </Faq>
            <Faq title="¿Qué son los radicales libres?">
                <p class="text-style text-justify">
                    Los radicales libres son moléculas que pueden causar daño a las células y contribuir al envejecimiento y diversos problemas de salud. Cuando las
                    moléculas saludables de nuestro cuerpo pierden o ganan un electrón, se convierten en radicales libres, este cambio las vuelve inestables. 
                </p>
                <p class="text-style text-justify">
                    Estos radicales libres comienzan a buscar otro electrón para estabilizarse y pueden llegar a arrebatar electrones de otras moléculas, dañándolas
                    en el proceso. Al hacer esto pueden desencadenar una reacción en cadena, dañando muchas moléculas en su camino. Con el tiempo, este daño puede acumularse
                    y provocar diversos problemas de salud, como el envejecimiento prematuro, enfermedades cardiacas y el cáncer. Esto empieza como una pequeña grieta en una
                    presa que eventualmente puede hacerla estallar.
                </p>
                <p class="text-style text-justify">
                    Para combatir los radicales libres, nuestro cuerpo usa antioxidantes. Estos neutralizan a los radicales libres dándoles el electrón que les falta, deteniendo
                    la reacción en cadena antes de que cause demasiado daño.
                </p>
            </Faq>
            <Faq title="¿Qué es la Terapia de Hidrógeno Molecular?">
                <p class="text-style">
                    Consiste en la administración de hidrógeno molecular. Hay cuatro métodos comunes de administración: inhalación, agua hidrogenada, aplicación tópica e inyección
                    de solución salina rica en H2.
                </p>
            </Faq>
            <Faq title="Diferencias entre agua alcalina e hidrogenada">
                <p class="text-style">
                    El agua alcalina es agua con un valor de pH alto, mientras que el agua hidrogenada es agua normal con gas hidrógeno adicional disuelto en ella.
                    Al igual que el agua con hidrógeno, el agua alcalina también tiene algunos beneficios para la salud que deben ser respaldados por más estudios
                    de investigación. Estos incluyen desintoxicación y antienvejecimiento.
                </p>
                <p class="text-style">
                    No se sabe que ambos causen efectos adversos graves o intolerables. Sin embargo, en comparación con el agua hidrogenada, se dice que la ingesta
                    prolongada o excesiva de agua alcalina artificial afecta la acidez del estómago; como resultado, puede alterar la digestión de los alimentos y
                    provocar malestar estomacal.
                </p>
            </Faq>
        </div>
</Layout></template>