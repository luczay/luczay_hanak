<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megrendelések</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-primary text-center mb-4">Megrendelések</h1>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Megrendelő Kereszt Neve</th>
                        <th>Megrendelő Vezeték Neve</th>
                        <th>Város</th>
                        <th>Utca</th>
                        <th>Leírás</th>
                        <th>Szerelő Neve</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>János</td>
                        <td>Kovács</td>
                        <td>Budapest</td>
                        <td>Fő utca 12</td>
                        <td>Csaptelep javítás</td>
                        <td>Kovács Péter</td>
                        <td>
                            <a href="edit_megrendeles.php?id=1" class="btn btn-sm btn-warning">Szerkeszt</a>
                            <a href="delete_megrendeles.php?id=1" class="btn btn-sm btn-danger">Töröl</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Éva</td>
                        <td>Nagy</td>
                        <td>Szeged</td>
                        <td>Kossuth Lajos utca 5</td>
                        <td>Kazán karbantartás</td>
                        <td>Szabó Attila</td>
                        <td>
                            <a href="edit_megrendeles.php?id=2" class="btn btn-sm btn-warning">Szerkeszt</a>
                            <a href="delete_megrendeles.php?id=2" class="btn btn-sm btn-danger">Töröl</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
