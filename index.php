<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GIS Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet-providers@1.5.0/leaflet-providers.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMtyylv3MOWeY5NykbaT1Ff5h6w4Ih3kq3FLR/7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMtyylv3MOWeY5NykbaT1Ff5h6w4Ih3kq3FLR/7" crossorigin="anonymous">

    <link rel="stylesheet" href="css/indexx.css">
</head>
<body>
<style>
/* Map Container */
.map-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
    background: linear-gradient(to right, #f8f9fa, #e2e6ea); /* Subtle gradient background */
    padding: 20px;
    overflow: hidden; /* Ensure no overflow */
}

/* Map Element */
#map {
    width: 100%;
    max-width: 1200px; /* Maximum width for the map */
    height: 600px; /* Fixed height for the map */
    border: 3px solid #007bff; /* Blue border with more thickness */
    border-radius: 20px; /* More rounded corners */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25); /* Enhanced shadow effect */
    margin: 0 auto; /* Center the map horizontally */
    background-color: #fff; /* White background for map */
    position: relative;
    overflow: hidden; /* Ensure no overflow */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth scale and shadow transition */
}

/* Hover effect for the map */
#map:hover {
    transform: scale(1.03); /* Slight zoom effect on hover */
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3); /* More pronounced shadow on hover */
}

/* Map Loading Spinner */
#map.loading::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 5px solid rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    border-top: 5px solid #007bff;
    width: 60px; /* Larger spinner */
    height: 60px; /* Larger spinner */
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Map Header Text */
.map-header {
    position: absolute;
    top: 20px;
    left: 20px;
    background: rgba(0, 0, 0, 0.6); /* Darker semi-transparent background */
    color: #fff; /* White text color */
    padding: 12px 20px; /* Padding for header */
    border-radius: 8px; /* More rounded corners for header */
    font-size: 20px; /* Larger font size */
    font-weight: bold;
    z-index: 10; /* Ensure header is above the map */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); /* Shadow effect for header */
}

/* Map Info Overlay */
.map-info-overlay {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: rgba(0, 0, 0, 0.6); /* Dark semi-transparent background */
    color: #fff; /* White text color */
    padding: 15px;
    border-radius: 8px; /* Rounded corners for info overlay */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); /* Shadow effect for info overlay */
    font-size: 16px; /* Font size for overlay text */
    max-width: 300px; /* Limit overlay width */
    line-height: 1.5; /* Line height for readability */
}


</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">GIS Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="halaman_admin.php">Halaman Admin </a>
                <li class="nav-item">
                    <a class="nav-link" href="halaman_petugas.php">Halaman Petugas</a>
                </li>
            </ul>
        </div>
    
    </div>
</nav>

        <div id="map"></div>

        
    
    <script>
       var map = L.map('map').setView([-1.8104143125690726, 100.99281750200439], 12);

            // Tambahkan layer peta dasar (misalnya OpenStreetMap)
            var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 25,
                attribution: '© OpenStreetMap contributors'
            });

            // Tambahkan layer peta satelit
            var satelliteLayer = L.tileLayer.provider('Esri.WorldImagery', {
                maxZoom: 19,
                attribution: '© Esri & the GIS User Community'
            });

            // Tambahkan layer peta jalan (map theme lainnya)
            var streetsLayer = L.tileLayer.provider('OpenStreetMap.Mapnik', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            });

            // Tambahkan layer peta dark mode
            var darkLayer = L.tileLayer.provider('CartoDB.DarkMatter', {
                maxZoom: 19,
                attribution: '© CartoDB'
            });

            // Kontrol layer
            var baseMaps = {
                "OpenStreetMap": osmLayer,
                "Satellite": satelliteLayer,
                "Streets": streetsLayer,
                "Dark Mode": darkLayer
            };

            // Default layer
            osmLayer.addTo(map);

            L.control.layers(baseMaps).addTo(map);


