<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Administração de Alternativas 
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-2xl  mx-auto p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="w-full">
                <section>
                    @if (session('success') || session('error') )
                        <p class="font-semibold text-xl {{ session('success') ? 'text-green-800 dark:text-green-400' : 'text-red-800 dark:text-red-400' }} leading-tight">
                            {{session('success') ?? session('error') }}
                        </p>
                    @endif    
                        
                    <header>
                        <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                            Cadastro de Alternativas 
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Cadastre novas alternativas pra pergunta selecionada.
                        </p>
                    </header>

                    <form action="{{ route('alternative.store') }}" method="post" class="mt-6 space-y-6">
                        @csrf 
                        <div class="space-y-6">
                           <x-text-input id="question" type="text" name="question"  value="{{$aQuestion->description}}" class="mt-1 block w-full" disabled/>

                           <input type="hidden" name="question_id" value="{{ $aQuestion->id  }}">
                        </div>

                        <div id="alternative-wrapper" class="space-y-6">

                            <div class="flex flex-row gap-6 items-end">
                                <div class="flex-[3]">
                                    <x-input-label for="description" :value="__('Descrição da Alternativa:')" /> 
                                    <x-text-input id="alternatives" name="description[]" type="text" class="mt-1 block " required />
                                    <x-input-error  class="mt-2" :messages="$errors->get('description')"/>
                                </div>

                                <div class="flex-[1] min-w-[150px]">
                                    <x-input-label for="correct" :value="__('Correção:')" />
                                    <select name="correct[]" id="correção" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                                    rounded-md shadow-sm" required>
                                        <option value="1">Correta</option>
                                        <option value="0">Incorreta</option>
                                    </select>
                                </div>

                                <div class=" flex-none self-center mt-4">
                                    <x-primary-button class="!bg-green-500 !hover:bg-green-600 dark:!bg-green-700 dark:!hover:bg-green-600" id="add-alternative">
                                        Nova Alternativa
                                    </x-primary-button>
                                </div>

                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <x-primary-button>Salvar</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <template id="alternative-template">
             <div class="flex flex-row gap-6 items-end">
                    <div class="w-1/2">
                        <x-input-label for="description" :value="__('Descrição da Alternativa:')" /> 
                        <x-text-input  name="description[]" type="text" class="mt-1 block " required />
                        <x-input-error  class="mt-2" :messages="$errors->get('description')"/>
                    </div>

                    <div class="w-40">
                        <x-input-label for="correção" :value="__('Correção:')" />
                        <select name="correct[]" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                        focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                        rounded-md shadow-sm" required>
                            <option value="1">Correta</option>
                            <option value="0">Incorreta</option>
                        </select>
                    </div>
             </div>

        </template>
    </div>


    <div class="py-12">

        <div class="flex justify-center mb-4">

            @if (session('success_update') || session('error_update'))
                <p class="font-semibold  text-base {{ session('success_update') ? 'text-green-800 dark:text-green-400' : 'text-red-800 dark:text-red-400'}} mb-4 leading-tight">
                    {{session('success_update') ?? session('error_update')}}
                </p>
            @endif

            @if (session('success_delete') || session('error_delete'))
                <p class="font-semibold  text-base {{ session('success_delete') ? 'text-green-800 dark:text-green-400' : 'text-red-800 dark:text-red-400'}} mb-4 leading-tight">
                    {{session('success_delete') ?? session('error_delete')}}
                </p>
            @endif

        </div>

        <div class="flex justify-center">
            <div class="relative w-[1000px] max-h-[600px] overflow-auto bg-white rounded-xl ">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 bg-gray-800 text-white font-semibold text-sm  border-b">
                                <p class="font-sans text-sm antialiased font-normal">
                                    Pergunta
                                </p>
                            </th>
                            <th class="p-4 bg-gray-800 text-white font-semibold text-sm  border-b">
                                <p class="font-sans text-sm antialiased font-normal">
                                    Alternativas 
                                </p>
                            </th>
                            <th class="p-4 bg-gray-800 text-center text-white font-semibold text-sm  border-b" colspan="2">
                                <p class="font-sans text-sm antialiased font-normal">
                                    Ações
                                </p>
                            </th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aQuestion->alternatives as $alternatives )
                            <tr class="border-b border-blue-gray-50">
                                <td class="p-4 border-b border-blue-gray-50">
                                    {{ $aQuestion->description }}
                                </td>
        
                                <td class="p-4 border-b border-blue-gray-50">
                                    {{ $alternatives->description }}
                                </td>
        
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex justify-between">
                                        <button class="btn-modal  font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900"
                                            data-id="{{$alternatives->id}}"
                                            data-question_id="{{$aQuestion->id}}"
                                            data-description="{{$alternatives->description}}"
                                            data-correct="{{$alternatives->correct}}">
                                                Editar
                                        </button>
                                        <form action="{{ route('alternative.destroy',                 [$alternatives->id] )}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                                Excluir
                                            </button>
                                        </form>    
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <div id="modal-alternatives" class="hidden fixed inset-0 flex items-center justify-center">
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div class="bg-white rounded-lg shadow-lg z-10 w-[600px] min-w-[400px] max-w-full p-6">
                <h2 class="text-lg font-semibold mb-4">
                    Editar Alternativa 
                </h2>

                <form id="formEditAlternative" action="{{route('alternative.update', ['alternative' => 0] )}}" method="post"> 
                    @csrf 
                    @method('PUT')

                    <input type="hidden" name="question_id" id="question_id-modal">

                    <div class="mt-2">
                        <x-input-label for="description" :value="__('Descrição da Alternativa:')" />
                        <x-text-input id="alternative-modal" name="description" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="correção" :value="__('Correção:')" />
                            <select id="correct-modal" name="correct" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                            rounded-md shadow-sm" required>
                                <option value="1">Correta</option>
                                <option value="0">Incorreta</option>
                            </select>
                    </div>

                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-400" onclick="window.location.href='{{route('alternative.create', $aQuestion->id)}}'">
                            Cancelar
                        </button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Salvar 
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
