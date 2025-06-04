<?php 
require_once(__DIR__ . '/../config.php');

// Function to get all users
function getAllUser() {
    $conn = connectDatabase();
    $sql = "SELECT user_id, username, password_hash, phone_number, gender, tahun_masuk, kelas, role_id, status, is_active FROM modapay_users ORDER BY user_id ASC";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

// Function to get user by ID
function getUserById($user_id) {
    $conn = connectDatabase();
    $sql = "SELECT * FROM modapay_users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $user;
}

// Function to update user status (approve/reject)
function updateUserStatus($user_id, $status) {
    $conn = connectDatabase();
    
    // Validate status
    $valid_statuses = ['pending', 'accepted', 'rejected'];
    if (!in_array($status, $valid_statuses)) {
        $conn->close();
        return false;
    }
    
    $sql = "UPDATE modapay_users SET status = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $user_id);
    
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}

// Function to update user active status
function updateUserActiveStatus($user_id, $is_active) {
    $conn = connectDatabase();
    
    // Validate is_active value for ENUM
    $valid_statuses = ['active', 'inactive'];
    if (!in_array($is_active, $valid_statuses)) {
        $conn->close();
        return false;
    }
    
    $sql = "UPDATE modapay_users SET is_active = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $is_active, $user_id);
    
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}

// Function to create new user
function createUser($username, $password, $phone_number, $gender, $tahun_masuk, $kelas, $role_id = 2) {
    $conn = connectDatabase();
    
    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO modapay_users (username, password_hash, phone_number, gender, tahun_masuk, kelas, role_id, status, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', 'inactive')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $username, $password_hash, $phone_number, $gender, $tahun_masuk, $kelas, $role_id);
    
    $success = $stmt->execute();
    $new_user_id = $conn->insert_id;
    $stmt->close();
    $conn->close();
    
    return $success ? $new_user_id : false;
}

// Function to update user information
function updateUser($user_id, $username, $phone_number, $gender, $tahun_masuk, $kelas, $role_id) {
    $conn = connectDatabase();
    
    $sql = "UPDATE modapay_users SET username = ?, phone_number = ?, gender = ?, tahun_masuk = ?, kelas = ?, role_id = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssii", $username, $phone_number, $gender, $tahun_masuk, $kelas, $role_id, $user_id);
    
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}

// Function to update user password
function updateUserPassword($user_id, $new_password) {
    $conn = connectDatabase();
    
    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE modapay_users SET password_hash = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $password_hash, $user_id);
    
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}

// Function to delete user (soft delete by setting is_active to inactive)
function deleteUser($user_id) {
    $conn = connectDatabase();
    
    $sql = "UPDATE modapay_users SET is_active = 'inactive', status = 'rejected' WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}

// Function to permanently delete user (use with caution)
function permanentDeleteUser($user_id) {
    $conn = connectDatabase();
    
    $sql = "DELETE FROM modapay_users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}

// Function to search users
function searchUsers($search_term) {
    $conn = connectDatabase();
    
    $search_term = "%" . $search_term . "%";
    $sql = "SELECT user_id, username, password_hash, phone_number, gender, tahun_masuk, kelas, role_id, status, is_active FROM modapay_users WHERE username LIKE ? OR phone_number LIKE ? OR kelas LIKE ? ORDER BY user_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $search_term, $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    
    return $result;
}

// Function to get users by status
function getUsersByStatus($status) {
    $conn = connectDatabase();
    
    $sql = "SELECT user_id, username, password_hash, phone_number, gender, tahun_masuk, kelas, role_id, status, is_active FROM modapay_users WHERE status = ? ORDER BY user_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    
    return $result;
}

// Function to get active users
function getActiveUsers() {
    $conn = connectDatabase();
    
    $sql = "SELECT user_id, username, password_hash, phone_number, gender, tahun_masuk, kelas, role_id, status, is_active FROM modapay_users WHERE is_active = 'active' ORDER BY user_id DESC";
    $result = $conn->query($sql);
    $conn->close();
    
    return $result;
}

// Function to decrypt password (if you need to show actual password - NOT RECOMMENDED for security)
function decryptPassword($password_hash) {
    // For security reasons, we should NOT decrypt passwords
    // Instead, return a masked version or provide password reset functionality
    return "******";
}

// Function to verify password
function verifyPassword($password, $password_hash) {
    return password_verify($password, $password_hash);
}

// Function to get user count by status
function getUserCountByStatus() {
    $conn = connectDatabase();
    
    $sql = "SELECT status, COUNT(*) as count FROM modapay_users GROUP BY status";
    $result = $conn->query($sql);
    
    $counts = [];
    while ($row = $result->fetch_assoc()) {
        $counts[$row['status']] = $row['count'];
    }
    
    $conn->close();
    return $counts;
}

// Function to get total user count
function getTotalUserCount() {
    $conn = connectDatabase();
    
    $sql = "SELECT COUNT(*) as total FROM modapay_users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $conn->close();
    return $row['total'];
}
?>