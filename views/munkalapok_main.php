<title>Munkalapok</title>
<div class="container my-5">
        <!-- Page Title and "Új Munkalap" Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center mb-0">Munkalapok</h1>
            <a href="uj_munkalap_letrehozasa" class="btn btn-success">Új Munkalap</a>
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
                    <?php echo Munkalapok::getTableRows(); ?>
                </tbody>
            </table>
        </div>
    </div>

