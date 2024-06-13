<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular área do circulo</title>
</head>
<body>
    <form action="circulo.php" method="POST">
    <label for="raio">Raio:</label>
        <input type="number" name="raio"><br>

        <input type="submit" value="Calcular">
        <input type="reset" value="Limpar"><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['raio'])){
                $raio = floatval($_POST['raio']);
          
                $erro = (empty($raio)) ?
                "O campo é obrigatórios" : (($raio < 0) ?
                "Por favor, insira valores válidos" : "");
                if($erro){
                    echo $erro;
                } else {
                        $circulo = 3.14 * pow($raio, 2);
                        echo "Resultado: $circulo";
                }
            } else{
                echo "Formulário não enviado corretamente";
            }
        }
    ?>
</body>
</html>