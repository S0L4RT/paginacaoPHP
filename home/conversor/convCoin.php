<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Coin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Conversor de moeda</h1>
        <div class="tudo">
            <form action="convCoin.php" method="POST">
                <input type="number" name="amount" required>
                <p>De</p>
                <select name="from_currency" id="from_currency" onchange="updateImage('from')">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="BRL">BRL</option>
                    <option value="KHR">KHR</option>
                </select>
                <br><br>
                <p>Para</p>
                <select name="to_currency" id="to_currency">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="BRL">BRL</option>
                    <option value="KHR">KHR</option>
                </select>
                <br><br>
                <input type="submit" value="Converter" class="botao" id="btnCalc">
                <input type="reset" value="Limpar" class="botao" id="btnLimp">
            </form>
            <div class="resposta">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $amount = $_POST['amount'];
                    $from_currency = $_POST['from_currency'];
                    $to_currency = $_POST['to_currency'];

                    // Exemplo de taxas de câmbio estáticas para demonstração
                    $exchange_rates = [
                        'USD' => ['EUR' => 0.85, 'BRL' => 5.0, 'KHR' => 4117.0],
                        'EUR' => ['USD' => 1.18, 'BRL' => 5.88, 'KHR' => 4421.86],
                        'BRL' => ['USD' => 0.20, 'EUR' => 0.17, 'KHR' => 767.18],
                        'KHR' => ['USD' => 0.00024, 'EUR' => 0.00023, 'BRL' => 0.0013],
                    ];

                    if (isset($exchange_rates[$from_currency][$to_currency])) {
                        $rate = $exchange_rates[$from_currency][$to_currency];
                        $converted_amount = $amount * $rate;
                        echo "Valor convertido: $converted_amount $to_currency";
                    } else {
                        echo "Conversão não disponível";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        function updateImage(type) {
            var currencySelect = document.getElementById(type + '-currency');
            var currency = currencySelect.value;
            var imgElement = document.getElementById(type + '-img');

            if (currency === 'USD') {
                imgElement.src = 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg';
            } else if (currency === 'EUR') {
                imgElement.src = 'https://s5.static.brasilescola.uol.com.br/be/2022/03/bandeira-uniao-europeia.jpg';
            } else if (currency === 'BRL') {
                imgElement.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAbEP9_UogxxGxImR5hlQcg5fR73yIFlH3U0uBv3yGVeLFUJGrOb-glHEfy04&s=10';
            } else if (crrunecy === 'KHR') {
                imgElement.src = 'https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_Cambodia.svg';
            }
        }
    </script>
</body>

</html>
