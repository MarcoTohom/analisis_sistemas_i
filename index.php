<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET["data"])) {
        $hoy = new DateTime();
        $hoy = $hoy->format(DATE_RFC2822);
        $txt = password_hash($hoy, PASSWORD_DEFAULT);
        $myfile = fopen("data.txt", "a") or die("Unable to open file!");
        fwrite($myfile, $txt . "-" . $_GET["data"] . "\n");
        fclose($myfile);
    }
    ?>
    <div class="container">
        <h1>Tarea 1</h1>
        <div class="col">
            <div class="col-6">
                <p>Ingrese un número</p>
            </div>
            <form method="GET" action="index.php">
                <div class="col-6">
                    <input type="number" id="input-text" name="data">
                </div>
                </br>
                <div class="col-6">
                    <input type="submit" value="Calculate">
                </div>
            </form>
            <p id="text"></p>
        </div>
    </div>
    <script type="application/javascript">
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const numero = urlParams.get('data');
        calculate();

        function calculate() {
            const text = document.getElementById("text");
            text.innerText = "";
            let summation = 0;
            let empty = true;
            let data = "";
            if (numero != null) {
                for (let i = 0; i < numero; i++) {
                    if (isPrimeNumber(i + 1)) {
                        if (empty) {
                            empty = false;
                        }
                        if (!empty) text.innerText = text.textContent + " " + (i + 1);
                        summation = summation + i + 1;
                    }
                }
                text.innerText = text.textContent + " = " + summation;
                data = text.textContent + " = " + summation;
            }
        }

        function isPrimeNumber(numero) {
            for (let i = 2, raiz = Math.sqrt(numero); i <= raiz; i++)
                if (numero % i === 0) return false;
            return numero > 1;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>