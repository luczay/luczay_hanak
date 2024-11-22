<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Munkalap</title>

    <script>
        function toggleNewSzerelo() {
            const addNewSzereloDiv = document.getElementById('addNewSzerelo');
            const szereloSelect = document.getElementById('szerelo');
            if (szereloSelect.value === 'new') {
                addNewSzereloDiv.style.display = 'block';
            } else {
                addNewSzereloDiv.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Új Munkalap Létrehozása</h1>

        <form action="uj_munkalap_felvetele.php" method="POST">
            <div class="mb-3">
                <label for="telepules" class="form-label">Település</label>
                <input type="text" class="form-control" id="telepules" name="telepules" required>
            </div>
            <div class="mb-3">
                <label for="utca" class="form-label">Utca</label>
                <input type="text" class="form-control" id="utca" name="utca" required>
            </div>
            <div class="mb-3">
                <label for="beadasiDatum" class="form-label">Beadási Dátum</label>
                <input type="date" class="form-control" id="beadasiDatum" name="beadasiDatum" required>
            </div>
            <div class="mb-3">
                <label for="javitasDatum" class="form-label">Javítási Dátum</label>
                <input type="date" class="form-control" id="javitasDatum" name="javitasDatum" required>
            </div>
            <div class="mb-3">
                <label for="munkaora" class="form-label">Munkaóra</label>
                <input type="number" class="form-control" id="munkaora" name="munkaora" required>
            </div>
            <div class="mb-3">
                <label for="anyagar" class="form-label">Anyagár</label>
                <input type="number" class="form-control" id="anyagar" name="anyagar" required>
            </div>

            <div class="mb-3">
                <label for="szerelo" class="form-label">Szerelő</label>
                <select class="form-select" id="szerelo" name="szerelo" onchange="toggleNewSzerelo()" required>
                    <option value="">Válasszon szerelőt...</option>
                    <?php echo Szerelok::getSzerelok(); ?>
                    <option value="new">Új Szerelő Hozzáadása</option>
                </select>
            </div>

            <div id="addNewSzerelo" style="display: none;">
                <h4 class="mt-4">Új Szerelő Adatok</h4>
                <div class="mb-3">
                    <label for="ujSzereloNev" class="form-label">Szerelő Név</label>
                    <input type="text" class="form-control" id="ujSzereloNev" name="ujSzereloNev">
                </div>
                <div class="mb-3">
                    <label for="munkabaAllasDatum" class="form-label">Munkábaállás Dátuma</label>
                    <input type="text" class="form-control" id="munkabaAllasDatum" name="munkabaAllasDatum" placeholder="YYYY-MM-DD">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Létrehoz</button>
        </form>
    </div>
</body>
</html>
