<?php
require_once __DIR__ . '/../../../model/pdo.php';

function get_bookings_by_customer($customer_id) {
    $sql = "SELECT bt.id, bt.userid, bt.tourid, bt.total_price, bt.status, bt.payment, bt.bookdate, t.name 
            FROM booktour bt 
            JOIN tour t ON bt.tourid = t.id 
            WHERE bt.userid = ? 
            ORDER BY bt.bookdate DESC";
    try {
        return pdo_query($sql, $customer_id);
    } catch (PDOException $e) {
        return [];
    }
}
?>