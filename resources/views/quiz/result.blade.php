<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Quiz</title>
    <link rel="stylesheet" href="{{ asset('css/result.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
    <header>
     
    </header>

    <main class="box">

        <div class="quiz-container">
            <h1 class="title">Quiz</h1>
            <h2 class="subtitle">Responda nosso Quiz e teste seu conhecimento sobre a nossa marca!</h2>

            <form action="result.blade.php" method="post"> 
                @csrf
               @foreach ($Questions as $question )
                   <p class="question">{{$question->description}}</p> 

                    @foreach ($question->alternatives as $alternative )
                        {{dd($alternative);}}
                        
                       
                    @endforeach
                    <hr>
               @endforeach

                <div class="botao">
                    <button type="submit" class="botao-enviar">Enviar</button>
                </div>
            </form>

        </div>

    </main>

    <footer>
        <p>&copy; - Feito por Kayke Melo - 2025</p>
    </footer>

</body>
</html>

