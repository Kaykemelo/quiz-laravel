<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Resultado do Quiz
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="back max-w-lg mx-auto sm:px-6 lg:px-8 bg-white rounded lg h-auto p-8 shadow">
                @foreach ($questions as $question )
                    <p class="font-sans font-medium text-gray-800 text-base mb-2">
                        {{ $question->description }}
                    </p>
                    @foreach ($question->alternatives as $alternative) 
                        @php 
                            $bold = '';
                            $color = 'text-gray-800';
                        @endphp 

                        @if ($alternative->answers->isNotEmpty())

                            @if ($alternative->answers->first()->alternative_id == $alternative->id) 
                                @php 
                                    $color = $alternative->correct == 1 ? 'text-green-500' : 'text-red-500';
                                    $bold = 'font-bold';
                                @endphp
                              
                            @endif 

                        @endif 
                       
                            <label class="flex items-center gap-1 text-[13px] {{ $color }} {{ $bold }} mb-1 ml-4 ">
                                <span>{{ $alternative->description }}</span>
                            </label>

                    @endforeach
                    <hr class="mx-auto my-6 w-[85%] border border-gray-300 mb-6"> 

                @endforeach

                <div class="flex justify-between items-center">
                    <a href="{{route('dashboard') }}"  class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-neutral-800 transition duration-200 ease-linear">Novo Quiz</a>
                    <a href="{{route('quiz', [ $question->quiz_id ])}}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-neutral-800 transition duration-200 ease-linear">Refazer</a>
                </div>
        </div>
    </div>
</x-app-layout>