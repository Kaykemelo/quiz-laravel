<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
</head>
<body>
     {{-- dd($Questions); --}} 
    <header>
     
    </header>

    <main class="box">

        <div class="quiz-container">
            <h1 class="title">Quiz</h1>
            <h2 class="subtitle"></h2>

            <form action="" method="post"> 

                @foreach ($Questions as $question )
                     <p class="question">{{$question->description}}</p> 

                        @foreach ($question->alternatives as $alternatives )   
                            <label><input type="radio" name="Resposta {{$alternatives->question_id}}" value="{{$alternatives->id}}">{{$alternatives->description}}</label>
                        @endforeach 
                     
                @endforeach

            </form>

            <div class="botao">
                <button type="submit" class="botao-enviar">Enviar</button>
            </div>

        </div>

    </main>

    <footer>
        <p>&copy; - Feito por Kayke Melo - 2025</p>
    </footer>

</body>
</html>
