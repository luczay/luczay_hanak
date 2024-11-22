<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vízvezeték Szerelő Foglaló</title>
    <style>
        .hero {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 3rem 1rem;
        }
        .card img {
            height: 150px;
            object-fit: cover;
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <header class="hero">
        <h1>Üdvözöljük a Vízvezeték-szerelő Foglaló Weboldalon!</h1>
        <p>Professzionális vízvezeték-szerelési szolgáltatások Magyarországon.</p>
    </header>

    <div class="container my-5" id="about">
        <h2 class="text-center mb-4">Rólunk</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?php echo SITE_ROOT?>static/about_image.jpg" class="img-fluid rounded" alt="Rólunk kép">
            </div>
            <div class="col-md-6">
                <p>
                    Több mint <strong>10 éve</strong> foglalkozunk vízvezeték-szereléssel, hogy ügyfeleink otthonát és vállalkozását
                    zavartalanul működő vízhálózattal lássuk el. Célunk, hogy megbízható, gyors és precíz szolgáltatásokat nyújtsunk,
                    legyen szó akár apró javításokról, akár teljes vízhálózat kiépítéséről.
                </p>
                <p>
                    Szakképzett csapatunk és korszerű eszközeink biztosítják a legjobb eredményeket. Büszkék vagyunk arra,
                    hogy ügyfeleink elégedettsége a legfontosabb számunkra. Hívjon minket bizalommal, ha professzionális
                    vízvezeték-szerelőkre van szüksége!
                </p>
            </div>
        </div>
    </div>

    <div class="container my-5" id="services">
        <h2 class="text-center mb-4">Szolgáltatásaink</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="<?php echo SITE_ROOT?>static/csotores_image.jpg" class="card-img-top" alt="Szolgáltatás 1">
                    <div class="card-body">
                        <h5 class="card-title">Csőtörés javítás</h5>
                        <p class="card-text">Gyors és hatékony megoldás csőtörések és szivárgások kezelésére.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo SITE_ROOT?>static/csaptelep_csere_image.jpg" class="card-img-top" alt="Szolgáltatás 2">
                    <div class="card-body">
                        <h5 class="card-title">Csaptelep csere</h5>
                        <p class="card-text">Bízza ránk a csaptelepek gyors és precíz cseréjét.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo SITE_ROOT?>static/vizhalozat_image.jpg" class="card-img-top" alt="Szolgáltatás 3">
                    <div class="card-body">
                        <h5 class="card-title">Teljes vízhálózat kiépítés</h5>
                        <p class="card-text">Teljes körű vízhálózat kiépítési szolgáltatás az Ön otthonában.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Vízvezeték Szerelő Foglaló. Minden jog fenntartva.</p>
    </footer>

</body>
</html>
