<!DOCTYPE html>
<html>
      <head>
            <title>Calculadora - Suma</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      </head>
      <body>
            <div class="container">
                  <h1>Suma</h1>
                  <?php

                        $n1 = $_POST['n1'];
                        $n2 = $_POST['n2'];

                        if (empty($n1) || empty($n2)) {
  
                              echo('<div class="alert alert-danger" role="alert">
                                          Debe ingresar ambos numeros <a href="index.html">Volver</a>
                                    </div>');                  
                        }

                        else {

                              $sum = $n1 + $n2;

                              echo("<h2 class='text-success'>El resultado de la suma es: $sum</h2>");
                        }

                  ?>
            </div>
      </body>
</html>