<?php 
include (__DIR__ . '/../includes/crud/crudUser.php');
session_start();

// Proteksi halaman - redirect ke auth.php jika belum login
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header('Location: aunth.php');
    exit();
}

// Ambil data user dari database
$users = getAllUserStatusPending();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ModaPay Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <a href="dashboard.php" class="menu-item active">
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
            <a href="employment.php" class="menu-item">
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
    <div class="main-content">
        <!-- Header -->
        <div class="top-header">
            <div class="top-header-left">
                <div class="table-info">
                    <div class="table-title">Dashboard</div>
                    <div class="table-detail">Analytics store detail</div>
                </div>
            </div>
            
            <div class="header-actions">
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search Anything">
                </div>
                <button class="icon-button">
                        <i class="fas fa-bell"></i>
                </button>
            </div>
        </div>
        
        <!-- Dashboard  -->
        <div class="dashboard-cards">
                        <!-- Total Order -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-icon" style="background-color: #EDF1FF; color: #6A76FF;">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        Total Order
                    </div>
                    <div class="card-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
                
                <div class="card-value">
                    <div style="font-size: 14px; font-weight: normal; color: #888;">PCS</div>
                    65
                </div>
                
                <div class="card-footer">
                    <div class="percentage warning">
                        <i class="fas fa-arrow-up"></i>
                        2.74%
                    </div>
                    From last day
                </div>
            </div>

            <!-- Today Sell -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-icon" style="background-color: #E6FAF0; color: #38C976;">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        Today Sell
                    </div>
                    <div class="card-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
                
                <div class="card-value">
                    <div style="font-size: 14px; font-weight: normal; color: #888;">IDR</div>
                    340,546
                </div>
                
                <div class="card-footer">
                    <div class="percentage warning">
                        <i class="fas fa-arrow-up"></i>
                        4.85%
                    </div>
                    From last day
                </div>
            </div>
        
            <!-- Average Sell -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-icon" style="background-color: #E6FAF0; color: #38C976;">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        Average Sell
                    </div>
                    <div class="card-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
                
                <div class="card-value">
                    <div style="font-size: 14px; font-weight: normal; color: #888;">IDR</div>
                    4,833,119
                </div>
                
                <div class="card-footer">
                    <div class="percentage warning">
                        <i class="fas fa-arrow-up"></i>
                        3.43%
                    </div>
                    From last Month
                </div>
            </div>

            <!-- Total Revenue  -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-icon" style="background-color: #FFF5E5; color: #FFB443;">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        Total Revenue
                    </div>
                    <div class="card-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
                
                <div class="card-value">
                    <div style="font-size: 14px; font-weight: normal; color: #888;">IDR</div>
                    53,783,083
                </div>
                
                <div class="card-footer">
                    <div class="percentage warning">
                        <i class="fas fa-arrow-up"></i>
                        3.45%
                    </div>
                    From last Year
                </div>
            </div>
        </div>
        
        <!-- Sales Overview dan Stock Request  -->
        <div class="sales-stock-container">           
            <!-- User Management Table -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Account Cashier Request</div>
                    <div class="panel-subtitle">Request Account from cashier</div>
                </div>
                
                <!-- tabel user -->
                <div style="overflow-y: auto; flex: 1;">
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Tahun Masuk</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($users && $users->num_rows > 0) {
                                while($user = $users->fetch_assoc()) {
                                    // Tentukan class untuk status
                                    $statusClass = '';
                                    switch($user['status']) {
                                        case 'accepted':
                                            $statusClass = 'status-accept';
                                            break;
                                        case 'pending':
                                            $statusClass = 'status-private';
                                            break;
                                        case 'rejected':
                                            $statusClass = 'status-expired';
                                            break;
                                        default:
                                            $statusClass = 'status-private';
                                    }
                                    
                                    // Tentukan class untuk is_active
                                    $activeClass = $user['is_active'] == 'active' ? 'status-accept' : 'status-expired';
                                    
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['phone_number'] ?? '-') . "</td>";
                                    echo "<td>" . htmlspecialchars($user['gender'] ?? '-') . "</td>";
                                    echo "<td>" . htmlspecialchars($user['tahun_masuk'] ?? '-') . "</td>";
                                    echo "<td>" . htmlspecialchars($user['kelas'] ?? '-') . "</td>";
                                    echo "<td><div class='status-label " . $statusClass . "'>" . ucfirst($user['status']) . "</div></td>";
                                    echo "<td><div class='status-label " . $activeClass . "'>" . ucfirst($user['is_active']) . "</div></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8' style='text-align: center; padding: 20px;'>No users found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Recent Orders dan Stock Alert  -->
        <div class="orders-alert-container">
            <!-- Recent Orders -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Re-Stock Request</div>
                    <div class="panel-subtitle">Request re-Stock from cashier</div>
                </div>
                
                <div style="overflow-y: auto; flex: 1;">
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID Product</th>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Request</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>65442FK131</td>
                                <td>Old Green T-Shirt Oversize</td>
                                <td>M</td>
                                <td>70</td>
                                <td></td>
                                <td><div class="status-label status-accept">Accept</div></td>
                            </tr>
                            <tr>
                                <td>28743DDS09</td>
                                <td>Sweet Pants Vintage</td>
                                <td>L</td>
                                <td>60</td>
                                <td><div class="status-label status-private">Pending</div></td>
                                <td><div class="status-label status-doneRestock">Done</div></td>
                            </tr>
                            <tr>
                                <td>8923WRC46</td>
                                <td>Brown Floral Dress</td>
                                <td>XL</td>
                                <td>60</td>
                                <td><div class="status-label status-public">Done</div></td>
                            </tr>
                    </table>
                </div>
            </div>
            
            <!-- Stock Alert -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Stock Alert</div>
                    <div class="panel-subtitle">Low Quantity Stock</div>
                </div>
                
                <div style="overflow-y: auto; flex: 1;">
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Sweet Pants Vintage</div>
                            <div class="stock-quantity">Stock Quantity: 9</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                    
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Brown Floral Dress</div>
                            <div class="stock-quantity">Stock Quantity: 5</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                    
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Old Green T-Shirt Oversize</div>
                            <div class="stock-quantity">Stock Quantity: 4</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                    
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Black Denim Jacket</div>
                            <div class="stock-quantity">Stock Quantity: 7</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                    
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">White Casual Shirt</div>
                            <div class="stock-quantity">Stock Quantity: 3</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                    
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Blue Denim Pants</div>
                            <div class="stock-quantity">Stock Quantity: 8</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                    
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Red Summer Dress</div>
                            <div class="stock-quantity">Stock Quantity: 6</div>
                        </div>
                        <div class="status-label status-expired">Low</div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>

<script>
    // Timer 
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
</script>
</body>
</html>