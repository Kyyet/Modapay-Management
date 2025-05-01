<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Promo Dashboard</title>
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
                <a href="dashboard.php" class="menu-item">
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
        <main class="main-content">
            <header class="top-header">
                <!-- Header -->
                <div class="top-header-left">
                    <div class="table-info">
                        <div class="table-title">Promo</div>
                        <div class="table-detail">Promotion items detail</div>
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
                <a><b>Promo</b></a>
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID Promo</th>
                                <th>Promo Name</th>
                                <th>Via Payment</th>
                                <th>Discount</th>
                                <th>Product</th>
                                <th>Expired date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0001</td>
                                <td>Amanda Kartika Oktaviani</td>
                                <td>Amandakartika</td>
                                <td>khatulistiwa1337esm</td>
                                <td>Laki-Laki</td>
                                <td>24 Oktober 2007</td>
                                <td><span class="status-label status-public">Public</span></td>
                            </tr>
                            <tr>
                                <td>0002</td>
                                <td>Jilleya Casanndra</td>
                                <td>Jilleya</td>
                                <td>jwasgFOYB34*%s</td>
                                <td>Perempuan</td>
                                <td>18 April 2007</td>
                                <td><span class="status-label status-private">Private</span></td>
                            </tr>
                            <tr>
                                <td>0003</td>
                                <td>Zaky Rahardika</td>
                                <td>Barak</td>
                                <td>**fwsfsafeE89isec</td>
                                <td>Laki-Laki</td>
                                <td>17 Agustus 1945</td>
                                <td><span class="status-label status-expired">Expired</span></td>
                            </tr>
                            <tr>
                                <td>0004</td>
                                <td>Muhammad Rizky Ramadhan</td>
                                <td>Riyskm</td>
                                <td>#$%^nvogsnjga^%$#</td>
                                <td>Laki-Laki</td>
                                <td>30 November 1965</td>
                                <td><span class="status-label status-public">Public</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
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