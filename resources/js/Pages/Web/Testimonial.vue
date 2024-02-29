<script setup>
import Testimonial  from '@/Components/Web/Card/Testimonial.vue';
import Layout from '@/Layouts/WebLayout.vue';
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <Testimonial />
        <div class="mx-auto container space-y-4">
            <div class="mx-auto container md:col-span-2 lg:col-span-6">
                    <h4 class="font-thin text-2xl text-center text-primary">¡Compártenos tu testimonio!</h4>
                </div>
            <form class="ml-auo space-y-4">
                        <input type='text' placeholder='Nombre'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-primary" />
                        <input type='email' placeholder='Correo'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-primary" />
                        <input type='file' placeholder='Foto'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-primary" />
                        <textarea placeholder='Mensaje' rows="6"
                            class="w-full rounded-md px-4 border text-sm pt-2.5 outline-primary"></textarea>
                        <button type='button'
                            class="text-white bg-primary hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">Enviar</button>
                    </form>
                    <p class="text-xs">EL ADJUNTAR IMAGENES Y/O DOCUMENTOS COMO ESTUDIOS Y FOTOGRAFIAS ES OPCIONAL PERO DE MUCHO VALOR, YA QUE ACOMPAÑA VISUALMENTE LOS TESTIMONIOS.  NOS  COMPROMETEMOS A MANEJAR LA INFORMACIÓN CON MUCHO RESPETO Y PRIVACIDAD  QUITANDO CUALQUIER RASGO PERSONAL.</p>
        </div>
    </Layout>
</template>