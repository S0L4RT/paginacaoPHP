<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular área do triângulo</title>
</head>
<body>
    <form action="triangulo.php" method="POST">
    <label for="base">Base:</label>
        <input type="number" name="base"><br>

        <label for="altTri">Altura do triângulo: </label>
        <input type="number" name="altTri"><br>

        <input type="submit" value="Calcular">
        <input type="reset" value="Limpar"><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['base']) && isset($_POST['altTri'])){
                $base = floatval($_POST['base']);
                $altTri = floatval($_POST['altTri']);
          
                $erro = (empty($base) || empty($altTri)) ?
                "Todos os campos são obrigatórios" : (($base< 0 || $altTri < 0) ?
                "Por favor, insira valores válidos" : "");
                if($erro){
                    echo $erro;
                } else {
                        $triangulo = $altTri * $base;
                        echo "Resultado: $triangulo";
                }
            }else{                
                echo "Formulário não enviado corretamente";
            }
        }
    ?>
</body>
</html>