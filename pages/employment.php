<?php
include (__DIR__ . '/../includes/crud/crudUser.php');

// Handle actions
if (isset($_GET['action']) && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $action = $_GET['action'];
    
    switch ($action) {
        case 'approve':
            updateUserStatus($user_id, 'accepted');
            break;
        case 'reject':
            updateUserStatus($user_id, 'rejected');
            break;
        case 'activate':
            updateUserActiveStatus($user_id, 'active');
            break;
        case 'deactivate':
            updateUserActiveStatus($user_id, 'inactive');
            break;
    }
    
    // Redirect to avoid resubmission
    header('Location: employment.php');
    exit();
}

// Get all users
$users = getAllUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Employee Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .action-btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }
        .btn-approve { background-color: #DE476F; color: white; }
        .btn-reject { background-color: #750B1F; color: white; }
        .btn-activate { background-color: #BF012C; color: white; }
        .btn-deactivate { background-color: #6c757d; color: white; }
        .status-pending { color: #ffc107; font-weight: bold; }
        .status-approved { color: #28a745; font-weight: bold; }
        .status-rejected { color: #dc3545; font-weight: bold; }
        .active-yes { color: #28a745; font-weight: bold; }
        .active-no { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <img src="../assets/images/ModaPay_New.png" alt="ModaPay Logo">
            </div>

            <div class="datetime">
                <div id="current-date"></div>
                <span id="current-time"></span>
            </div>

            <div class="menu-title">Main Menu</div>

            <nav class="menu">
                <a href="dashboard.php" class="menu-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="inventory.php" class="menu-item">
                    <i class="fas fa-box"></i>
                    <span>Inventory</span>
                </a>
                <a href="promo.php" class="menu-item">
                    <i class="fas fa-tag"></i>
                    <span>Promo</span>
                </a>
                <a href="employment.php" class="menu-item active">
                    <i class="fas fa-users"></i>
                    <span>Employment</span>
                </a>
                <a href="recentOrder.php" class="menu-item">
                    <i class="fas fa-receipt"></i>
                    <span>Recent Order</span>
                </a>
                <a href="financial.php" class="menu-item">
                    <i class="fas fa-chart-line"></i> 
                    <span>Financial Statements</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-header">
                <!-- Header  -->
                <div class="top-header-left">
                    <div class="table-info">
                        <div class="table-title">Employee</div>
                        <div class="table-detail">Employee data detail</div>
                    </div>
                </div>
                
                <div class="header-actions">
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search Employee" id="searchInput">
                    </div>
                    <button class="icon-button">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="icon-button">
                        <i class="fas fa-bell"></i>
                    </button>
                </div>
            </header>
            
            <!-- Main Content -->
            <div id="table-content">
                <div class="main-table-container">
                    <a><b>Employee Management</b></a>
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Tahun Masuk</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Is Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($users && $users->num_rows > 0) {
                                while($row = $users->fetch_assoc()) {
                                    
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['tahun_masuk']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                                    
                                    // Status with styling
                                    $status_class = '';
                                    switch($row['status']) {
                                        case 'pending': $status_class = 'status-pending'; break;
                                        case 'approved': $status_class = 'status-approved'; break;
                                        case 'rejected': $status_class = 'status-rejected'; break;
                                    }
                                    echo "<td><span class='{$status_class}'>" . ucfirst(htmlspecialchars($row['status'])) . "</span></td>";
                                    
                                    // Active/Inactive actions
                                    echo "<td>";
                                    if ($row['is_active'] == 'active') {
                                        echo "<a href='employment.php?action=deactivate&user_id=" . $row['user_id'] . "' class='action-btn btn-deactivate' onclick='return confirm(\"Deactivate this user?\")'>Deactivate</a>";
                                    } else {
                                        echo "<a href='employment.php?action=activate&user_id=" . $row['user_id'] . "' class='action-btn btn-activate' onclick='return confirm(\"Activate this user?\")'>Activate</a>";
                                    }
                                    echo "</td>";
                                    
                                    // Status actions
                                    echo "<td>";
                                    if ($row['status'] == 'pending') {
                                        echo "<a href='employment.php?action=approve&user_id=" . $row['user_id'] . "' class='action-btn btn-approve' onclick='return confirm(\"Approve this user?\")'>Approve</a>";
                                        echo "<a href='employment.php?action=reject&user_id=" . $row['user_id'] . "' class='action-btn btn-reject' onclick='return confirm(\"Reject this user?\")'>Reject</a>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11' style='text-align: center;'>No employees found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        //Timer
        function updateTime() {
            const now = new Date();

            const options = { day: '2-digit', month: 'short', year: 'numeric' };
            const dateString = now.toLocaleDateString('en-GB', options);
            const timeString = now.toLocaleTimeString('en-GB');

            document.getElementById('current-date').innerText = dateString;
            document.getElementById('current-time').innerText = timeString;
        }

        setInterval(updateTime, 1000);
        updateTime();

        // Menu active
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(function(item) {
                const href = item.getAttribute('href');
                if (href === currentPath || currentPath.endsWith(href)) {
                    menuItems.forEach(function(menu) {
                        menu.classList.remove('active');
                    });
                    item.classList.add('active');
                }
            });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.main-table tbody tr');
            
            rows.forEach(row => {
                const username = row.cells[1].textContent.toLowerCase(); // Kolom username (index 1)
                if (username.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>