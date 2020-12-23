<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex blocoGeral">
                    
                    <!-- list users -->

                    <div class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200">
                        <ul>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b hover:bg-gray-200 border-gray-200 hover:bg-opacity-50 hover:cursor-pointer">
                                <p class="flex items-center">
                                    Robson V. Leite
                                    <span class="ml-2 w-2 h-2 bg-blue-500 rounded-full"></span>
                                </p>
                            </li>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b hover:bg-gray-200 border-gray-200 hover:bg-opacity-50 hover:cursor-pointer">
                                <p class="flex items-center">
                                    Kaue Francisquini
                                    <span class="ml-2 w-2 h-2 bg-blue-500 rounded-full"></span>
                                </p>
                            </li>
                        </ul>
                    </div>

                    <!-- box mensagem -->
                    <div class="w-9/12">

                        <!-- mensagem -->
                        <div class="w-full p-6 flex flex-col">
                            <div class="w-full mb-3 text-right">
                                <p class="inline-block p-2 rounded-md larguraMaxima messageFromMe">
                                    olá!
                                    <span class="block mt-1 text-xs text-gray-500">23/12/2020 17:27</span>
                                </p>
                            </div>

                            <div class="w-full mb-3">
                                <p class="inline-block p-2 rounded-md larguraMaxima">
                                    oi!
                                    <span class="block mt-1 text-xs text-gray-500 messageToMe">23/12/2020 17:27</span>
                                </p>
                            </div>
                        </div>

                        <form>
                            <input type="text" class="">
                            <button>enviar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
