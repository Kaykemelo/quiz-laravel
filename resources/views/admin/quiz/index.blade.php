<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cadastro do Quiz 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    @if (session('success') || session('error'))
                        <p class="font-semibold text-xl {{ session('success') ? 'text-green-800 dark:text-green-400' : 'text-red-800 dark:text-red-400' }} leading-tight">
                            {{ session('success') ?? session('error') }}
                        </p>
                    @endif


                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Novo Quiz
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Crie um novo jogo de quiz para os usuarios. 
                        </p>
                    </header>

                    <form method="post" action="{{ route('quiz.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="description" :value="__('Descrição do Quiz:')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autocomplete="description"/>
                            <x-input-error class="mt-2"  :messages="$errors->get('description')"/>
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Status:')"/>
                            <select id="status" name="status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required autocomplete="status" >
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Salvar</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
  
</x-app-layout>
