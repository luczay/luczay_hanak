<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szerelők</title>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-primary">Szerelők</h1>
            <a href="create_szerelo.php" class="btn btn-success">Új Szerelő</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Szerelő Neve</th>
                    <th>Kezdés Éve</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kovács Péter</td>
                    <td>2015</td>
                    <td>
                        <a href="modify_szerelo.php?id=1" class="btn btn-warning btn-sm">Szerkeszt</a>
                        <a href="delete_szerelo.php?id=1" class="btn btn-danger btn-sm">Töröl</a>
                    </td>
                </tr>
                <tr>
                    <td>Nagy Erika</td>
                    <td>2018</td>
                    <td>
                        <a href="modify_szerelo.php?id=2" class="btn btn-warning btn-sm">Szerkeszt</a>
                        <a href="delete_szerelo.php?id=2" class="btn btn-danger btn-sm">Töröl</a>
                    </td>
                </tr>
                <tr>
                    <td>Szabó Attila</td>
                    <td>2020</td>
                    <td>
                        <a href="modify_szerelo.php?id=3" class="btn btn-warning btn-sm">Szerkeszt</a>
                        <a href="delete_szerelo.php?id=3" class="btn btn-danger btn-sm">Töröl</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
