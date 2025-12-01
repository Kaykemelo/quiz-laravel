<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Administração de Perguntas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="w-full">
                <section>
                          @if (session('success') || session('error'))
                                <p class="font-semibold text-xl {{ session('success') ? 'text-green-800 dark:text-green-400' : 'text-red-800 dark:text-red-400' }} leading-tight">
                                    {{ session('success') ?? session('error') }}
                                </p>
                         @endif

                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Cadastro de Perguntas
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Cadastre novas perguntas para esse jogo de quiz.
                        </p>
                    </header>

    
                    <form action="{{ route('question.store') }}" method="post" class="mt-6 space-y-4">
                        @csrf

                        <div class="space-y-6">
                            <select class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                                rounded-md shadow-sm" name="quiz_id" id="quiz_id">

                                @foreach ($aQuiz as $quiz )
                                    <option value={{ $quiz->id }}>{{ $quiz->description }}</option>
                                @endforeach 

                            </select>
                        </div>

                    <div id="questions-wrapper" class="space-y-6">

                      <div class="flex flex-row gap-4 items-end">
                            <div class="w-3/4">
                                <x-input-label for="description" :value="__('Descrição da Pergunta:')" />
                                <x-text-input id="description" name="description[]" type="text" class="mt-1 block w-full" required autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

    
                            <div class="w-40">
                                <x-input-label for="status" :value="__('Status:')" />
                                <select id="status" name="status[]" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                                rounded-md shadow-sm" required autocomplete="status">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                                </select>
                            </div>

                    
                            <div class="self-center mt-4">
                                <x-primary-button class="!bg-green-500 !hover:bg-green-600 dark:!bg-green-700 dark:!hover:bg-green-600" id="add-question">
                                Nova pergunta
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
    </div>

    <template id="question-template">
         <div class="flex flex-row gap-4 items-end">
                <div class="flex-1">
                    <x-input-label for="description" :value="__('Descrição da Pergunta:')" />
                    <x-text-input name="description[]" type="text" class="mt-1 block w-full" required autocomplete="description" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

    
                <div class="w-40">
                    <x-input-label for="status" :value="__('Status:')" />
                    <select name="status[]" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                                rounded-md shadow-sm" required autocomplete="status">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                    </select>
                </div>
          </div>
    </template>

    

    <div class="py-12">
        <div class="py-2 text-center">
                 @if (session('success_update') || session('error_update'))
                        <p class="text-sm {{ session('success_update') ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }} font-medium mb-4">
                            {{ session('success_update') ?? session('error_update') }}
                        </p>
                @endif  
                 @if (session('success_delete') || session('error_delete'))
                        <p class="text-sm {{ session('success_delete') ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }} font-medium mb-4">
                            {{ session('success_delete') ?? session('error_delete') }}
                        </p>
                @endif        
        </div>

        <div class="flex justify-center">
            <div class="relative w-[1000px] max-h-[600px] overflow-auto bg-white rounded-xl">
                <table class="w-full text-left table-auto min-w-max">
                     <thead>
                        <tr>
                            <th class="p-4 bg-gray-800 text-white font-semibold text-sm  border-b">
                                <p class="font-sans text-sm antialiased font-normal">
                                        Quiz
                                </p>
                            </th>
                            <th class="p-4 bg-gray-800 text-white font-semibold text-sm border-b">
                                <p class="font-sans text-sm antialiased font-normal">
                                    Perguntas
                                </p>
                            </th>
                            <th class="p-4 bg-gray-800 text-white font-semibold text-sm  border-b">
                                <p class="font-sans text-sm antialiased font-normal">
                                    Status
                                </p>
                            </th>
                            <th class="p-4 text-center bg-gray-800 text-white font-semibold text-sm  border-b" colspan="3">
                                <p class="font-sans text-sm antialiased font-normal">
                                    Ações
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aQuiz as $quiz )
                              @foreach ($quiz->questions as $question )
                                    <tr class="border-b border-blue-gray-50">
                                        <td class="p-4 border-b border-blue-gray-50">
                                            {{ $quiz->description }}
                                        </td>
                                        <td class="p-4 border-b border-blue-gray-50">
                                            {{ $question->description }}
                                        </td>
                                        <td class="p-4  text-center border-b border-blue-gray-50">
                                            {{$question->status}}
                                        </td>
                                        <td class="p-4 border-b border-blue-gray-50">
                                            <div class="flex justify-between gap-2">
                                            <a href="#" class=" font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                                Nova Alternativa
                                            </a>
                                            <button class="btn-open-modal  font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900"
                                                data-id="{{ $question->id }}"
                                                data-description="{{ $question->description }}"
                                                data-status="{{$question->status}}"
                                                data-quiz_id="{{ $question->quiz_id }}">
                                                    Editar
                                            </button>
                                            <form action="{{ route('question.destroy', $question->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf 

                                              <button type="submit" class=" font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                                Excluir
                                              </button>
                                            </form>
                                            </div>
                                        </td>
                                
                                    </tr>
                                @endforeach
                        @endforeach            
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="modal" class="hidden fixed inset-0 flex items-center justify-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="bg-white rounded-lg shadow-lg z-10 w-[800px] min-w-[400px] max-w-full p-6">
            <h2 class="text-lg font-semibold mb-4">
                Editar Pergunta
            </h2>
            
            <form id="formEditQuestion" action="{{route('question.update',['question' => 0]) }}" method="post">
                @csrf 
                @method('PUT')

                <input type="hidden" name="quiz_id" id="modal-quiz-id">

                <div class="mt-2">
                    <x-input-label for="description" :value="__('Descrição da Pergunta:')" />
                    <x-text-input id="modal-description" name="description" type="text" class="mt-1 block w-full" required autocomplete="description" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <div class="mt-2">
                    <x-input-label for="status" :value="__('Status:')" />
                    <select name="status" id="modal-status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                                rounded-md shadow-sm" required autocomplete="status">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                    </select>
                </div>    

                    <div class="mt-4 flex justify-end gap-2">
                        <button  type="button" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-400" onclick="window.location.href='/admin/questions/create'">Cancelar</button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Salvar</button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>
