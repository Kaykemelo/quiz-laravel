<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $quiz->description }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="back max-w-lg mx-auto sm:px-6 lg:px-8 space-y-6 bg-white rounded lg h-auto p-8 shadow">
           <form action="{{ route('quiz.result') }}" method="post">
                <input type='hidden' name='quiz_id' value='{{ $quiz->id }}'>
                @csrf
                @foreach ($quiz->questions as $question )
                    <p class="font-sans font-medium text-gray-800 text-base mb-2">
                        {{ $question->description }}
                    </p>

                        @foreach ($question->alternatives as $alternative )
                             <label class=" flex items-center gap-1 mb-1 text-[13px] text-gray-800">
                                <input type="radio" name="Answer[{{ $question->id }}]" value="{{ $alternative->id }}">{{ $alternative->description }} 
                             </label>
                        @endforeach 
                        <hr class="mx-auto my-6 w-[85%] border border-gray-300 mb-6">   

                @endforeach
                
                <div class="flex justify-center items-center">
                     <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-neutral-800 transition duration-200 ease-linear">Enviar</button>
                </div>

           </form>
        </div>
    </div>
    
</x-app-layout>