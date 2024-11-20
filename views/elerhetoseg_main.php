<h2>
    <br>A következő címen és telefonon érhet el:<br>
    <br>Cím: ...<br>
    <br>Telefon: ...<br>
</h2>

<div class="container my-5">
        <!-- Page Title and "Új Munkalap" Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center mb-0">Munkalapok</h1>
            <a href="uj_munkalap.php" class="btn btn-success">Új Munkalap</a>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Azonosító</th>
                        <th>Beadási Dátum</th>
                        <th>Javítási Dátum</th>
                        <th>Hely</th>
                        <th>Szerelő Neve</th>
                        <th>Munkaóra</th>
                        <th>Anyagár</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row 1 -->
                    <tr>
                        <td>12345</td>
                        <td>2024-11-01</td>
                        <td>2024-11-05</td>
                        <td>Budapest</td>
                        <td>Kiss János</td>
                        <td>8</td>
                        <td>25000 Ft</td>
                        <td>
                            <a href="szerkeszt.php?azonosito=12345" class="btn btn-warning btn-sm">Szerkeszt</a>
                            <a href="torol.php?azonosito=12345" class="btn btn-danger btn-sm">Töröl</a>
                        </td>
                    </tr>
                    <!-- Example Row 2 -->
                    <tr>
                        <td>67890</td>
                        <td>2024-10-15</td>
                        <td>2024-10-20</td>
                        <td>Debrecen</td>
                        <td>Nagy Éva</td>
                        <td>5</td>
                        <td>15000 Ft</td>
                        <td>
                            <a href="szerkeszt.php?azonosito=67890" class="btn btn-warning btn-sm">Szerkeszt</a>
                            <a href="torol.php?azonosito=67890" class="btn btn-danger btn-sm">Töröl</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

