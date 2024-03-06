<!DOCTYPE html>
<html>
      <head>
            <title>Calculadora - Par Impar</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      </head>
      <body>
            <div class="container">
                  <h1>Diferenciar</h1>
                  <?php
                        $n1 = $_POST['n1'];
                        $n2 = $_POST['n2'];
                        $n3 = $_POST['n3'];
                        $n4 = $_POST['n4'];
                        $n5 = $_POST['n5'];
                        $n6 = $_POST['n6'];
                        $n7 = $_POST['n7'];
                        $n8 = $_POST['n8'];

                        $numeros = array($n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8);

                        if (empty($n1) || empty($n2) || empty($n3) || empty($n4) || empty($n5) || empty($n6) || empty($n7) || empty($n8)) {
  
                              echo('<div class="alert alert-danger" role="alert">
                                          Debe ingresar 8 numeros <button class="btn"><a href="index.html">Volver</a></button>
                                    </div>');                  
                        }
                        else {
                            $total_numeros = count($numeros);
                            for ($i = 0; $i < $total_numeros; $i++) {
                                if($numeros[$i] % 2 == 0) {
                                    echo("<h2 class='text-primary'>$numeros[$i] : PAR</h2>");
                                } else {
                                    echo("<h2 class='text-success'>$numeros[$i] : IMPAR</h2>");
                                }
                            }
                        }

                  ?>
            </div>
      </body>
</html>