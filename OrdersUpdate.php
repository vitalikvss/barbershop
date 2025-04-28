<?php
session_start();
require 'config.php';

if (!isset($_SESSION['UsersID'])) {
    header("Location: Login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $phone = trim($_POST['phone']);
    $UserID = $_SESSION['UsersID'];

    if ($date < date('Y-m-d')) {
        $_SESSION['error'] = 'Прошедшую дату выбрать нельзя.';
    } elseif (!preg_match('/^\+?[0-9\s\-()]{7,20}$/', $phone)) {
        $_SESSION['error'] = 'Введите корректный номер телефона.';
    } else {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM booked_dates WHERE UserID = ?");
        $stmt->bind_param("i", $UserID);
        $stmt->execute();
        $stmt->bind_result($userBookingCount);
        $stmt->fetch();
        $stmt->close();

        if ($userBookingCount > 0) {
            $_SESSION['error'] = 'Вы уже записались. Можно создать только одну запись.';
        } else {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM booked_dates WHERE date = ?");
            $stmt->bind_param("s", $date);
            $stmt->execute();
            $stmt->bind_result($dateCount);
            $stmt->fetch();
            $stmt->close();

            if ($dateCount >= 5) {
                $_SESSION['error'] = 'На эту дату уже 5 записей.';
            } else {
                $ordersID = null;
                foreach ($_SESSION['basket'] as $key => $row) {
                    $stmt = $conn->prepare("INSERT INTO Orders (UsersID, ProductsID, ProductNum) VALUES (?, ?, ?)");
                    $stmt->bind_param("iii", $UserID, $row['ProductsID'], $row['count']);
                    $stmt->execute();

                    $ordersID = $stmt->insert_id;

                    $stmt->close();
                    unset($_SESSION['basket'][$key]);
                }
                if ($ordersID !== null) {
                    $stmt = $conn->prepare("INSERT INTO booked_dates (date, phone, UserID, OrdersID) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssii", $date, $phone, $UserID, $ordersID);
                    $stmt->execute();
                    $stmt->close();
                    header("Location: Orders.php");
                    exit();
                }
            }
        }
    }
    header("Location: date.php");
    exit();
}
?>
