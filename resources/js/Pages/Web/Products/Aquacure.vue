<script setup>
import Layout from '@/Layouts/WebLayout.vue';
import { ref } from 'vue';

const section = ref(0)
</script>

<template>
    <Layout>
        <div class="mx-auto container"></div>
        <div class="mx-auto container grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div class="w-full">
                <img src="/storage/images/product-aquacure.jpg" />

            </div>
            <div class="lg:col-span-3">
                <form class="space-y-2">
                    <input type='text' placeholder='Nombre'
                        class="w-full rounded-md py-2 px-4 border text-sm outline-primary" />
                    <input type='text' placeholder='Apellido'
                        class="w-full rounded-md py-2 px-4 border text-sm outline-primary" />
                    <input type='email' placeholder='País'
                        class="w-full rounded-md py-2 px-4 border text-sm outline-primary" />
                    <input type='email' placeholder='Ciudad'
                        class="w-full rounded-md py-2 px-4 border text-sm outline-primary" />
                    <input type='email' placeholder='Correo'
                        class="w-full rounded-md py-2 px-4 border text-sm outline-primary" />
                    <input type='text' placeholder='Asunto'
                        class="w-full rounded-md py-2 px-4 border text-sm outline-primary" />
                    <textarea placeholder='Mensaje' rows="6"
                        class="w-full rounded-md px-4 border text-sm pt-2.5 outline-primary"></textarea>
                    <button type='button'
                        class="text-white bg-primary hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">Enviar</button>
                </form>
            </div>
        </div>
        <div class="container mx-auto w-full">
            <div class="flex w-full justify-between mb-4">
                <div
                    class="border-t-2 w-full cursor-pointer"
                    :class="{'border-primary':section == 0}"
                    @click="section = 0"
                >
                    <h4 class="text-center">Descripción</h4>
                </div>
                <div
                    class="border-t-2 w-full cursor-pointer"
                    :class="{'border-primary':section == 1}"
                    @click="section = 1"
                >
                    <h4 class="text-center">Disclaimer</h4>
                </div>
                <div
                    class="border-t-2 w-full cursor-pointer"
                    :class="{'border-primary':section == 2}"
                    @click="section = 2"
                >
                    <h4 class="text-center">Normas de seguridad</h4>
                </div>
                <div
                    class="border-t-2 w-full cursor-pointer"
                    :class="{'border-primary':section == 3}"
                    @click="section = 3"
                >
                    <h4 class="text-center">Garantía</h4>
                </div>
            </div>
            <div v-show="section == 0">
                <p class="mb-2">Lo que se incluye con su máquina:</p>
                <ul class="list-disc list-inside">
                    <li>Torre con unión de conexión rápida</li>
                    <li>Humidificador con manguera de conexión</li>
                    <li>Burbujeador de agua potable de 1 litro</li>
                    <li>3 mangueras de oxígeno: 1 pie, 4 pies y 7 pies</li>
                    <li>Aplicador de punto</li>
                    <li>Gafas de protección</li>
                    <li>Conector en T</li>
                    <li>Conector de manguera (para extender el alcance de la manguera)</li>
                    <li>Medidor de TDS</li>
                    <li>Embudo</li>
                    <li>Toalla</li>
                    <li>Polvo de lejía</li>
                    <li>Cinta para roscas</li>
                    <li>Jeringa</li>
                    <li>Piedra de burbujeo</li>
                </ul>
            </div>
            <div v-show="section == 1">
                <p class="mb-2">**Descargo de Responsabilidad Médica**</p>
                <ol class="list-decimal list-inside">
                    <li>
                        Por razones legales, necesitamos aclarar desde el principio que el AquaCure AC50 aún no está definido como un dispositivo médico y, por lo tanto, no puede recomendarse legalmente para uso humano. Por favor, asuma que lo que decimos no está aprobado por NINGUNA agencia gubernamental, organización médica o compañía farmacéutica.
                    </li>
                    <li>
                        Dado que las personas son diferentes, los resultados también lo serán. Aunque nuestros productos utilizan SOLO ingredientes naturales, siempre consulte con su médico los riesgos asociados con los suplementos dietéticos y sus condiciones de salud específicas y/o alergias.
                    </li>
                    <li>
                        Las declaraciones en este sitio web (y/o las declaraciones hechas por el inventor, George Wiseman) no han sido evaluadas ni aprobadas por la FDA, AMA, ATF, CIA, CDC, DEA, DHS, DOE, EPA, FCC, FEC, FBI, FTC, ICC, INS, IRS, NIH, NSA, OGA, OMS, etc.
                    </li>
                    <li>
                        Nuestros productos no están destinados a diagnosticar, tratar, curar o prevenir ninguna enfermedad. Si está embarazada, en período de lactancia, tomando medicamentos o tiene una condición médica, consulte a su médico antes de usar nuestros productos.
                    </li>
                    <li>
                        La información proporcionada en este sitio es solo para fines informativos y no pretende sustituir el consejo de su médico u otro profesional de la salud ni cualquier información contenida en la etiqueta o el empaque de cualquier producto.
                    </li>
                    <li>
                        No debe usar la información en este sitio para el diagnóstico o tratamiento de ningún problema de salud ni para la prescripción de ningún medicamento u otro tratamiento.
                    </li>
                    <li>
                        Siempre consulte con un profesional de la salud antes de comenzar cualquier programa de dieta, ejercicio o suplementación, antes de tomar cualquier medicamento o si tiene o sospecha que podría tener un problema de salud.
                    </li>
                    <li>
                        No debe dejar de tomar ningún medicamento sin consultar primero a su médico.
                    </li>
                    <li>
                        Cientos de estudios científicos han demostrado que el hidrógeno molecular es seguro para que las plantas y los animales lo usen para beber y respirar.
                    </li>
                    <li>
                        Un estudio de estos estudios (incluidos los realizados en humanos) no muestra efectos secundarios negativos del hidrógeno, solo beneficios positivos.
                    </li>
                    <li>
                        Una de las cosas que la ciencia médica actual está "redescubriendo" es que las frecuencias importan. Por lo tanto, para aquellos que entienden la relación entre las frecuencias y el bienestar, hemos agregado la capacidad (controlada electrónicamente) de "impresionar" frecuencias en el HydrOxy.
                    </li>
                </ol>
            </div>
            <div v-show="section == 2">
                <ul class="list-disc list-inside">
                    <li>
                        El AquaCure AC50 está construido según las normas de seguridad CE, que se han ACTUALIZADO para cumplir con las normas de seguridad CSA/UL y australianas.
                    </li>
                    <li>
                        El modelo AquaCure AC50 tiene un apagado eléctrico a 2 psi y un alivio de sobrepresión de gas a 3 psi. Los apagados de nivel alto y bajo son solo algunas de las muchas características de seguridad instaladas en el AquaCure.
                    </li>
                    <li>
                        El modelo AquaCure AC50 ofrece una producción de gas ajustable. Esto le permite variar fácilmente y con precisión la salida de gas. Esta funcionalidad es vital para la seguridad al hacer mezclas de hidrógeno optimizadas.
                    </li>
                    <li>
                        El AquaCure AC50 está específicamente diseñado para ayudar a prevenir una mezcla de gas que contenga más del 4% de hidrógeno.
                    </li>
                    <li>
                        El AquaCure produce ExW (agua eléctricamente expandida). ExW es el ingrediente que hace que el gas de Brown sea aproximadamente un 30% terapéuticamente superior al hidrógeno simple.
                    </li>
                    <li>
                        HydrOxy es 100% no tóxico y seguro para beber cuando se infunde en agua. El AquaCure produce el gas de Brown de manera remota del agua potable, por lo que el agua potable NO está contaminada con el catalizador electrolítico ni impurezas (estas permanecen en la máquina para ser limpiadas posteriormente).
                    </li>
                    <li>
                        "No hay una máquina de gas de Brown más segura en el mundo que el AquaCure. He estado vendiendo máquinas de gas de Brown desde 1986 y en todo ese tiempo (más de 10,000 ventas) ninguna persona ha resultado herida de ninguna manera." – George Wiseman, el inventor del AquaCure AC50.
                    </li>
                </ul>
            </div>
            <div v-show="section == 3">
                <p><b>GARANTÍA DE POR VIDA</b></p>
                <ul class="list-disc list-inside">
                    <li>
                        La garantía incluye piezas, mano de obra y envío si el problema está relacionado con el fabricante. Hemos estado en el negocio desde 1984 y esperamos estar en el negocio al menos otros 20 años. La garantía se asigna al cliente de Eagle-Research (quien nos pagó el dinero) y generalmente no es transferible.
                    </li>
                    <li>
                        Si la garantía es inválida (debido a reventa o abuso del usuario), aún repararemos cualquier problema de por vida si el propietario paga por las piezas, la mano de obra y el envío. Seguimos respaldando todos los productos que hemos vendido.
                    </li>
                </ul>
                <p class="mt-4"><b>GARANTÍA DE SATISFACCIÓN 100%:</b></p>
                <ul class="list-disc list-inside">
                    <li>
                        A menudo recibimos la pregunta… ¿El gas de Brown ayuda con (rellene el espacio en blanco)?
                    </li>
                    <li>
                        No podemos garantizar ningún resultado en particular porque cada cuerpo es diferente. Sin embargo, como estamos TAN SEGUROS de que estará satisfecho con esta máquina, ofrecemos una garantía de satisfacción del 100% sin preguntas durante un AÑO en su primera compra de AquaCure (1 año desde la fecha en que reciba su primera máquina).
                    </li>
                    <li>
                        No necesita dar una razón si desea devolver la máquina (incluso después de usarla durante 12 meses), solo pida un número de RMA y las instrucciones para devolverla correctamente y (una vez que evaluemos la máquina) le reembolsaremos el precio de compra (menos una tarifa de reposición de $200 y los costos/tarifas de envío, impuestos y aduanas no se reembolsan).
                    </li>
                </ul>
            </div>

        </div>
</Layout></template>