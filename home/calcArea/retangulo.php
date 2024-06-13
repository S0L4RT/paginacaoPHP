<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular área do retângulo</title>
</head>
<body>
    <form action="retangulo.php" method="POST">
        <label for="largura">Largura:</label>
        <input type="number" name="largura" value="1" ><br>

        <label for="altura">Altura:</label>
        <input type="number" name="altura" value="1" ><br>
        
        <input type="submit" value="Calcular">
        <input type="reset" value="Limpar"><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['largura']) && isset($_POST['altura'])){
                $largura = floatval($_POST['largura']);
                $altura = floatval($_POST['altura']);
          
                $erro = (empty($largura) || empty($altura)) ?
                "Todos os campos são obrigatórios" : (($altura <0 || $largura <0) ?
                "Por favor, insira valores válidos" : "");
                if($erro){
                    echo $erro;
                } else {   
                    $retangulo = $largura * $altura;
                    echo "Resultado: $retangulo";
                    }
            } else{
                echo "Formulário não enviado corretamente";
            }
        }
    ?>
</body>
</html>