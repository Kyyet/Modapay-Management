<?php 
require_once(__DIR__ . '/../config.php');

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                createDiscount();
                break;
            case 'update':
                updateDiscount();
                break;
            case 'delete':
                deleteDiscount();
                break;
            case 'update_status':
                updateStatus();
                break;
        }
    }
}

// Handle GET requests for edit
if (isset($_GET['edit'])) {
    $editData = getDiscountById($_GET['edit']);
}

function createDiscount() {
    $conn = connectDatabase();
    
    $discount_name = $_POST['discount_name'];
    $product_id = !empty($_POST['product_id']) ? $_POST['product_id'] : null;
    $product_type = !empty($_POST['product_type']) ? $_POST['product_type'] : null;
    $discount_type = $_POST['discount_type'];
    $discount_percentage = ($discount_type == 'percentage') ? $_POST['discount_value'] : null;
    $flat_rate_discount = ($discount_type == 'flat_rate') ? $_POST['discount_value'] : null;
    $status = $_POST['status'];
    $end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : null;
    
    // Generate discount_id
    $result = $conn->query("SELECT MAX(CAST(discount_id AS UNSIGNED)) as max_id FROM modapay_discount");
    $row = $result->fetch_assoc();
    $next_id = str_pad(($row['max_id'] + 1), 4, '0', STR_PAD_LEFT);
    
    $sql = "INSERT INTO modapay_discount (discount_id, discount_name, product_id, product_type, discount_type, discount_percentage, flat_rate_discount, status, end_date, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssdsss", $next_id, $discount_name, $product_id, $product_type, $discount_type, $discount_percentage, $flat_rate_discount, $status, $end_date);
    
    if ($stmt->execute()) {
        header("Location: ../../pages/promo.php?success=created");
    } else {
        header("Location: ../../pages/promo.php?error=create_failed");
    }
    exit();
}

function updateDiscount() {
    $conn = connectDatabase();
    
    $discount_id = $_POST['discount_id'];
    $discount_name = $_POST['discount_name'];
    $product_id = !empty($_POST['product_id']) ? $_POST['product_id'] : null;
    $product_type = !empty($_POST['product_type']) ? $_POST['product_type'] : null;
    $discount_type = $_POST['discount_type'];
    $discount_percentage = ($discount_type == 'percentage') ? $_POST['discount_value'] : null;
    $flat_rate_discount = ($discount_type == 'flat_rate') ? $_POST['discount_value'] : null;
    $status = $_POST['status'];
    $end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : null;
    
    $sql = "UPDATE modapay_discount SET 
            discount_name = ?, 
            product_id = ?, 
            product_type = ?, 
            discount_type = ?, 
            discount_percentage = ?, 
            flat_rate_discount = ?, 
            status = ?, 
            end_date = ? 
            WHERE discount_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdssss", $discount_name, $product_id, $product_type, $discount_type, $discount_percentage, $flat_rate_discount, $status, $end_date, $discount_id);
    
    if ($stmt->execute()) {
        header("Location: ../../pages/promo.php?success=updated");
    } else {
        header("Location: ../../pages/promo.php?error=update_failed");
    }
    exit();
}

function deleteDiscount() {
    $conn = connectDatabase();
    
    $discount_id = $_POST['discount_id'];
    
    $sql = "DELETE FROM modapay_discount WHERE discount_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $discount_id);
    
    if ($stmt->execute()) {
        header("Location: ../../pages/promo.php?success=deleted");
    } else {
        header("Location: ../../pages/promo.php?error=delete_failed");
    }
    exit();
}

function updateStatus() {
    $conn = connectDatabase();
    
    $discount_id = $_POST['discount_id'];
    $status = $_POST['status'];
    
    $sql = "UPDATE modapay_discount SET status = ? WHERE discount_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $status, $discount_id);
    
    if ($stmt->execute()) {
        header("Location: ../../pages/promo.php?success=status_updated");
    } else {
        header("Location: ../../pages/promo.php?error=status_update_failed");
    }
    exit();
}

function getAllDiscounts() {
    $conn = connectDatabase();
    
    $sql = "SELECT * FROM modapay_discount ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getDiscountById($id) {
    $conn = connectDatabase();
    
    $sql = "SELECT * FROM modapay_discount WHERE discount_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    
    return $stmt->get_result()->fetch_assoc();
}

// Get all discounts for display
$discounts = getAllDiscounts();
?>