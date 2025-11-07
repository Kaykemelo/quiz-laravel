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
                <table class="w-full border-collapse border border-gray-800">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-800 px-4 py-2 text-center bg-gray-100">Nome</th>
                            <th class="border border-gray-800 px-4 py-2 text-center bg-gray-100">Data da Execução</th>
                            <th class="border border-gray-800 px-4 py-2 text-center bg-gray-100">Pontuação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankings as $ranking )
                            <tr class="bg-gray-200">
                                <td class="border border-gray-300 px-4 py-2 break-words">{{$ranking->Nome}}</td>
                                <td class="border border-gray-300 px-4 py-2 break-words">{{$ranking->Data_Execucao}}</td>
                                <td class="border border-gray-300 px-4 py-2 break-words">{{$ranking->Pontuacao}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>