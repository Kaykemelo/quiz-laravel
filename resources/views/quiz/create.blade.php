<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $quiz->description }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="back max-w-lg mx-auto sm:px-6 lg:px-8 space-y-6 bg-white rounded lg h-auto p-8 shadow">
           <form>
                @csrf
                @foreach ($quiz->questions as $question )
                    <p class="font-sans font-normal text-base capitalize mb-2">
                        {{ $question->description }}
                    </p>

                        @foreach ($question->alternatives as $alternative )
                             <label class=" flex items-center gap-1 mb-1">
                                <input type="radio" value="testeee" value="">{{ $alternative->description }} 
                            </label>
                        @endforeach 

                        <hr class="mx-auto m-4 max-w-xs border mb-6">             
                @endforeach
                
                <div>
                     <button class="bg-black text-white px-4 py-2 rounded">Enviar</button>
                </div>

           </form>
        </div>
    </div>
    
</x-app-layout>