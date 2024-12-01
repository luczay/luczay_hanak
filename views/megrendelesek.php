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
                        <th>Megrendelés Azonosítója</th>
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
                    <?php echo Megrendelesek::getTableRows(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
