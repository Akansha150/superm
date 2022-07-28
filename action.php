<?php
require 'backend/connection.php';
if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql="SELECT * FROM products WHERE ProductName LIKE '%$inpText%' OR ProductSKU LIKE '%$inpText%' OR ProductLongDesc LIKE '%$inpText%'";
    $result=$conn->query($sql);

    $total = mysqli_num_rows($result);

    if ($total) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['ProductName'] . '</a>';
        }
    } else {
        echo '<p class="list-group-item border-1">No Record</p>';
    }
}
?>