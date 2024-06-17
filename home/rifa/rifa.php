<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="rifa.php" method="POST">
            <h1>Rifa Digital</h1>
            <label for="premio">Insira um prêmio:</label>
            <input type="text" name="premio">

            <label for="valor">Insira o valor da rifa:</label>
            <input type="number" name="valor">
            <br><br>
            <label for="quantNum">Inisra a quantidade de números:</label>
            <input type="number" name="quantNum">

            <label for="img">Insira o link de uma imagem:</label>
            <input type="url" name="img">
            <br><br>
            <input type="submit" value="Criar" class="botao">
            <input type="reset" value="Limpar" class="botao"><br>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['premio']) || isset($_POST['valor']) || isset($_POST['quantNum'])) {
                $premio = $_POST['premio'];
                $valor = $_POST['valor'];
                $quantNum = $_POST['quantNum'];
                $img = $_POST['img'];

                $erro = (empty($premio) || empty($valor) || empty($quantNum)) ?
                    "O campo é obrigatórios" : (($valor < 0 || $quantNum < 0) ?
                        "Por favor, insira valores válidos" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    for ($i = 1; $i <= $quantNum; $i++) {
                        $iFormat = str_pad($i, 4, '0', STR_PAD_LEFT);
                        echo "<center><table>
                        <tr class='esquerdo'>
                            <td class='esq'>
                                <p>Número: $iFormat<br></p>
                                <p>Valor: R$$valor<br></p>
                                <p>Nome:....................<br></p>
                                <p>Telefone:................<br></p>
                            </td>
                            <td class='mei'>
                                <p>Friends Action<br></p>
                                <p>Número: $iFormat<br></p>
                                <p>Prêmio: $premio<br></p>
                            </td>
                            <td class='dir'>
                                <img src='$img'>
                            </td>
                        </tr>
                        <img class='gif' src='https://i.gifer.com/origin/f5/f5baef4b6b6677020ab8d091ef78a3bc_w200.gif' alt='gif'>
                    </table></center>";
                    }
                }
            } else {
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>
</body>

</html>
