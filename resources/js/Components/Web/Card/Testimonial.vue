<script setup>
import { ref } from 'vue'

const testimonialActive = ref(1)

</script>

<template>
    <div class="my-10 md:my-24 container mx-auto flex flex-col md:flex-row shadow-sm overflow-hidden" x-data="{ testimonialActive: 2 }" x-cloak>
		<div class="relative w-full py-2 md:py-24 bg-primary md:w-1/2 flex flex-col item-center justify-center">
			
			<div class="absolute top-0 left-0 z-10 grid-indigo w-16 h-16 md:w-40 md:h-40 md:ml-20 md:mt-24"></div>
			
			<div class="relative text-2xl md:text-5xl py-2 px-6 md:py-6 md:px-1 md:w-64 md:mx-auto text-indigo-100 font-semibold leading-tight tracking-tight mb-0 z-20">
				<span class="md:block text-center">Casos de éxito y testimonios</span>
			</div>
			<div class="absolute right-0 bottom-0 mr-4 mb-4 hidden md:block">
				<button 
					class="rounded-l-full border-r bg-gray-100 text-gray-500 focus:outline-none hover:text-primary font-bold w-12 h-10"
					@click="testimonialActive = testimonialActive === 1 ? 3 : testimonialActive - 1">
					&#8592;
				</button><button 
					class="rounded-r-full bg-gray-100 text-gray-500 focus:outline-none hover:text-primary font-bold w-12 h-10"
					@click="testimonialActive = testimonialActive >= 3 ? 1 : testimonialActive + 1">
					&#8594;
				  </button>
			</div>
		</div>
		<div class="bg-gray-100 md:w-1/2">
			<div class="flex flex-col h-full relative">
				<div class="absolute top-0 left-0 mt-3 ml-4 md:mt-5 md:ml-12">
					<svg xmlns="http://www.w3.org/2000/svg" class="text-primary/30 fill-current w-12 h-12 md:w-16 md:h-16" viewBox="0 0 24 24"><path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z"/></svg>
				</div>
				 
				<div class="h-full relative z-10">
					<div v-show="testimonialActive === 1">
						<p class="text-gray-600 serif font-normal italic px-6 py-6 md:px-16 md:py-10 text-xl md:text-2xl">
							Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
						</p>
					</div>
					
					<div v-show="testimonialActive === 2">
						<p class="text-gray-600 serif font-normal italic px-6 py-6 md:px-16 md:py-10 text-xl md:text-2xl">
							Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.
						</p>
					</div>
					
					<div v-show="testimonialActive === 3"> 
						<p class="text-gray-600 serif font-normal italic px-6 py-6 md:px-16 md:py-10 text-xl md:text-2xl" >
							Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.
						</p>
					</div>
				</div>
				<div class="flex my-4 justify-center items-center">
					<button 
						@click.prevent="testimonialActive = 1" 
						class="text-center font-bold shadow-xs focus:outline-none focus:shadow-outline inline-block rounded-full mx-2 transition-colors duration-300"
						:class="{'h-12 w-12 opacity-25 bg-primary/80 text-gray-600': testimonialActive != 1, 'h-16 w-16 opacity-100 bg-primary text-white': testimonialActive == 1 }"	
					>JD</button>
					<button 
						@click.prevent="testimonialActive = 2" 
						class="text-center font-bold shadow-xs focus:outline-none focus:shadow-outline h-16 w-16 inline-block bg-primary rounded-full mx-2 transition-colors duration-300"
						:class="{'h-12 w-12 opacity-25 bg-primary/80 text-gray-600': testimonialActive != 2, 'h-16 w-16 opacity-100 bg-primary text-white': testimonialActive == 2 }"	
					>WD</button>
					<button 
						@click.prevent="testimonialActive = 3" 
						class="text-center font-bold shadow-xs focus:outline-none focus:shadow-outline h-12 w-12 inline-block bg-primary rounded-full mx-2 transition-colors duration-300"
						:class="{'h-12 w-12 opacity-25 bg-primary/80 text-gray-600': testimonialActive != 3, 'h-16 w-16 opacity-100 bg-primary text-white': testimonialActive == 3 }"
					>JW</button>
				</div>
			</div>
		</div>
	</div>
</template>