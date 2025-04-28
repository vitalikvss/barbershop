<?php include "html/header.php";?>

<?php
if(!isset($_SESSION['UsersID'])){
    header("Location:Login.php");
 }

$success = false;

$bookedCounts = [];
$result = $conn->query("SELECT date, COUNT(*) as count FROM booked_dates GROUP BY date");
while ($row = $result->fetch_assoc()) {
    $bookedCounts[$row['date']] = $row['count'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Запись на дату</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Записаться на свободную дату</h2>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="OrdersUpdate.php" method="post" class="card p-4 shadow-sm bg-white" id="bookingForm">
        <div class="mb-3">
            <label for="date" class="form-label">Выберите дату</label>
            <input type="date" name="date" id="datePicker" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Номер телефона</label>
            <input type="tel" name="phone" id="phoneInput" class="form-control" placeholder="+7 (___) ___-__-__" required>
            <div class="form-text" href="OrdersUpdate.php">Введите номер в формате +7 или 8</div>
        </div>
        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Записаться</button>
    </form>

    <hr class="my-5">

    <h4>Статус дат:</h4>
    <div id="calendarStatus" class="row row-cols-2 row-cols-md-4 g-3 mt-3"></div>
</div>

<script>
    const booked = <?php echo json_encode($bookedCounts); ?>;
    const maxPerDay = 5;

    const dateInput = document.getElementById('datePicker');
    const phoneInput = document.getElementById('phoneInput');
    const submitBtn = document.getElementById('submitBtn');

    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);

    function validateForm() {
        const phoneValid = /^\+?[0-9\s\-()]{7,20}$/.test(phoneInput.value.trim());
        submitBtn.disabled = !phoneValid;
    }

    phoneInput.addEventListener('input', validateForm);
    validateForm();

    dateInput.addEventListener('input', function () {
        const selected = dateInput.value;
        if (booked[selected] >= maxPerDay) {
            alert("На эту дату уже 5 записей.");
            dateInput.value = "";
        }
    });


    const container = document.getElementById('calendarStatus');
    const now = new Date();
    for (let i = 0; i < 30; i++) {
        const date = new Date(now);
        date.setDate(now.getDate() + i);
        const dateStr = date.toISOString().slice(0, 10);
        const count = booked[dateStr] ?? 0;

        const col = document.createElement('div');
        const card = document.createElement('div');
        card.className = 'card text-center p-2 shadow-sm';

        if (count >= maxPerDay) {
            card.classList.add('bg-secondary', 'text-white');
            card.innerHTML = `<strong>${dateStr}</strong><div>⛔ Занято</div>`;
        } else {
            card.classList.add('bg-success', 'text-white');
            card.innerHTML = `<strong>${dateStr}</strong><div>✔ Свободно (${count}/5)</div>`;
        }

        col.appendChild(card);
        container.appendChild(col);
    }
</script>

    <?php include "html/footer.php"; ?>