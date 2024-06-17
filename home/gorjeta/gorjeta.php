<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gorjeta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Calcular gorjeta</h1>
        <div class="tudo">
            <form action="gorjeta.php" method="POST">
                <label>Valor da conta(R$)</label>
                <input type="number" name="conta" step="0.01" required>
                <br><br>
                <label>Porcentagem da gorjeta(%)</label>
                <input type="number" name="porcentagem" step="1" required>
                <br><br>
                <input type="submit" value="Calcular" class="botao" id="btnCalc">
                <input type="reset" value="limpar" class="botao" id="btnLimp">
            </form>
            <div class="resposta">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['conta']) && isset($_POST['porcentagem'])) {
                        $conta = $_POST['conta'];
                        $porcentagem = $_POST['porcentagem'];
                        $erro = empty($conta) || empty($porcentagem) ?
                            "Todos os campos são obrigatórios" : ((!is_numeric($conta) || $conta <= 0 || $porcentagem <= 0) ?
                                "Por favor, insira valores válidos para a conta e porcentagem" : "");
                        if ($erro) {
                            echo $erro;
                        } else {
                            $gorjeta = (($porcentagem / 100) * $conta);
                            echo "A gorjeta é R$$gorjeta";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
