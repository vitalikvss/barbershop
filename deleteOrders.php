<?php
session_start();
require 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM booked_dates WHERE OrdersID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM Orders WHERE OrdersID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Заказ с ID $id успешно удалён.";
    } else {
        echo "Ошибка при удалении из Orders: " . $stmt->error;
    }

    $stmt->close();
}

header('Location: orders.php');
exit();
?>
