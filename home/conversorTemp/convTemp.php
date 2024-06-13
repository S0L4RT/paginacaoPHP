<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Coin</title>
</head>
<body>
    <form action="convTemp.php" method="POST">
        <input type="number" name="temp" required>
        <p>De</p>
        <select name="from_currency" id="from_currency" onchange="updateImage('from')">
            <option value="celsius">Celsius</option>
            <option value="fahreinheit">Fahreinheit</option>
        </select>
        <p>Para</p>
        <select name="to_currency" id="to_currency">
            <option value="celsius">Celsius</option>
            <option value="fahreinheit">Fahreinheit</option>
        </select>
        <input type="submit" value="Converter">
    </form>
    <div class="resposta">
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $temp = $_POST['temp'];
            $from_currency = $_POST['from_currency'];
            $to_currency = $_POST['to_currency'];
            $erro = empty($temp) ? "O campo deve ser preenchido" : ((!is_numeric($temp)) ? "Por favor, insira valores válidos para a temperatura" : "");
            if($erro){
                echo $erro;
            }else{
                $celsius = ($temp * 9.0/5.0) + 32;
                $fahreinheit = ($temp - 32) * 5.0/9.0;
                if($from_currency == "celsius" && $to_currency == "fahreinheit"){
                    echo "Fahreinheit: F°$celsius";
                }else if($from_currency == "fahreinheit" && $to_currency == "celsius"){
                    echo "Celsius: C°$fahreinheit";
                }
            };
        };
    ?>
    </div>
    <script>
        function updateImage(type) {
            var currencySelect = document.getElementById(type + '-currency');
            var currency = currencySelect.value;
            var imgElement = document.getElementById(type + '-img');

            if(currency === 'USD'){
                imgElement.src = 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg';
            }else if(currency === 'EUR'){
                imgElement.src = 'https://s5.static.brasilescola.uol.com.br/be/2022/03/bandeira-uniao-europeia.jpg';
            }else if(currency === 'BRL'){
                imgElement.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAbEP9_UogxxGxImR5hlQcg5fR73yIFlH3U0uBv3yGVeLFUJGrOb-glHEfy04&s=10';
            }
        }
    </script>
</body>
</html>