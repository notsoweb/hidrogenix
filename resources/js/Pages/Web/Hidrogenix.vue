<script setup>
import CardRotative from '@/Components/Web/Card/Rotative.vue';
import Title        from '@/Components/Web/Card/Transparent.vue';
import Layout       from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div
            class="mx flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(storage/images/yoga-1.jpg)' }"
        >
            <Title>
                <h4 class="font-bold text-2xl">HIDRÓGENO MOLECULAR</h4>
            </Title>
        </div>
        <div class="mx-auto container">
            <p class="text-style my-4">
                El <b>hidrógeno molecular</b>, es la molécula más pequeña y simple y consta de dos átomos de hidrógeno. En los últimos años, ha llamado la atención por sus
                posibles beneficios para la salud.
            </p>
            <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                <CardRotative class="lg:col-span-2">
                    <div class="text-2xl font-semibold text-gray-900 leading-none">Beneficios</div>
                    <div class="mt-6 text-style">
                        <p>Los beneficios son:</p>
                        <ul class="list-inside list-disc">
                            <li><b>Poder antioxidante:</b> El hidrógeno molecular es un poderoso antioxidante que ayuda a combatir el estrés oxidativo y favorece la salud celular en general</li>
                            <li><b>Antiinflamatorio:</b> Al reducir el estrés oxidativo, el hidrógeno también puede tener efectos antiinflamatorios, beneficiando potencialmente las condiciones relacionadas con la inflamación.</li>
                            <li><b>Aumento de energía:</b> Algunos estudios sugieren que el hidrógeno molecular puede mejorar los niveles de energía al mejorar la función mitocondrial, el centro neurálgico de las células.</li>
                            <li><b>Salud cerebral:</b> Están surgiendo investigaciones sobre los posibles efectos neuroprotectores del hidrógeno, que podrían contribuir a una mejor función cognitiva y salud cerebral</li>
                            <li><b>Rendimiento en el ejercicio:</b> El hidrógeno molecular puede ayudar a reducir la fatiga muscular y mejorar el rendimiento en el ejercicio al mitigar el estrés oxidativo durante la actividad física.</li>
                            <li><b>Salud de la piel:</b> El agua hidrogenada puede tener beneficios para la piel, contribuyendo potencialmente a una apariencia más juvenil y apoyando la salud de la piel.</li>
                        </ul>
                    </div>
                </CardRotative>
                <CardRotative>
                    <div class="text-2xl font-semibold text-gray-900 leading-none">Mecanismo de Acción</div>
                    <div class="mt-6 text-style">
                        Cuando la gente habla de los beneficios del hidrógeno molecular, suele referirse a sus propiedades antioxidantes. El hidrógeno molecular actúa como un
                        antioxidante selectivo, lo que significa que ataca y neutraliza los radicales libres dañinos en el cuerpo sin afectar los beneficiosos. Los radicales libres
                        son moléculas que pueden causar daño a las células y contribuir al envejecimiento y diversos problemas de salud. Las moléculas de hidrógeno ayudan a neutralizar
                        estos radicales libres, reduciendo el estrés oxidativo y la inflamación.
                    </div>
                </CardRotative>
                <CardRotative>
                    <div class="text-2xl font-semibold text-gray-900 leading-none">Importante</div>
                    <div class="mt-6 text-style">
                        Cuando la gente habla de los beneficios del hidrógeno molecular, suele referirse a sus propiedades antioxidantes. El hidrógeno molecular actúa como un
                        antioxidante selectivo, lo que significa que ataca y neutraliza los radicales libres dañinos en el cuerpo sin afectar los beneficiosos. Los radicales libres
                        son moléculas que pueden causar daño a las células y contribuir al envejecimiento y diversos problemas de salud. Las moléculas de hidrógeno ayudan a neutralizar
                        estos radicales libres, reduciendo el estrés oxidativo y la inflamación.
                    </div>
                </CardRotative>
            </div>
        </div>
        <!-- <div class="mx-auto container w-full grid gap-4 grid-cols-1 md:grid-cols-3">
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Investigación en animales</span>
            </div>
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Investigación en humanos</span>
            </div>
            <div class="flex flex-col p-2 h-64 justify-center items-center rounded-md cursor-pointer hover:scale-[1.02] transition-all duration-300 bg-gray-500 text-white">
                <span class="font-semibold">Otros</span>
            </div>
        </div> -->
    </Layout>
</template>