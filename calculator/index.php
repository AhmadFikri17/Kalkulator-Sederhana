<?php 
    $result = '';
    if(isset($_POST["calculate"])){
        $num1 = htmlspecialchars($_POST["num1"]);
        $num2 = htmlspecialchars($_POST["num2"]);
        $operator = $_POST["operator"];

        //  Validasi
        if(is_numeric($_POST["num1"]) && is_numeric($_POST["num2"])){
            switch($operator){
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "substrac":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "devide":
                    if($num2 != 0){
                        $result = $num1 / $num2;
                    }else{
                        $result = "Error: Pembagian dengan nol tidak di perbolehkan";
                    }
                    break;
            }
        }else{
            $result = "Error angka tidak valid";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator-container">
        <h1>Kalkulator Sederhana</h1>

        <form action="index.php" class="calculator-form" method="post">
            <input type="text" name="num1" id="num1" placeholder="Angka pertama" value="<?= isset($_POST["num1"]) ? $_POST["num1"] : '' ?>"required>
            <input type="text" name="num2" id="num2" placeholder="Angka kedua" value="<?= isset($_POST["num2"]) ? $_POST["num2"] : '' ?>" required>
            
            <select name="operator" class="operator" id="operator">
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'add' ? "selected": ""?>value="add">Tambah</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'substrac' ? "selected": ""?>value="substrac">Kurang</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'multiply' ? "selected": ""?> value="multiply">Kali</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'devide' ? "selected": ""?> value="devide">Bagi</option>
            </select>
            <button type="submit" name="calculate" class="calc-btn">Hitung</button>
        </form>
        <div class="result">Result : <?php echo htmlspecialchars($result)?></div>
    </div>
</body>
</html>