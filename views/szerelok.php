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
            <a href="uj_szerelo" class="btn btn-success">Új Szerelő</a>
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
                <?php echo Szerelok::getSzerelokInTable(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
