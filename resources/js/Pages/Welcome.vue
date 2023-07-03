<script setup>
import MainNav from '@/Layouts/MainNav.vue';
import { Head, Link} from '@inertiajs/vue3';

</script>

<template>
    <MainNav>

        <div class="flex justify-center">
            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Sistema de Registro de Denuncias en Santa Cruz de la Sierra</h1>
        </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <Link :href="route('map')" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Mapa de Denuncias</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Podra observar los diferentes tipos de denuncias alrededor de la ciudad de Santa Cruz, ademas de poder filtrar las denuncia y observar las ubicaciones de cada una de ellas.
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-green-900 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </Link>

                    <a href="https://laracasts.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Aplicaciones para vecinos</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Los vencinos podra acceder a la aplicacion movil con la que podran registrarse previa validacion de las mismas a travez de la procedimientos correspondientes, esta aplicación permitira a cada vecino poder hacer su
                                respectiva denuncia de los desperfectos, inconvenientes o reclamos que pueda observar alrededor de la ciudad en cualquier momento.
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-green-900 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>


                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-black-900 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        2023- Semestre 1
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-black-900 dark:text-gray-400 sm:text-right sm:ml-0">
                    Proyecto Topicos Avanzados de Programación
                </div>
            </div>
    </MainNav>
</template>
