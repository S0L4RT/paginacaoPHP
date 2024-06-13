<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gorjeta</title>
</head>
<body>
    <form action="gorjeta.php" method="POST">
    <label>Valor da conta(R$)</label><br>
    <input type="number" name="conta" step="0.01" required><br>
    <label>Porcentagem da gorjeta(%)</label><br>
    <input type="number" name="porcentagem" step="1" required><br>
    <input type="submit" value="Calcular"><br>
    <input type="reset" value="limpar"><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['conta']) && isset($_POST['porcentagem'])){
                $conta = $_POST['conta'];
                $porcentagem = $_POST['porcentagem'];
                $erro = empty($conta) || empty($porcentagem) ?
                "Todos os campos são obrigatórios" :
                ((!is_numeric($conta) || $conta <= 0 || $porcentagem <= 0) ?
                "Por favor, insira valores válidos para a conta e porcentagem" : "");
                if($erro){
                    echo $erro;
                }else{
                    $gorjeta = (($porcentagem / 100) * $conta);
                    echo "A gorjeta é R$$gorjeta";
                }
            }
        }
    ?>
</body>
</html>