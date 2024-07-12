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
            <Faq title="¿Cual es la diferencia entre agua Kangen y agua hidrogenada?">
                <p class="text-style">
                    <b>El agua hidrogenada</b> es agua mejorada con hidrógeno molecular. A pesar de su simplicidad, el poder del hidrógeno molecular hace de este tipo de agua una fuerza asombrosa. 
                </p>
                <div class="grid gap-2 grid-cols-1 lg:grid-cols-3">
                    <div class="lg:col-span-3">
                        <h4 class="p-2 bg-primary text-center text-white">¿Qué es?</h4>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">Agua hidrogenada</h4>
                        <p class="p-2 text-style">
                            Agua hidrogenada o agua rica en hidrógeno simplemente significa agua normal (H2O) que contiene gas hidrógeno disuelto (H2).
                        </p>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">Agua Alkalina</h4>
                        <p class="p-2 text-style">
                            Agua con un pH alcalino: Agua purificada más minerales alcalinos añadidos artificialmente.
                        </p>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">Agua Ionizada</h4>
                        <p class="p-2 text-style">
                            Agua que contiene hidrógeno molecular.
                        </p>
                    </div>
                </div>
                <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2">
                        <h4 class="p-2 bg-primary text-center text-white">¿Como se fabrica?</h4>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">AquaCure (Máquina de hidrógeno molecular)</h4>
                        <p class="p-2 text-style">
                            Máquina que produce hidrógeno molecular puro a través de un proceso de electrólisis.
                        </p>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">Enagic (Kangen water)</h4>
                        <p class="p-2 text-style">
                            Ionizador de agua genera un flujo continuo de 5 tipos versátiles de agua con diferentes pH.
                        </p>
                        <ul class="p-2 list-inside list-decimal">
                            <li><b>Agua Kangen fuerte:</b> NO SE TOMA, se para limpieza.</li>
                            <li><b>Agua Kangen®:</b> Agua para tomar, contiene hidrógeno molecular más minerales.</li>
                            <li><b>Agua neutra:</b> PH 7</li>
                            <li><b>Agua de belleza:</b> PH de 4 a 6</li>
                            <li><b>Agua ácida fuerte:</b> NO SE TOMA, se usa para limpieza.</li>
                        </ul>
                    </div>
                </div>
                <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2">
                        <h4 class="p-2 bg-primary text-center text-white">Via de administración</h4>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">AquaCure (Máquina de hidrógeno molecular)</h4>
                        <ul class="p-2 list-inside list-decimal">
                            <li>Inhalación</li>
                            <li>Oral (Tomando agua hidrogenada) </li>
                            <li>Tópica</li>
                        </ul>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">Enagic (Kangen water)</h4>
                        <ul class="p-2 list-inside list-decimal">
                            <li>Inhalación</li>
                            <li>Tópica</li>
                        </ul>
                    </div>
                </div>
                <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2">
                        <h4 class="p-2 bg-primary text-center text-white">Efectos secundarios</h4>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">AquaCure (Máquina de hidrógeno molecular)</h4>
                        <p class="p-2 text-style">
                            Ninguno, por ser 100% natural y conocido para nuestro cuerpo. (Nuestro cuerpo ya produce hidrógeno molecular, aunque en menores concentraciones).
                        </p>
                    </div>
                    <div class="border-2">
                        <h4 class="p-4 bg-primary text-center text-white">Enagic (Kangen water)</h4>
                        <p class="p-2 text-style">
                            
                        </p>
                    </div>
                </div>
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
            <Faq title="¿Cómo funcionan las máquinas Kangen?">
                <p class="text-style">
                    Tanto las máquinas Kangen como las alcalinas funcionan electrolizando agua. En estas máquinas se instalan placas y a través de ellas pasan
                    corrientes positivas y negativas para crear agua separando iones. Es por eso que el agua producida por máquinas Kangen y alcalinas a veces se
                    llama agua “ionizada”.
                </p>
            </Faq>
            <Faq title="¿Cuales son los beneficios del agua Kangen?">
                <p class="text-style">
                    El agua Kangen y otros tipos de agua alcalina tienen muchos propósitos en cuanto a salud, limpieza y belleza.
                </p>
                <p class="text-style">
                    Los hallazgos de un estudio de 2012 encontraron que el agua alcalina con un pH de 8,8 puede potencialmente disminuir los síntomas del reflujo ácido.
                     otros beneficios para la salud sugeridos incluyen la disminución de los síntomas en personas con hipertensión, diabetes y colesterol alto.
                </p>
            </Faq>
            <Faq title="¿Cuales son los riesgos del agua Kangen?">
                <p class="text-style">
                    El agua Kangen está disponible en formulaciones que son seguras para beber y en fórmulas alcalinas fuertes que no son seguras para beber.
                </p>
                <p class="text-style">
                    El agua alcalina fuerte pretende beneficiar su salud. Una de las formas en que lo hace es eliminando de las frutas y verduras elementos como pesticidas.
                    Sin embargo, cabe señalar que este tipo de agua alcalina fuerte viene acompañada de cierta pseudociencia.
                </p>
                <p class="text-style">
                    Las empresas suelen comercializar agua alcalina fuerte como lo suficientemente potente como para eliminar los pesticidas de las frutas y verduras
                    después de remojar estos alimentos en el agua. A menudo se utiliza un cambio en la coloración del agua como prueba de esta fuerte capacidad.
                </p>
                <p class="text-style">
                    Sin embargo, según el Instituto del Hidrógeno Molecular, la razón del cambio en la coloración del agua después de remojar los productos en agua alcalina
                    fuerte no se debe exclusivamente a los pesticidas. Simplemente es absorber el pigmento de la fruta o verdura.
                </p>
            </Faq>
        </div>
</Layout></template>