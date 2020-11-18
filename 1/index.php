<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .card {
            width: 640;
            display: inline-block;
        }
    </style>
    <title>Pre-Final Webtech 2020/1</title>
</head>
<body>
    <?php
        $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";    
        $response = file_get_contents($url);
        $result = json_decode($response);
        $tracks = $result->tracks;
        $items = $tracks->items;
        
        echo "<div class='container-fluid'>";
        foreach ($items as $item) {
            $album = $item->album;
            $artists = $album->artists;
            $available_markets = $album->available_markets;
            $count = 0;
            echo "<div class='card m-3 mt-4 mb-4'><div class='card-header p-0'><img src='";
            foreach ($album->images as $image)
                if ($image->height == 640) echo "$image->url'></div>";
            echo "<div class='card-body'><h2>$album->name</h2><p>Artist: ";
            foreach ($artists as $artist) echo "$artist->name</p><p>Releasa date: $album->release_date</p><p>Avaliable: ";
            foreach ($available_markets as $available_market) $count++;
            echo "$count countries</p></div></div>";
        } echo "</div>";
    ?>
</body>
</html>