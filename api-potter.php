<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>API2233</title>
</head>
<body>
<style>
body{background-color:#FCF3CF }
</style>  
<img src="" alt="">
    <form action="">
        <input type="text" name="house" id="house" min="0" max="99">
        <input type="submit" name="aplicar" value="aplicar"><br><br>
    </form>
    <hr>
    <br>
    <?php
        if (isset($_GET["aplicar"])) {
            $nombre_casa = $_GET["house"]; 
            $ficha="http://hp-api.herokuapp.com/api/characters";
            $ch = curl_init($ficha);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response_json = curl_exec($ch);
            curl_close($ch);
            $res=json_decode($response_json, true);
     
            potter($res, $nombre_casa);
        }

        function potter($res, $nombre_casa){ 
            foreach ($res as $v) {
                $house = $v["house"];
                $name = $v["name"];
                $image = $v["image"];
                $actor = $v["actor"];

                if ($house == $nombre_casa){ 
                    echo 
                    "<div class='container'>
                    <div class='col-md-12' style='display:flex; flex-direction:row; justify-content:space-around'>
                    <div class='card' style='width: 18rem;'>
                    <img src=$image class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$house</h5>
                        <p class='card-text'> - Name: $name <br> - Actor: $actor</p>
                        <a href='#' class='btn btn-primary'>$name</a>
                    </div>
                    </div>
                    </div>
                    </div><br><br>
                    ";
                }
            } 
        }
          
    ?>
</body>
</html>