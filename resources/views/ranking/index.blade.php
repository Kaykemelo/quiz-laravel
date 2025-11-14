<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ranking dos Resultados
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class=" max-w-xl w-full p-6 bg-white rounded shadow mx-auto flex flex-col items-center">

           <div class="p-6">
                <h2 class="font-semibold text-xl text-gray-800 text-center">Ranking</h2>
           </div>

            <div class="overflow-x-auto w-full">
                <table class="w-full text-left bg-white shadow-md border rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border b border-gray-300">
                            <th class="px-4 py-3 font-semibold  text-gray-700">Nome</th>
                            <th class="px-4 py-3 font-semibold  text-gray-700">Data da Execução</th>
                            <th class="px-4 py-3 font-semibold  text-gray-700">Pontuação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankings as $ranking )
                            <tr class="border b hover:bg-gray-50 transition">
                                <td class="px-4 py-2">{{$ranking->Nome}}</td>
                                <td class="px-4 py-2">{{$ranking->Data_Execucao}}</td>
                                <td class="px-4 py-2">{{$ranking->Pontuacao}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>