// Data GeoJSON untuk batas kecamatan Linggo Sari Baganti
var linggoSariBagantiGeoJSON = {
    "type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        // Longitude, Latitude
                        [100.83039273813128, -1.8672641466402562],
                        [100.83593954643644, -1.8752099745001714],
                        [100.83673348031378, -1.8765181910168705],
                        [100.83803287860579, -1.8767443993228115],
                        [100.8380783972027, -1.8769870349268718],
                        [100.83736527251787, -1.8772448352192859],
                        [100.83730458105002, -1.8773282412198364],
                        [100.83723630315467, -1.8775329649446015],
                        [100.83725906245311, -1.8778362593075983],
                        [100.8680766277551, -1.9440115076595423],
                        [100.86850905442373, -1.9463619465812456],
                        [100.86842560366273, -1.9470670776113344],
                        [100.8684635358268, -1.9472642109648324],
                        [100.86856215945345, -1.9473021212224773],
                        [100.86873664740824, -1.9472945391710195],
                        [100.86884285746768, -1.9470670776113344],
                        [100.86881251173641, -1.9448758630146035],
                        [100.86907803688501, -1.944845534764919],
                        [100.86932459595161, -1.9450123401314465],
                        [100.86940046027976, -1.9451829365119604],
                        [100.86938528741415, -1.9455847856956798],
                        [100.86922597232497, -1.946043500212904],
                        [100.8691539012132, -1.9464074389146604],
                        [100.86915390121123, -1.9469002724692395],
                        [100.86924873162145, -1.9471163609730477],
                        [100.86932459595077, -1.9478707750362476],
                        [100.86921838589133, -1.9488564411028837],
                        [100.86899079290907, -1.9495236609049023],
                        [100.86864181699988, -1.950061985765793],
                        [100.86871009489525, -1.95032735711048],
                        [100.86927907734825, -1.9510988293053937],
                        [100.86970202097467, -1.952122403648978],
                        [100.86985374963102, -1.9522873127874931],
                        [100.86987271571178, -1.9524389533656195],
                        [100.86977978190977, -1.9525432062515262],
                        [100.86963753629443, -1.9525128781399288],
                        [100.86946684155606, -1.952311954386775],
                        [100.8690628640114, -1.9510249044829944],
                        [100.86882768459407, -1.9507671152841897],
                        [100.86863802377364, -1.950865681747218],
                        [100.86859250517674, -1.9510931427937017],
                        [100.8688580303454, -1.973573724208075],
                        [100.86806904133239, -1.9756511723993542],
                        [100.86721936085686, -1.9762880538063423],
                        [100.86706763220053, -1.9768187881255774],
                        [100.86714349652868, -1.9776982903381028],
                        [100.86920700625498, -1.9825355442838721],
                        [100.86805386846676, -1.982838819915514],
                        [100.86605863663583, -1.980329212391673],
                        [100.86571724715905, -1.9803140485884294],
                        [100.8655655185027, -1.9805035961189807],
                        [100.86546689487608, -1.9808447816193235],
                        [100.86561103709961, -1.9815574799933235],
                        [100.8678663326731, -1.9865794798489114],
                        [100.87317399693475, -1.985533886074392],
                        [100.8765678398991, -1.9807904523329252],
                        [100.87636369896593, -1.9805354286296983],
                        [100.8748326419674, -1.9811219830884186],
                        [100.87457746580098, -1.9806629404862162],
                        [100.87471462299169, -1.9798659911975944],
                        [100.87510376663994, -1.9794005726310704],
                        [100.87521859591426, -1.9781637062497925],
                        [100.8755375661223, -1.977857677316349],
                        [100.87615955802796, -1.9781286404373624],
                        [100.87616274773004, -1.9785558057382533],
                        [100.8759267097755, -1.9791582999073456],
                        [100.87592033037082, -1.9791710511084435],
                        [100.87589314553121, -1.9795920218104313],
                        [100.87663769340696, -1.97990803880284],
                        [100.87730556345355, -1.979946237462064],
                        [100.87765880929275, -1.9798267484629395],
                        [100.87769770132407, -1.97947223803428],
                        [100.8776943485629, -1.9765135138267074],
                        [100.87800280260156, -1.9759961553908194],
                        [100.87867871927531, -1.9759532655619212],
                        [100.87922320771146, -1.9760765738052155],
                        [100.87969795869687, -1.9766636281623382],
                        [100.88016198086166, -1.9774919373532867],
                        [100.88066891837117, -1.9775669944763707],
                        [100.88129923748305, -1.9765858903815883],
                        [100.88193492102673, -1.9766207383510348],
                        [100.88201270508705, -1.9773284200479675],
                        [100.88170156883602, -1.9780816718223557],
                        [100.88228629040786, -1.9784006644586483],
                        [100.88252232479807, -1.97784577805401],
                        [100.88276372361057, -1.9768566322773269],
                        [100.8827583591925, -1.9766689893829148],
                        [100.88295416045277, -1.9763848443881664],
                        [100.88320897030637, -1.9754546712577123],
                        [100.88569806026734, -1.974567387475473],
                        [100.8893271491613, -1.976566796689255],
                        [100.89688024955285, -1.9792795749575747],
                        [100.90340338195043, -1.9763630701165487],
                        [100.91121397468964, -1.9788506775084114],
                        [100.92005453570216, -1.9746474766400446],
                        [100.92159948811212, -1.9674419647160886],
                        [100.92743597499417, -1.9682139853417304],
                        [100.93052587950136, -1.9707016047533672],
                        [100.93183479755267, -1.950178632023234],
                        [100.93009672609148, -1.946082585565075],
                        [100.9301396414362, -1.9433590308407251],
                        [100.93080482925937, -1.939884883647877],
                        [100.932371239319, -1.9366251835512684],
                        [100.93503199069168, -1.9349095494457735],
                        [100.93870125262578, -1.9338587226209882],
                        [100.95485887963322, -1.9230287355253903],
                        [100.97009382700918, -1.9232003002122784],
                        [100.98322592230987, -1.9127348227467293],
                        [100.99850378503054, -1.889230157706601],
                        [101.02528295948194, -1.8821958517811814],
                        [101.05583868481901, -1.8643526098214063],
                        [101.05980835425277, -1.8555381529064912],
                        [101.07422791007902, -1.8510772918763567],
                        [101.08736000529044, -1.8539940099372776],
                        [101.10804520106365, -1.8531361518377545],
                        [101.1094184920947, -1.8515920068119687],
                        [101.109032253984, -1.8488039636594815],
                        [101.10963306881011, -1.8468308844024353],
                        [101.11469707943989, -1.8415979243338874],
                        [101.11499748684572, -1.8255986972802154],
                        [101.11830196836995, -1.8182638832979752],
                        [101.11834488371467, -1.817963627125195],
                        [101.11542664027365, -1.8054386109534268],
                        [101.10358200513066, -1.7930850858023333],
                        [101.10838852364674, -1.7790156908043673],
                        [101.10650024847902, -1.7759272728376294],
                        [101.09276733823008, -1.763573549093185],
                        [101.09070740168347, -1.7529355548754049],
                        [101.09105072440457, -1.752592392496338],
                        [101.13139114826657, -1.7066081050778605],
                        [101.13156280964546, -1.684988245064296],
                        [101.10495529610188, -1.6698885168768143],
                        [101.0949989361266, -1.670574870642001],
                        [101.06615982447411, -1.6578772872726995],
                        [101.05723343325288, -1.6770952198378903],
                        [101.05002365540396, -1.6853314188299773],
                        [101.04380093041942, -1.6873475664076198],
                        [101.04388676110885, -1.6871330827220503],
                        [101.03766403619429, -1.6931386170689555],
                        [101.03418789327188, -1.6971279973932185],
                        [101.03131256517557, -1.6987151679229608],
                        [101.02702103085842, -1.6991012363155473],
                        [101.01208649103935, -1.7056643858517906],
                        [101.00882492486474, -1.710168495193177],
                        [101.0078378719453, -1.7135572943089143],
                        [101.00509128988317, -1.7176324244290129],
                        [101.00693664969167, -1.7232946962052442],
                        [101.00629291952278, -1.7267263678368612],
                        [101.00178680838692, -1.7341902323184741],
                        [100.99225960194474, -1.7434127826483385],
                        [100.97513638041666, -1.7469731055545907],
                        [100.97110233804761, -1.7534074035322051],
                        [100.96200428498511, -1.756238487822233],
                        [100.9578844118919, -1.755981116698461],
                        [100.94964466570546, -1.758469036076212],
                        [100.94629726881723, -1.7627585444533242],
                        [100.93282185080555, -1.767562782207828],
                        [100.92792950150736, -1.767991731393802],
                        [100.91762981877434, -1.773310693056886],
                        [100.91728649621736, -1.7733964827777158],
                        [100.90157948016729, -1.7980179272326136],
                        [100.88913403028604, -1.808655661402009],
                        [100.88166676042911, -1.8113150853285298],
                        [100.86707554322398, -1.8199796324225435],
                        [100.8607240724495, -1.833705562918314],
                        [100.8613248872756, -1.8372228155420383],
                        [100.85973701952092, -1.8431420787053767],
                        [100.85342846384694, -1.8503481116416818],
                        [100.8371635485008, -1.862787028457976],
                        [100.83467445850698, -1.8651461234154227]

                    ]
                ]
            },
            "properties": {
                "name": "Kecamatan Linggo Sari Baganti"
            }
        }
    ]
};

