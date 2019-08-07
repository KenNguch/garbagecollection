
    <!DOCTYPE html>
    <html>
    <head>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/googlemap.js"></script>
        <style type="text/css">
            .container {
                height: 450px;
                
            }

            #map {
                width: 100%;
                height: 100%;
                border: 1px solid blue;
            }

            #data, #allData {
                display: none;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <?php
        require 'education.php';
        $edu = new education;
        $coll = $edu->getCollegesBlankLatLng();
        $coll = json_encode($coll, true);
        echo '<div id="data">' . $coll . '</div>';

        $allData = $edu->getAllColleges();
        $allData = json_encode($allData, true);
        echo '<div id="allData">' . $allData . '</div>';
        ?>
        <div id="map"></div>
    </div>
    </body>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1bF3Ry-gVyKmSVse4s1zmfnyd4_9b3F8&callback=loadMap">
    </script>
    </html>
<?php
if (!$footerCode) {
    include_once("$currDir/footer.php");
} else {
    ob_start();
    include_once("footer.php");
    $dFooter = ob_get_contents();
    ob_end_clean();
    echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
}
?>