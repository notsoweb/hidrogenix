<script setup>
import Feature from '@/Components/Web/Card/Feature.vue';
import Detail from '@/Components/Web/Card/Detail.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div class="flex flex-col justify-center items-center rounded-md text-white w-full h-80 bg-cover bg-center"
            :style="{ 'background-image': 'url(storage/images/yoga-1.jpg)' }">
            <h4 class="font-bold text-2xl">NOSOTROS</h4>
        </div>
       
        <div class="mx-auto container space-y-4 py-4">
            <p>
                Bienvenido a <b>Hidrogenix</b>, donde la innovación se encuentra con el bienestar. Como <b>distribuidor autorizado (Embajadores Afiliados)</b>,
                nos especializamos en brindar soluciones de vanguardia para <b>mejorar la salud y la vitalidad</b>. En el centro de nuestra oferta se encuentran
                las máquinas de <i>Hidrógeno Molecular</i>, generadores de hidrógeno molecular reconocidos por sus efectos transformadores sobre el bienestar.
            </p>
            <p>
                Comprometidos con el avance de la atención médica, nos enorgullecemos de ofrecer no solo <b>máquinas de Hidrógeno Molecular de última generación</b>,
                sino también una amplia gama de consumibles médicos de alta calidad. Nuestra misión se basa en brindar a las personas y a los profesionales de la salud
                un fácil acceso a los beneficios de la tecnología del hidrógeno molecular.
            </p>
            <p>
                En <b>Hidrogenix</b> priorizamos la <i>excelencia, la sostenibilidad y la satisfacción</i> del cliente. Nuestro equipo está dedicado a garantizar que
                nuestros productos cumplan con los más altos estándares, fomentando una cultura de <b>atención médica preventiva</b>. A través de asociaciones estratégicas,
                innovación continua y pasión por el bienestar, estamos dando forma a un futuro más saludable tanto para las personas como para las comunidades.
            </p>
            <p>
                Descubra el poder del <b>Hidrógeno Molecular con Hidrogenix</b>, su socio de confianza en el viaje hacia una vida más saludable y feliz.
            </p>

        </div>
</Layout></template>