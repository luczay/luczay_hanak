<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importálás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Importálás</h1>
        <hr>
        <form id="filter-form" class="mb-4" method="GET" action="import">
            <div class="row">
                <div class="col-md-4">
                    <label for="telepules" class="form-label">Település</label>
                    <input type="text" id="telepules" name="telepules" class="form-control" placeholder="Település">
                </div>
                <div class="col-md-4">
                    <label for="kezdev" class="form-label">Kezdés Éve (Szerelő)</label>
                    <input type="number" id="kezdev" name="kezdev" class="form-control" placeholder="Pl. 2010">
                </div>
                <div class="col-md-4">
                    <label for="bedatum" class="form-label">Bejelentés Dátuma</label>
                    <input type="date" id="bedatum" name="bedatum" class="form-control">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary w-100">Start</button>
            </div>
        </form>
    </div>
</body>
</html>
