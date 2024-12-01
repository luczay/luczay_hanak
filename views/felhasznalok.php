<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-primary text-center mb-4">Felhasználók</h1>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Felhasználó Azonosítója</th>
                        <th>Felhasználó Kereszt Neve</th>
                        <th>Felhasználó Vezeték Neve</th>
                        <th>Admin</th>
                        <th>Felhasználónév</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo Felhasznalok::getTableRows(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
