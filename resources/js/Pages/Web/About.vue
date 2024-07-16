<script setup>
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
                <h4 class="font-bold text-2xl">NOSOTROS</h4>
            </Title>
        </div>
       
        <div class="mx-auto container space-y-4 py-4 text-style text-justify">
            <p>
                Bienvenido a <b>Hidrogenix</b>, donde la innovación se encuentra con el bienestar. Como <b>distribuidor autorizado (Embajadores Afiliados)</b>, nos especializamos en brindar
                soluciones de vanguardia para mejorar la salud y la vitalidad. En el centro de nuestra oferta se encuentran las máquinas de Hidrógeno Molecular, generadores de
                hidrógeno molecular reconocidos por sus efectos transformadores sobre el bienestar.
            </p>
            <p>
                Comprometidos con el avance de la atención médica, nos enorgullece ofrecer no solo <b>máquinas de Hidrógeno Molecular de última generación</b>, sino también una amplia gama de
                <b>consumibles médicos de alta calidad</b>. Nuestra misión es proporcionar a las personas y a los profesionales de la salud un acceso fácil a los beneficios de la tecnología del
                hidrógeno molecular.

            </p>
            <p>
                En <b>Hidrogenix</b> también compartimos información relevante sobre los beneficios, noticias, ensayos clínicos y estudios científicos relacionados con las
                terapias de hidrógeno molecular, con el fin de informar y difundir los últimos avances de esta terapia natural. Creemos firmemente en su capacidad para
                complementar tratamientos médicos, prevenir enfermedades y mantener una salud óptima.
            </p>
            <p>
                <b>Priorizamos</b> <i></i>la excelencia, la sostenibilidad y la satisfacción del cliente. Nuestro equipo se dedica a garantizar que nuestros productos estén <b>acompañados
                del mejor servicio y atención al cliente</b>, fomentando una cultura de atención a la salud preventiva. A través de asociaciones estratégicas, innovación continua
                y pasión por el bienestar, estamos moldeando un futuro más saludable tanto para las personas como para las comunidades.
            </p>
            <p>
                Descubran el poder del <b>Hidrógeno Molecular con Hidrogenix</b>, su socio de confianza en el viaje hacia una vida más saludable y feliz.
            </p>
        </div>
</Layout></template>