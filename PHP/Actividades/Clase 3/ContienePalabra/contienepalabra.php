<!DOCTYPE html>
<html>
      <head>
            <title>Contiene la palabra</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      </head>
      <body>
            <div class="container">
                  <h1>Contiene la palabra</h1>
                  <?php
                        $frase = $_POST['frase'];
                        $palabra = $_POST['palabra'];

                        if (empty($palabra) || empty($frase)) {
                              echo('<div class="alert alert-danger" role="alert">
                                          Ambos campos son necesarios <button class="btn"><a href="index.html">Volver</a></button>
                                    </div>');                  
                        }
                        else {
                              if (strpos($frase, $palabra) !== false) {
                                    echo "La frase contiene la palabra '$palabra'.";
                              } else {
                                    echo "La frase no contiene la palabra '$palabra'.";
                              }
                        }
                  ?>
            </div>
      </body>
</html>