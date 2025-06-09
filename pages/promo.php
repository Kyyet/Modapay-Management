<?php 
include (__DIR__ . '/../includes/crud/crudDiscount.php');
session_start();

// Proteksi halaman - redirect ke auth.php jika belum login
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header('Location: aunth.php');
    exit();
}

// Check if we're in edit mode
$isEdit = isset($_GET['edit']);
$editData = $isEdit ? getDiscountById($_GET['edit']) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Promo Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .status-dropdown {
            position: relative;
            display: inline-block;
        }
        
        .status-options {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .status-options a {
            color: black;
            padding: 8px 12px;
            text-decoration: none;
            display: block;
            font-size: 12px;
        }
        
        .status-options a:hover {
            background-color: #f1f1f1;
        }
        
        .status-dropdown:hover .status-options {
            display: block;
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .btn-small {
            padding: 4px 8px;
            font-size: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .btn-edit {
            background-color: #DE476F;
            color: white;
        }
        
        .btn-delete {
            background-color: #750B1F ;
            color: white;
        }
        
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .discount-type-fields {
            display: none;
        }
        
        .discount-type-fields.active {
            display: block;
        }
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
                <a href="promo.php" class="menu-item active">
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
                        <input type="text" placeholder="Search Promo" id="searchInput">
                    </div>
                    <button class="icon-button">
                        <i class="fas fa-th-large"></i>
                    </button>
                </div>
            </header>
            
            <!-- Main Content -->
            <div id="table-content">
                <?php
                // Display success/error messages
                if (isset($_GET['success'])) {
                    $message = '';
                    switch ($_GET['success']) {
                        case 'created': $message = 'Promo berhasil ditambahkan!'; break;
                        case 'updated': $message = 'Promo berhasil diperbarui!'; break;
                        case 'deleted': $message = 'Promo berhasil dihapus!'; break;
                        case 'status_updated': $message = 'Status promo berhasil diperbarui!'; break;
                    }
                    echo "<div class='alert alert-success'>$message</div>";
                }
                
                if (isset($_GET['error'])) {
                    $message = '';
                    switch ($_GET['error']) {
                        case 'create_failed': $message = 'Gagal menambahkan promo!'; break;
                        case 'update_failed': $message = 'Gagal memperbarui promo!'; break;
                        case 'delete_failed': $message = 'Gagal menghapus promo!'; break;
                        case 'status_update_failed': $message = 'Gagal memperbarui status!'; break;
                    }
                    echo "<div class='alert alert-error'>$message</div>";
                }
                ?>

                <!-- Create/Edit Promo Form -->
                <div class="create-promo-section">
                    <h2><?php echo $isEdit ? 'Edit Promo' : 'Create Promo'; ?></h2>
                    <form class="create-promo-form" method="POST" action="../includes/crud/crudDiscount.php">
                        <input type="hidden" name="action" value="<?php echo $isEdit ? 'update' : 'create'; ?>">
                        <?php if ($isEdit): ?>
                            <input type="hidden" name="discount_id" value="<?php echo $editData['discount_id']; ?>">
                        <?php endif; ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="discount_name">Promo Name</label>
                                <input type="text" id="discount_name" name="discount_name" 
                                       placeholder="Promo name" class="form-control" 
                                       value="<?php echo $isEdit ? htmlspecialchars($editData['discount_name']) : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="product_id">Product ID (Optional)</label>
                                <input type="text" id="product_id" name="product_id" 
                                       placeholder="Product ID" class="form-control"
                                       value="<?php echo $isEdit ? htmlspecialchars($editData['product_id'] ?? '') : ''; ?>">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="product_type">Product Type (Optional)</label>
                                <div class="custom-select">
                                    <select id="product_type" name="product_type" class="form-control">
                                        <option value="">All Products</option>
                                        <option value="clothing" <?php echo ($isEdit && $editData['product_type'] == 'clothing') ? 'selected' : ''; ?>>Clothing</option>
                                        <option value="electronics" <?php echo ($isEdit && $editData['product_type'] == 'electronics') ? 'selected' : ''; ?>>Electronics</option>
                                        <option value="accessories" <?php echo ($isEdit && $editData['product_type'] == 'accessories') ? 'selected' : ''; ?>>Accessories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="custom-select">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="Public" <?php echo ($isEdit && $editData['status'] == 'Public') ? 'selected' : ''; ?>>Public</option>
                                        <option value="Private" <?php echo ($isEdit && $editData['status'] == 'Private') ? 'selected' : ''; ?>>Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="discount_type">Discount Type</label>
                                <div class="custom-select">
                                    <select id="discount_type" name="discount_type" class="form-control" required onchange="toggleDiscountFields()">
                                        <option value="">Select Type</option>
                                        <option value="percentage" <?php echo ($isEdit && $editData['discount_type'] == 'percentage') ? 'selected' : ''; ?>>Percentage</option>
                                        <option value="flat_rate" <?php echo ($isEdit && $editData['discount_type'] == 'flat_rate') ? 'selected' : ''; ?>>Flat Rate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="discount_value">Discount Value</label>
                                <div class="input-with-icon">
                                    <input type="number" id="discount_value" name="discount_value" 
                                           placeholder="0" class="form-control" step="0.01" required
                                           value="<?php 
                                           if ($isEdit) {
                                               echo $editData['discount_type'] == 'percentage' ? 
                                                    htmlspecialchars($editData['discount_percentage']) : 
                                                    htmlspecialchars($editData['flat_rate_discount']);
                                           }
                                           ?>">
                                    <span class="input-icon" id="discount-unit">%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="end_date">Expired Date (Optional)</label>
                                <input type="date" id="end_date" name="end_date" class="form-control"
                                       value="<?php echo $isEdit ? htmlspecialchars($editData['end_date'] ?? '') : ''; ?>">
                            </div>
                            <div class="form-buttons">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo $isEdit ? 'Update' : 'Create'; ?>
                                </button>
                                <?php if ($isEdit): ?>
                                    <a href="promo.php" class="btn btn-secondary">Cancel</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="main-table-container">
                    <a><b>Promo List</b></a>
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>ID Promo</th>
                                <th>Promo Name</th>
                                <th>Product ID</th>
                                <th>Product Type</th>
                                <th>Discount Type</th>
                                <th>Discount Value</th>
                                <th>Expired Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="promoTableBody">
                            <?php foreach ($discounts as $discount): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($discount['discount_id']); ?></td>
                                <td><?php echo htmlspecialchars($discount['discount_name']); ?></td>
                                <td><?php echo htmlspecialchars($discount['product_id'] ?? 'All Products'); ?></td>
                                <td><?php echo htmlspecialchars($discount['product_type'] ?? 'All Types'); ?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ', $discount['discount_type'])); ?></td>
                                <td>
                                    <?php 
                                    if ($discount['discount_type'] == 'percentage') {
                                        echo $discount['discount_percentage'] . '%';
                                    } else {
                                        echo 'Rp ' . number_format($discount['flat_rate_discount'], 0, ',', '.');
                                    }
                                    ?>
                                </td>
                                <td><?php echo $discount['end_date'] ? date('d M Y', strtotime($discount['end_date'])) : 'No Limit'; ?></td>
                                <td>
                                    <div class="status-dropdown">
                                        <span class="status-label status-<?php echo strtolower($discount['status']); ?>">
                                            <?php echo $discount['status']; ?>
                                        </span>
                                        <div class="status-options">
                                            <?php if ($discount['status'] != 'Public'): ?>
                                            <form method="POST" action="../includes/crud/crudDiscount.php" style="margin: 0;">
                                                <input type="hidden" name="action" value="update_status">
                                                <input type="hidden" name="discount_id" value="<?php echo $discount['discount_id']; ?>">
                                                <input type="hidden" name="status" value="Public">
                                                <button type="submit" style="background: none; border: none; width: 100%; text-align: left; padding: 8px 12px; cursor: pointer;">Public</button>
                                            </form>
                                            <?php endif; ?>
                                            <?php if ($discount['status'] != 'Private'): ?>
                                            <form method="POST" action="../includes/crud/crudDiscount.php" style="margin: 0;">
                                                <input type="hidden" name="action" value="update_status">
                                                <input type="hidden" name="discount_id" value="<?php echo $discount['discount_id']; ?>">
                                                <input type="hidden" name="status" value="Private">
                                                <button type="submit" style="background: none; border: none; width: 100%; text-align: left; padding: 8px 12px; cursor: pointer;">Private</button>
                                            </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="promo.php?edit=<?php echo $discount['discount_id']; ?>" class="btn-small btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" action="../includes/crud/crudDiscount.php" style="display: inline-block; margin: 0;" 
                                              onsubmit="return confirm('Are you sure you want to delete this promo?')">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="discount_id" value="<?php echo $discount['discount_id']; ?>">
                                            <button type="submit" class="btn-small btn-delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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

        // Toggle discount fields based on type
        function toggleDiscountFields() {
            const discountType = document.getElementById('discount_type').value;
            const discountUnit = document.getElementById('discount-unit');
            
            if (discountType === 'percentage') {
                discountUnit.textContent = '%';
            } else if (discountType === 'flat_rate') {
                discountUnit.textContent = 'Rp';
            }
        }

        // Initialize discount fields on load
        document.addEventListener('DOMContentLoaded', function() {
            toggleDiscountFields();
            
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('promoTableBody');
            const rows = tableBody.getElementsByTagName('tr');
            
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const cells = row.getElementsByTagName('td');
                    let found = false;
                    
                    for (let j = 0; j < cells.length - 1; j++) { // -1 to exclude actions column
                        if (cells[j].textContent.toLowerCase().includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }
                    
                    row.style.display = found ? '' : 'none';
                }
            });
        });
    </script>
</body>
</html>