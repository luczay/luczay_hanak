<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munkalap Szerkesztése</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Munkalap Szerkesztése</h1>
    <form action="szerkeszt_munkalap.php" method="POST">
        <input type="hidden" name="azonosito" value="<?= htmlspecialchars($row['az']) ?>">
        <div class="mb-3">
            <label for="bedatum" class="form-label">Beadási Dátum</label>
            <input type="date" class="form-control" id="bedatum" name="bedatum" value="<?= htmlspecialchars($row['bedatum']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="javdatum" class="form-label">Javytás Dátuma</label>
            <input type="date" class="form-control" id="javdatum" name="javdatum" value="<?= htmlspecialchars($row['javdatum']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="helyaz" class="form-label">Hely</label>
            <select class="form-select" id="helyaz" name="helyaz" required>
                <?php foreach ($viewData['helyek'] as $hely): ?>
                    <option value="<?= $hely['az'] ?>" <?= $hely['az'] ? 'selected' : '' ?>>
                        <?= $hely['telepules'] . ', ' . $hely['utca'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="szereloaz" class="form-label">Szerelők</label>
            <select class="form-select" id="szereloaz" name="szereloaz" required>
                <?php foreach ($viewData['szerelok'] as $szerelo): ?>
                    <option value="<?= $szerelo['az'] ?>" <?= $szerelo['az'] ? 'selected' : '' ?>>
                        <?= $szerelo['nev'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="munkaora" class="form-label">Munkaóra</label>
            <input type="number" class="form-control" id="munkaora" name="munkaora" value="<?= htmlspecialchars($row['munkaora']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="anyagar" class="form-label">Anyagár</label>
            <input type="number" class="form-control" id="anyagar" name="anyagar" value="<?= htmlspecialchars($row['anyagar']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Mentés</button>
        <a href="munkalapok" class="btn btn-secondary">Mégse</a>
    </form>
</div>
</body>
</html>
