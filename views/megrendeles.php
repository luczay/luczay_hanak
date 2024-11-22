<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Megrendelés</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-primary text-center mb-4">Új Megrendelés</h1>

        <form action="uj_megrendeles" method="POST" class="border p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="szerelo" class="form-label">Válasszon Szerelőt</label>
                <select id="szerelo" name="szerelo" class="form-select" required>
                    <option value="" disabled selected>Válasszon egy szerelőt...</option>
                    <?php echo Szerelok::getSzerelok(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="varos" class="form-label">Város Név</label>
                <input type="text" id="varos" name="varos" class="form-control" placeholder="Írd be a város nevét" required>
            </div>

            <div class="mb-3">
                <label for="utca" class="form-label">Utca Név</label>
                <input type="text" id="utca" name="utca" class="form-control" placeholder="Írd be az utca nevét" required>
            </div>

            <div class="mb-3">
                <label for="leiras" class="form-label">Probléma Leírása</label>
                <textarea id="leiras" name="leiras" class="form-control" rows="4" placeholder="Írd le a problémát..." required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Megrendelés Létrehozása</button>
                <a href="megrendelesek" class="btn btn-secondary">Vissza a listához</a>
            </div>
        </form>
    </div>
</body>
</html>
