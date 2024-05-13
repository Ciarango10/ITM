<!DOCTYPE html>
<html>
<head>
    <title>Cronómetro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Cronómetro</h1>
    <button id="start" class="btn btn-primary">Iniciar</button>
    <button id="pause" class="btn btn-info">Pausar</button>
    <button id="reset"class="btn btn-danger">Reiniciar</button>
    <p id="time">00:00:00</p>
    <div id="laps"></div>

    <button id="lap" class="btn btn-success">Registrar vuelta</button>

    <script>
        var interval;
        var minutes = 0;
        var seconds = 0;
        var milliseconds = 0;

        $('#start').click(function() {
            interval = setInterval(function() {
                milliseconds += 10;
                if(milliseconds >= 1000) {
                    seconds++;
                    milliseconds = 0;
                }
                if(seconds >= 60) {
                    minutes++;
                    seconds = 0;
                }
                $('#time').text((minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds + ':' + (milliseconds < 10 ? '0' : '') + milliseconds);
            }, 10);
        });

        $('#pause').click(function() {
            clearInterval(interval);
        });

        $('#reset').click(function() {
            clearInterval(interval);
            minutes = 0;
            seconds = 0;
            milliseconds = 0;
            $('#time').text('00:00:00');
        });

        $('#lap').click(function() {
            var lapTime = $('#time').text();
            $('#laps').append('<p>' + lapTime + '</p>');
        });

    </script>
</body>
</html>