// Tambahkan batas kecamatan dengan warna kuning dan keterangan
L.geoJSON(linggoSariBagantiGeoJSON, {
    style: function (feature) {
        return {
            color: 'yellow',
            weight: 3,
            opacity: 0.7,
            fillOpacity: 0.3
        };
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties && feature.properties.name) {
            layer.bindPopup(feature.properties.name);
        }
    }
}).addTo(map);

        var lokasiIcon = L.icon({
            iconUrl: 'lokasi_icon.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk1Icon = L.icon({
            iconUrl: './img/1.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk2Icon = L.icon({
            iconUrl: './img/2.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk3Icon = L.icon({
            iconUrl: './img/3.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk4Icon = L.icon({
            iconUrl: './img/4.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk5Icon = L.icon({
            iconUrl: './img/5.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk6Icon = L.icon({
            iconUrl: './img/6.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk7Icon = L.icon({
            iconUrl: './img/7.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk8Icon = L.icon({
            iconUrl: './img/8.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk9Icon = L.icon({
            iconUrl: './img/9.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk10Icon = L.icon({
            iconUrl: './img/10.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk11Icon = L.icon({
            iconUrl: './img/11.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk12Icon = L.icon({
            iconUrl: './img/12.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk13Icon = L.icon({
            iconUrl: './img/13.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk14Icon = L.icon({
            iconUrl: './img/14.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk15Icon = L.icon({
            iconUrl: './img/15.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var penduduk16Icon = L.icon({
            iconUrl: './img/16.png',
            iconSize: [20, 20],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });



        <?php
        include('koneksi.php');

        $query = mysqli_query($db, "SELECT * FROM lokasi");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
        ?>
                L.marker([<?= $row['lat'] ?>, <?= $row['ing'] ?>], { icon: lokasiIcon }).addTo(map)
                    .bindPopup("<h4><?= $row['nama'] ?></h4><p><?= $row['des'] ?></p>");
            <?php } ?>
        <?php } ?>

        // air haji
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_air_haji");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk1Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //air haji barat
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_air_haji_barat");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk2Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

         //air haji tengah
         <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_air_haji_tengah");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk3Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //air haji tenggara
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_air_haji_tenggara");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk4Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //lagan hilir
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_lagan_hilir");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk5Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //lagan mudik
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_lagan_mudik");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk6Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //muara gadang
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_muara_gadang");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk7Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //muara kandis
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_muara_kandis");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk8Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //padang xi
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_padang_xi");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk9Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //pasar bukit
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_pasar_bukit");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk10Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //pasar lama
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_pasar_lama");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk11Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //pungasan timur
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_pungasan_timur");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk12Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //punggasan
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_punggasan");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk13Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //punggasan utara
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_punggasan_utara");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk14Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //rantau simalenang
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_rantau_simalenang");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk15Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

        //sungai sirah
        <?php
        $query = mysqli_query($db, "SELECT * FROM penduduk_sungai_sirah");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng], { icon: penduduk16Icon }).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>

    </script>
</body>
</html>
