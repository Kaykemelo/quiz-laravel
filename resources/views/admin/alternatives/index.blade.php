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
             <div class="flex flex-row gap-6 itens-end">
                    <div class="flex-[3]">
                        <x-input-label for="description" :value="__('Descrição da Alternativa:')" /> 
                        <x-text-input id="alternatives" name="description[]" type="text" class="mt-1 block " required />
                        <x-input-error  class="mt-2" :messages="$errors->get('description')"/>
                    </div>

                    <div class="flex-[1] w-[150px]">
                        <x-input-label for="correção" :value="__('Correção:')" />
                        <select name="correct[]" id="correção" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                        focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                        rounded-md shadow-sm" required>
                            <option value="1">Correta</option>
                            <option value="0">Incorreta</option>
                        </select>
                    </div>
             </div>

        </template>
    </div>
</x-app-layout>
