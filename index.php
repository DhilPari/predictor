<!DOCTYPE html>

<html>
    <head>
        <title>THE PREDICTOR</title>

        <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <style>
            h1{
                text-align: center;
            }
            h2{
                text-align: center;
            }
        </style>
    </head>
    <body style="background-color:#000000;">
        <br>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6" style="background-color:#ffffff;">
                        <h2>WELCOME TO</h2>
                        <h1>SCORE PREDICTOR</h1>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="container">
            <center>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6" style="background-color:#ffffff;">
                        <br>
                        <form method="post">
                        <label for="col1">NILAI 1-></label>
                                <input type="number" id="col1" name="col1" required>
                                <select name="presentase1" id="presentase1">
                                    <option value="">PRESENTASE</option>
                                    <option value="0.25">25%</option>
                                    <option value="0.5">50%</option>
                                </select>
                                <br>
                            <label for="col2">NILAI 2-></label>
                                <input type="number" id="col2" name="col2" required>
                                <select name="presentase2" id="presentase2">
                                    <option value="">PRESENTASE</option>
                                    <option value="0.25">25%</option>
                                    <option value="0.5">50%</option>
                                </select>
                                <br>
                                <label for="minLulus">NILAI MINIMAL-></label>
                                <input type="number" id="minLulus" name="minLulus" required>
                                <br>
                                <label for="colJ">PRESENTASE HASIL-></label>
                                <select name="presentaseJ" id="presentaseJ">
                                    <option value="">PRESENTASE HASIL</option>
                                    <option value="0.25">25%</option>
                                    <option value="0.5">50%</option>
                                </select>
                                <input type="submit" value="TOTAL">
                        </form>
                        <br>

                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $col1 = $_POST["col1"];
                                $col2 = $_POST["col2"];
                                $minLulus = $_POST["minLulus"];
                                $nilai1 = null;
                                $nilai2 = null;
                                $total = null;

                                switch ($_POST["presentase1"]) {
                                    case '0.25':
                                            $nilai1 = $col1 * 0.25;
                                        break;
                                    case '0.5' :
                                            $nilai1 = $col1 * 0.5;
                                        break;
                                    
                                    default:
                                        echo "<br>";
                                        echo "Tidak memilih presentase Nilai 1!!";
                                        break;
                                }
                                
                                switch ($_POST["presentase2"]) {
                                    case '0.25':
                                            $nilai2 = $col2 * 0.25;
                                        break;
                                    case '0.5' :
                                            $nilai2 = $col2 * 0.5;
                                        break;
                                    
                                    default:
                                        echo "<br>";
                                        echo "Tidak memilih presentase Nilai 2!!";
                                        break;
                                }

                                $hasilfinal = $nilai1 + $nilai2;

                                switch ($_POST["presentaseJ"]) {
                                    case '0.25':
                                        $total = ($minLulus - $hasilfinal) / 0.25;
                                        break;
                                    case '0.5':
                                        $total = ($minLulus - ($hasilfinal)) / 0.25;
                                        break;
                                    default:
                                        echo "<br>";
                                        echo "Tidak memilih presentase Hasil!!";
                                        break;
                                }

                                // echo $nilai1;
                                // echo "<br>";
                                // echo $nilai2;
                                // echo "<br>";
                                // echo $minLulus;
                                // echo "<br>";
                                // echo $hasilfinal;
                                // echo "<br>";
                                // echo $total;

                                if($hasilfinal >= $minLulus){
                                    echo "<h3>Nilai minimal $minLulus <br> Total nilai input $hasilfinal <br> Anda Lulus</h3>";
                                }else{
                                    if($hasilfinal < $minLulus){
                                        echo "<h3>Nilai minimal $minLulus <br> Total nilai input $hasilfinal <br> Anda belum bisa lulus <br> Nilai anda masih kurang <br> $total</h3>";
                                    } 
                                }
                                
                            }
                        ?>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </center>
            </div>
        </div>
        <?php

        ?>
    </body>
</html>