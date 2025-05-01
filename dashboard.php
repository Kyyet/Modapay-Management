<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ModaPay Dashboard</title>
  <link rel="stylesheet" href="style/stylee.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="https://via.placeholder.com/150x50" alt="ModaPay Logo">
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
            <a href="iventory.php" class="menu-item">
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
                
                <div class="icon-button">
                    <i class="fas fa-bell"></i>
                </div>
            </div>
        </div>
        
        <!-- Dashboard  -->
        <div class="dashboard-cards">
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
                    From last Month
                </div>
            </div>
            
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
        </div>
        
        <!-- Sales Overview dan Stock Request  -->
        <div class="sales-stock-container">
            <!-- Sales Overview -->
            <div class="sales-container">
                <div class="sales-header">
                    <div class="sales-title">Sales Overview</div>
                    
                    <div class="time-filters">
                        <div class="time-filter">Daily</div>
                        <div class="time-filter">Weekly</div>
                        <div class="time-filter">Monthly</div>
                        <div class="time-filter">Yearly</div>
                    </div>
                </div>
                
                <div class="sales-chart">
                    <!-- grafik -->
                </div>
            </div>
            
            <!-- Stock Request  -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Stock Request</div>
                    <div class="panel-subtitle">Request stock from cashier</div>
                </div>
                
                <div style="overflow-y: auto; flex: 1;">
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID Product</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>65442FK131</td>
                                <td>Old Green T-Shirt Oversize</td>
                                <td>70</td>
                                <td><div class="status-label status-accept">Accept</div></td>
                            </tr>
                            <tr>
                                <td>28743DDS09</td>
                                <td>Sweet Pants Vintage</td>
                                <td>60</td>
                                <td><div class="status-label status-private">Pending</div></td>
                            </tr>
                            <tr>
                                <td>8923WRC46</td>
                                <td>Brown Floral Dress</td>
                                <td>60</td>
                                <td><div class="status-label status-public">Done</div></td>
                            </tr>
                            <tr>
                                <td>28743DDS09</td>
                                <td>Sweet Pants Vintage</td>
                                <td>45</td>
                                <td><div class="status-label status-public">Done</div></td>
                            </tr>
                            <tr>
                                <td>65442FK131</td>
                                <td>Old Green T-Shirt Oversize</td>
                                <td>70</td>
                                <td><div class="status-label status-public">Done</div></td>
                            </tr>
                            <tr>
                                <td>65442FK131</td>
                                <td>Old Green T-Shirt Oversize</td>
                                <td>25</td>
                                <td><div class="status-label status-private">Pending</div></td>
                            </tr>
                            <tr>
                                <td>8923WRC46</td>
                                <td>Brown Floral Dress</td>
                                <td>50</td>
                                <td><div class="status-label status-public">Accept</div></td>
                            </tr>
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
                    <div class="panel-title">Recent Order</div>
                </div>
                
                <div style="overflow-y: auto; flex: 1;">
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID Product</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Date time</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>65442FK131</td>
                                <td>Old Green T-Shirt Oversize</td>
                                <td>139.000</td>
                                <td>1</td>
                                <td>08.00 - 16 April 2025</td>
                                <td>Cash</td>
                            </tr>
                            <tr>
                                <td>28743DDS09</td>
                                <td>Sweet Pants Vintage</td>
                                <td>199.000</td>
                                <td>1</td>
                                <td>08.05 - 16 April 2025</td>
                                <td>QRIS</td>
                            </tr>
                            <tr>
                                <td>8923WRC46</td>
                                <td>Brown Floral Dress</td>
                                <td>349.000</td>
                                <td>1</td>
                                <td>08.06 - 16 April 2025</td>
                                <td>Gopay</td>
                            </tr>
                            <tr>
                                <td>8923WRC46</td>
                                <td>Brown Floral Dress</td>
                                <td>349.000</td>
                                <td>1</td>
                                <td>08.11 - 16 April 2025</td>
                                <td>Cash</td>
                            </tr>
                            <tr>
                                <td>65442FK131</td>
                                <td>Old Green T-Shirt Oversize</td>
                                <td>139.000</td>
                                <td>2</td>
                                <td>08.15 - 16 April 2025</td>
                                <td>OVO</td>
                            </tr>
                            <tr>
                                <td>28743DDS09</td>
                                <td>Sweet Pants Vintage</td>
                                <td>199.000</td>
                                <td>1</td>
                                <td>08.22 - 16 April 2025</td>
                                <td>Cash</td>
                            </tr>
                            <tr>
                                <td>8923WRC46</td>
                                <td>Brown Floral Dress</td>
                                <td>349.000</td>
                                <td>1</td>
                                <td>08.30 - 16 April 2025</td>
                                <td>Dana</td>
                            </tr>
                        </tbody>
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