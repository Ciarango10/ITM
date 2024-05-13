<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Propinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Calcular propina</h1>

    <form action="{{ route('tipcalculator.calculate') }}" method="POST" class="p-3">
        @csrf   

        <div class="mb-3">
            <label for="billAmount">Ingrese el valor de la cuenta</label>
            <input type="text" class="form-control" name="billAmount">
        </div>

        <div class="mb-3">
            <label for="tipPercentage">Ingrese el porcentaje de la propina</label>
            <input type="text" class="form-control" name="tipPercentage">
        </div>

        <button type="submit" class="btn btn-primary">Calcular propina</button>

    </form>
</body>
</html>
