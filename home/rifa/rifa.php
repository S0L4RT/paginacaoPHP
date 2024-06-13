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
    <h1>Rifa</h1>
    <form action="rifa.php" method="POST">
        <label for="premio">Prêmio:</label>
        <input type="text" name="premio">

        <label for="valor">Valor:</label>
        <input type="text" name="valor">

        <label for="quantNum">Quantidade:</label>
        <input type="text" name="quantNum">
        
        <input type="submit" value="Calcular">
        <input type="reset" value="Limpar"><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['premio']) || isset($_POST['valor']) || isset($_POST['quantNum'])){
            $premio = $_POST['premio'];
            $valor = $_POST['valor'];
            $quantNum = $_POST['quantNum'];
      
            $erro = (empty($premio) || empty($valor) || empty($quantNum)) ?
            "O campo é obrigatórios" : (($valor < 0 || $quantNum < 0) ?
            "Por favor, insira valores válidos" : "");
            if($erro){
                echo $erro;
            } else {
                for($i=1; $i<=$quantNum; $i++){
                    echo"<center><table>
                        <tr class='esquerdo'>
                            <td class='esq'>
                                <p>Número: $i<br></p>
                                <p>Valor: R$$valor,00<br></p>
                                <p>Nome:....................<br></p>
                                <p>Telefone:................<br></p>
                            </td>
                            <td class='mei'>
                                <p>Friends Action<br></p>
                                <p>Número: $i<br></p>
                                <p>Prêmio: $premio<br></p>
                            </td>
                            <td class=''dir>
                                <img src='unoConversivel.jpg'>
                            </td>
                        </tr>
                    </table></center>";
                }
            }
        } else{
            echo "Formulário não enviado corretamente";
        }
    }   
    ?>
    </div>
</body>
</html>