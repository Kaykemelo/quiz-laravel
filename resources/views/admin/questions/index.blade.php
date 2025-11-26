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
                         
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ $aQuiz[1]->description }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Cadastre novas perguntas para esse jogo de quiz.
                        </p>
                    </header>

    
                    <form action="{{ route('question.store') }}" method="post" class="mt-6 space-y-4">
                        @csrf
                    <div id="questions-wrapper" class="space-y-6">

                      <div class="flex flex-row gap-4 items-end">
                            <div class="flex-1">
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

</x-app-layout>
