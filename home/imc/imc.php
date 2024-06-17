<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Calculadora IMC</h1>
        <div class="tudo">
            <form action="imc.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="string" id="nome" name="nome" required placeholder="Insira o nome" class="input">
                <br><br>
                <label for="anoNasc" class="anoNasc">Ano de nascimento:</label>
                <input type="number" id="anoNasc" name="anoNasc" step="1.0" required placeholder="Insira o ano de nascimento" class="input">
                <br><br>
                <label for="peso">Peso(kg):</label>
                <input type="number" id="peso" name="peso" step="0.1" required placeholder="Insira o peso" class="input">
                <br><br>
                <label for="altura">Altura(m):</label>
                <input type="number" id="altura" name="altura" step="0.01" required placeholder="Insira a altura" class="input">
                <br><br>
                <input type="submit" value="Calcular" class="botao" id="btnCalc">
                <input type="reset" value="Limpar" class="botao" id="btnLimp">
            </form>
            <div class="resposta">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['nome']) && isset($_POST['anoNasc'])) {
                        $peso = $_POST['peso'];
                        $altura = $_POST['altura'];
                        $nome = $_POST['nome'];
                        $anoNasc = $_POST['anoNasc'];

                        $erro = empty($peso) || empty($altura) || empty($nome) || empty($anoNasc) ? "todos ps campos são obrigatórios" : ((!is_numeric($altura) || $peso <= 0 || $altura <= 0 || $anoNasc <= 0) ?
                                "Por favor, insira valores válidos para o peso e altura" : "");
                        if ($erro) {
                            echo $erro;
                        } else {
                            $hoje = date('Y');
                            $idade = $hoje - $anoNasc;
                            $imc = $peso / ($altura * $altura);
                            $imc = number_format($imc, 2);
                            $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                            echo "Seu nome é: $nome<br>";
                            echo "Sua idade é: $idade<br>";
                            echo "Seu IMC é: $imc<br>";
                            echo "Classificação: $classificacao";
                        }
                    } else {
                        echo "Formulário não enviado corretamente";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>