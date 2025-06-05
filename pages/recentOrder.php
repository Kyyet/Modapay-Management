<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Employee Dashboard</title>
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
        <main class="main-content">
            <header class="top-header">
                <!-- Header  -->
                <div class="top-header-left">
                    <div class="table-info">
                        <div class="table-title">Recent Order</div>
                        <div class="table-detail">Recent data detail</div>
                    </div>
                </div>
                
                <div class="header-actions">
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search Promo">
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
                <a><b>Recent Order</b></a>
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID Product</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>534433khsh</td>
                                <td>Old Green T-Shirt</td>
                                <td>139.000</td>
                                <td>1</td>
                                <td>7.49</td>
                                <td>24 Oktober 2007</td>
                                <td>Cash</td>
                            </tr>
                            <tr>
                                <td>67896tfuhoi</td>
                                <td>Sweet Pants</td>
                                <td>200.000</td>
                                <td>2</td>
                                <td>8.00</td>
                                <td>18 April 2007</td>
                                <td>QRIS</td>
                            </tr>
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
    </script>
</body>
</html>