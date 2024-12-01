<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználó Regisztráció</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Regisztráció</h2>
    <form action="regisztral" method="POST">
        <div class="mb-3">
            <label for="felhasznalonev" class="form-label">Felhasználónév</label>
            <input type="text" id="felhasznalonev" name="felhasznalonev" class="form-control" placeholder="Írja be a felhasználónevét" required>
        </div>
        <div class="mb-3">
            <label for="keresztnev" class="form-label">Keresztnév</label>
            <input type="text" id="keresztnev" name="keresztnev" class="form-control" placeholder="Írja be a keresztnevét" required>
        </div>
        <div class="mb-3">
            <label for="vezeteknev" class="form-label">Vezetéknév</label>
            <input type="text" id="vezeteknev" name="vezeteknev" class="form-control" placeholder="Írja be a vezetéknevét" required>
        </div>
        <div class="mb-3">
            <label for="jelszo" class="form-label">Jelszó</label>
            <input type="password" id="jelszo" name="jelszo" class="form-control" placeholder="Írja be a jelszavát" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Regisztráció</button>
    </form>
</div>
</body>
</html>
