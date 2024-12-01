<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árfolyamok</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Árfolyamok</h2>
        <form action="arfolyam_chart" method="POST" id="currencyForm">
            <div class="mb-3">
                <label for="currency" class="form-label">Pénznem</label>
                <input 
                    type="text" 
                    id="currency" 
                    name="currency" 
                    class="form-control" 
                    placeholder="Pénznem, pl., EUR" 
                    required
                >
            </div>
            <div class="mb-3">
                <label class="form-label">Intervallom</label>
                <div class="form-check">
                    <input 
                        type="radio" 
                        id="current" 
                        name="dateOption" 
                        value="current" 
                        class="form-check-input" 
                        checked
                    >
                    <label for="current" class="form-check-label">Jelenlegi</label>
                </div>
                <div class="form-check">
                    <input 
                        type="radio" 
                        id="lastMonth" 
                        name="dateOption" 
                        value="last_month" 
                        class="form-check-input"
                    >
                    <label for="lastMonth" class="form-check-label">Előző hónap</label>
                </div>
                <div class="form-check">
                    <input 
                        type="radio" 
                        id="custom" 
                        name="dateOption" 
                        value="custom" 
                        class="form-check-input"
                    >
                    <label for="custom" class="form-check-label">Tetszőleges</label>
                </div>
            </div>
            <div class="mb-3" id="customDatePicker" style="display: none;">
                <label for="customDate" class="form-label">Select Date</label>
                <input 
                    type="date" 
                    id="customDate" 
                    name="customDate" 
                    class="form-control"
                >
            </div>
            <button type="submit" class="btn btn-primary w-100">Megjelenít</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('input[name="dateOption"]').forEach(option => {
            option.addEventListener('change', function() {
                const customDatePicker = document.getElementById('customDatePicker');
                if (this.value === 'custom') {
                    customDatePicker.style.display = 'block';
                } else {
                    customDatePicker.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
