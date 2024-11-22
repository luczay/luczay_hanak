<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Szerelő Létrehozása</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-primary text-center mb-4">Új Szerelő Létrehozása</h1>

        <form action="uj_szerelo_letrehozasa" method="POST" class="border p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="nev" class="form-label">Szerelő Név</label>
                <input type="text" class="form-control" id="nev" name="nev" placeholder="Írd be a szerelő nevét" required>
            </div>

            <div class="mb-3">
                <label for="kezdev" class="form-label">Kezdés Éve</label>
                <input type="number" class="form-control" id="kezdev" name="kezdev" placeholder="Írd be a kezdés évét (pl. 2020)" min="1900" max="2100" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Létrehoz</button>
                <a href="szerelok" class="btn btn-secondary">Vissza a listához</a>
            </div>
        </form>
    </div>
</body>
</html>
