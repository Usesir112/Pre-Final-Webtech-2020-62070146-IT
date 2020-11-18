<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="container">

    <div>
        <form class=" m-3" action="index.php" method="GET">
            <div class="form-group">
                <label for="search">ระบุคำค้นหา</label>
                <input class="form-control" name="key">
                <button name="submit" class="btn btn-success mt-2">ค้นหา</button>
            </div>
        </form>
    </div>
    <div style="display: flex; flex-wrap: wrap;">

    <?php 
    
        $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";

        $response = file_get_contents($url);
        $result = json_decode($response);

        foreach ($result->tracks->items as $box){
            
            $img = $box->album->images[0]->url;

            $song_name = $box->album->name;

            foreach ($box->artists as $aname){
                $artists = $aname->name;
            }

            $release_date = $box->album->release_date;

            $num = count($box->available_markets);

            echo "<div class='card' style='width: 25%; margin: 2rem;'>
            <img class='card-img-top' style='padding: 1rem;' src='$img'>
            <div class='card-body'>
            <h5 class='card-title'>$song_name</h5>
            <p class='card-text'>Artist: $artists</p>
            <p class='card-text'>Release date: $release_date</p>
            <p class='card-text'>Available: $num countries</p>
            </div>
            </div>
            ";

            if (isset($_GET['submit'])){
                $find = $_GET['key'];
            }
        }

    ?>

    </div>
</body>
</html>