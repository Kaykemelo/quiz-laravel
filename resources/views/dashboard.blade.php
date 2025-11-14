<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   Olá {{ auth()->user()->name }}
                </div>

                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800">Quiz Disponiveis</h2>
                </div>

                  @foreach ($dashboards as $dashboard )
                     <div class="p-6 flex items-center gap-5 mb-6">
                        <p class="font-sans font-semibold text-gray-800"> 
                            {{ $dashboard->description }}
                        </p>
                        
                        <a href="{{route('quiz', $dashboard->id)}}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-neutral-800 transition duration-200 ease linear">Jogar</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
