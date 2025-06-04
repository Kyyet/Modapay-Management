<?php
require_once(__DIR__ . '/../includes/crud/crudProduct.php');

$productCRUD = new ProductCRUD();

// Get all products
$products = $productCRUD->getAllProducts();

// Get category statistics
$categoryStats = $productCRUD->getCategoryStats();

// Handle success/error messages
$successMessage = isset($_GET['success']) ? $_GET['success'] : '';
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Inventory</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/modalinventory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <style>
        .danger-action {
            background-color: #dc3545;
            color: white;
        }
        
        .danger-action:hover {
            background-color: #c82333;
        }
        
        .alert {
            transition: opacity 0.3s;
        }
        
        .size-option[data-stock="0"] {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .product-actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }
        
        .action-button {
            flex: 1;
            min-width: 60px;
            padding: 5px 8px;
            font-size: 12px;
        }

        .featured-category {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .featured-category:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .featured-category.active-filter {
            background: linear-gradient(135deg, #DE476F, #C23A5F);
            color: white;
        }

        .featured-category.active-filter .available-tag {
            background: rgba(255,255,255,0.2);
        }

        .featured-category.active-filter .category-icon {
            color: white;
        }

        .featured-category.active-filter h3,
        .featured-category.active-filter .category-items {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <img src="../assets/images/ModaPayWarna.png" alt="ModaPay Logo">
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
                <a href="inventory.php" class="menu-item active">
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
                <div class="top-header-left">
                    <div class="table-info">
                        <div class="table-title">Inventory</div>
                        <div class="table-detail">Inventory store detail</div>
                    </div>
                </div>
                
                <div class="header-actions">
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Search items">
                    </div>
                    <button class="icon-button">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="icon-button" id="addProductBtn">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </header>

            <!-- Success/Error Messages -->
            <?php if ($successMessage): ?>
                <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 5px;">
                    <?php echo htmlspecialchars($successMessage); ?>
                </div>
            <?php endif; ?>

            <?php if ($errorMessage): ?>
                <div class="alert alert-error" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin: 10px 0; border-radius: 5px;">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
            
            <!-- Categories -->
            <div class="featured-categories">
                <div class="featured-category primary">
                    <h3>Best Seller Product</h3>
                    <div class="category-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                </div>
                
                <?php 
                $categoryIcons = [
                    'T-Shirt' => 'fas fa-tshirt',
                    'Pants' => 'fas fa-socks',
                    'Dress' => 'fas fa-user-tie'
                ];
                
                foreach ($categoryStats as $stat): 
                    $icon = isset($categoryIcons[$stat['category']]) ? $categoryIcons[$stat['category']] : 'fas fa-box';
                ?>
                <div class="featured-category">
                    <span class="available-tag">Available</span>
                    <h3><?php echo htmlspecialchars($stat['category']); ?></h3>
                    <div class="category-items"><?php echo $stat['count']; ?> items</div>
                    <div class="category-icon">
                        <i class="<?php echo $icon; ?>"></i>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Products Grid -->
            <div class="product-grid" id="productGrid">
                <?php foreach ($products as $product): ?>
                <div class="product-card" data-name="<?php echo htmlspecialchars(strtolower($product['product_name'])); ?>" data-category="<?php echo htmlspecialchars(strtolower($product['category'])); ?>">
                    <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['photo_url']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                    </div>
                    <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
                    <div class="product-price">
                        <div class="current-price">IDR <?php echo number_format($product['price'], 0, ',', '.'); ?></div>
                    </div>
                    <div class="product-stock">Stock: <?php echo $product['stock_quantity']; ?></div>
                    <div class="product-actions">
                        <button class="action-button primary-action detail-btn" 
                                data-id="<?php echo htmlspecialchars($product['product_id']); ?>"
                                data-name="<?php echo htmlspecialchars($product['product_name']); ?>"
                                data-price="<?php echo $product['price']; ?>"
                                data-stock="<?php echo $product['stock_quantity']; ?>"
                                data-stock-s="<?php echo $product['stock_size_s']; ?>"
                                data-stock-m="<?php echo $product['stock_size_m']; ?>"
                                data-stock-l="<?php echo $product['stock_size_l']; ?>"
                                data-stock-xl="<?php echo $product['stock_size_xl']; ?>"
                                data-category="<?php echo htmlspecialchars($product['category']); ?>"
                                data-description="<?php echo htmlspecialchars($product['description']); ?>"
                                data-image="<?php echo htmlspecialchars($product['photo_url']); ?>">
                            Detail Product
                        </button>
                        <button class="action-button secondary-action edit-btn"
                                data-id="<?php echo htmlspecialchars($product['product_id']); ?>">
                            Edit
                        </button>
                        <button class="action-button danger-action delete-btn"
                                data-id="<?php echo htmlspecialchars($product['product_id']); ?>"
                                data-name="<?php echo htmlspecialchars($product['product_name']); ?>">
                            Delete
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <!-- Product Detail Modal -->
    <div class="modal-overlay" id="productDetailModal">
        <div class="modal-container">
            <button class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="modal-body">
                <div class="modal-product-image">
                    <img id="modalProductImage" src="" alt="Product Image">
                </div>
                
                <div class="modal-product-info">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalProductName"></h2>
                        <div class="product-id" id="modalProductId"></div>
                    </div>
                    
                    <div class="modal-price">
                        <div class="modal-current-price" id="modalCurrentPrice"></div>
                    </div>
                    
                    <div class="modal-description" id="modalDescription" style="margin-bottom: 20px; color: #666;"></div>
                    
                    <div class="modal-stock">
                        <div class="stock-label">Available Stock</div>
                        <div class="size-options">
                            <div class="size-option" data-size="s" data-stock="0">S</div>
                            <div class="size-option" data-size="m" data-stock="0">M</div>
                            <div class="size-option" data-size="l" data-stock="0">L</div>
                            <div class="size-option" data-size="xl" data-stock="0">XL</div>
                        </div>
                        <div id="modalStockCount">Stock: 0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Product Add/Edit Modal -->
    <div class="modal-overlay" id="productEditModal">
        <div class="modal-container">
            <button class="modal-close" id="closeEditModal">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="edit-form-container">
                <div class="product-image-container">
                    <div class="upload-image-box">
                        <img id="editModalProductImage" src="https://via.placeholder.com/300x300" alt="Product Image">
                        <div class="camera-overlay">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                </div>
                
                <div class="product-form">
                    <form id="editProductForm" method="POST" action="../includes/crud/crudProduct.php">
                        <input type="hidden" id="formAction" name="action" value="add">
                        <input type="hidden" id="editProductIdHidden" name="product_id" value="">
                        
                        <div class="form-group">
                            <label for="editProductName">Product Name</label>
                            <input type="text" id="editProductName" name="product_name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductId">ID Product</label>
                            <input type="text" id="editProductId" name="product_id_display" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductPrice">Product Price</label>
                            <div class="price-input-wrapper">
                                <span class="currency-prefix">IDR</span>
                                <input type="number" id="editProductPrice" name="price" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductDescription">Description</label>
                            <textarea id="editProductDescription" name="description" class="form-control" rows="3"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Stock</label>
                            <div class="size-stock-grid">
                                <div class="size-item">
                                    <label for="stockS">S :</label>
                                    <input type="number" id="stockS" name="stock_size_s" class="form-control size-input" min="0" value="0">
                                </div>
                                <div class="size-item">
                                    <label for="stockM">M :</label>
                                    <input type="number" id="stockM" name="stock_size_m" class="form-control size-input" min="0" value="0">
                                </div>
                                <div class="size-item">
                                    <label for="stockL">L :</label>
                                    <input type="number" id="stockL" name="stock_size_l" class="form-control size-input" min="0" value="0">
                                </div>
                                <div class="size-item">
                                    <label for="stockXL">XL :</label>
                                    <input type="number" id="stockXL" name="stock_size_xl" class="form-control size-input" min="0" value="0">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductCategory">Category</label>
                            <div class="select-container">
                                <select id="editProductCategory" name="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <option value="Men T-Shirt">Men T-Shirt</option>
                                    <option value="Women T-Shirt">Women T-Shirt</option>
                                    <option value="Pants">Pants</option>
                                    <option value="Dress">Dress</option>
                                </select>
                                <div class="select-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductPhotoUrl">Photo URL</label>
                            <input type="url" id="editProductPhotoUrl" name="photo_url" class="form-control" placeholder="https://example.com/image.jpg">
                        </div>
                        
                        <button type="submit" class="btn-done" id="btnSaveProduct">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal-overlay" id="deleteConfirmModal">
        <div class="modal-container" style="max-width: 400px;">
            <button class="modal-close" id="closeDeleteModal">
                <i class="fas fa-times"></i>
            </button>
            
            <div style="padding: 30px; text-align: center;">
                <i class="fas fa-exclamation-triangle" style="font-size: 48px; color: #f39c12; margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 15px;">Confirm Delete</h3>
                <p id="deleteConfirmText">Are you sure you want to delete this product?</p>
                
                <form id="deleteForm" method="POST" action="../includes/crud/crudProduct.php" style="margin-top: 20px;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" id="deleteProductId" name="product_id" value="">
                    
                    <div style="display: flex; gap: 10px; justify-content: center;">
                        <button type="button" id="cancelDelete" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">Cancel</button>
                        <button type="submit" style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                    </div>
                </form>
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

        // Format price with thousand separator
        function formatPrice(price) {
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Search functionality
        function filterProducts() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach(card => {
                const name = card.dataset.name;
                const category = card.dataset.category;
                
                if (name.includes(searchTerm) || category.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Open the detail modal
        function openDetailModal(productData) {
            document.getElementById('modalProductName').textContent = productData.name;
            document.getElementById('modalProductId').textContent = 'ID Product: ' + productData.id;
            document.getElementById('modalCurrentPrice').textContent = 'IDR ' + formatPrice(productData.price);
            document.getElementById('modalDescription').textContent = productData.description || 'No description available';
            document.getElementById('modalProductImage').src = productData.image;
            document.getElementById('modalProductImage').alt = productData.name;
            
            // Update size options with stock data
            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                const size = option.dataset.size;
                const stockKey = 'stock' + size.toUpperCase();
                const stock = productData[stockKey] || 0;
                option.dataset.stock = stock;
                option.textContent = size.toUpperCase() + ' (' + stock + ')';
                
                if (stock > 0) {
                    option.style.display = 'flex';
                } else {
                    option.style.display = 'none';
                }
            });
            
            // Select first available size
            const firstAvailable = document.querySelector('.size-option[data-stock]:not([data-stock="0"])');
            if (firstAvailable) {
                sizeOptions.forEach(opt => opt.classList.remove('active'));
                firstAvailable.classList.add('active');
                document.getElementById('modalStockCount').textContent = 'Stock: ' + firstAvailable.dataset.stock;
            } else {
                document.getElementById('modalStockCount').textContent = 'Stock: 0';
            }
            
            const modal = document.getElementById('productDetailModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close the detail modal
        function closeDetailModal() {
            const modal = document.getElementById('productDetailModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Open the edit modal
        function openEditModal(productData = null) {
            const isEdit = productData !== null;
            
            if (isEdit) {
                document.getElementById('formAction').value = 'edit';
                document.getElementById('editProductIdHidden').value = productData.id;
                document.getElementById('editProductId').value = productData.id;
                document.getElementById('editProductName').value = productData.name;
                document.getElementById('editProductPrice').value = productData.price;
                document.getElementById('editProductDescription').value = productData.description || '';
                document.getElementById('stockS').value = productData.stockS || 0;
                document.getElementById('stockM').value = productData.stockM || 0;
                document.getElementById('stockL').value = productData.stockL || 0;
                document.getElementById('stockXL').value = productData.stockXL || 0;
                document.getElementById('editProductCategory').value = productData.category || '';
                document.getElementById('editProductPhotoUrl').value = productData.image || '';
                document.getElementById('editModalProductImage').src = productData.image || 'https://via.placeholder.com/300x300';
                document.getElementById('btnSaveProduct').textContent = 'Update Product';
            } else {
                document.getElementById('formAction').value = 'add';
                document.getElementById('editProductIdHidden').value = '';
                document.getElementById('editProductId').value = 'Auto Generated';
                document.getElementById('editProductForm').reset();
                document.getElementById('editModalProductImage').src = 'https://via.placeholder.com/300x300';
                document.getElementById('btnSaveProduct').textContent = 'Add Product';
            }

            const modal = document.getElementById('productEditModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close the edit modal
        function closeEditModal() {
            const modal = document.getElementById('productEditModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Open delete confirmation modal
        function openDeleteModal(productId, productName) {
            document.getElementById('deleteProductId').value = productId;
            document.getElementById('deleteConfirmText').textContent = `Are you sure you want to delete "${productName}"?`;
            
            const modal = document.getElementById('deleteConfirmModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close delete modal
        function closeDeleteModal() {
            const modal = document.getElementById('deleteConfirmModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Initialize event listeners when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Update time immediately and set interval
            updateTime();
            setInterval(updateTime, 1000);
            
            // Search functionality
            document.getElementById('searchInput').addEventListener('input', filterProducts);
            
            // Add product button
            document.getElementById('addProductBtn').addEventListener('click', function() {
                openEditModal();
            });
            
            // Detail Modal Event Listeners
            document.getElementById('closeModal').addEventListener('click', closeDetailModal);
            document.getElementById('productDetailModal').addEventListener('click', function(e) {
                if (e.target === this) closeDetailModal();
            });

            // Size option selection
            document.querySelectorAll('.size-option').forEach(option => {
                option.addEventListener('click', function() {
                    if (this.dataset.stock > 0) {
                        document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('active'));
                        this.classList.add('active');
                        document.getElementById('modalStockCount').textContent = 'Stock: ' + this.dataset.stock;
                    }
                });
            });

            // Detail buttons
            document.querySelectorAll('.detail-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productData = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        price: parseInt(this.dataset.price),
                        stock: parseInt(this.dataset.stock),
                        stockS: parseInt(this.dataset.stockS),
                        stockM: parseInt(this.dataset.stockM),
                        stockL: parseInt(this.dataset.stockL),
                        stockXL: parseInt(this.dataset.stockXl),
                        category: this.dataset.category,
                        description: this.dataset.description,
                        image: this.dataset.image
                    };
                    openDetailModal(productData);
                });
            });

            // Edit Modal Event Listeners
            document.getElementById('closeEditModal').addEventListener('click', closeEditModal);
            document.getElementById('productEditModal').addEventListener('click', function(e) {
                if (e.target === this) closeEditModal();
            });

            // Edit buttons
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productCard = this.closest('.product-card');
                    const detailBtn = productCard.querySelector('.detail-btn');
                    
                    const productData = {
                        id: detailBtn.dataset.id,
                        name: detailBtn.dataset.name,
                        price: parseInt(detailBtn.dataset.price),
                        stockS: parseInt(detailBtn.dataset.stockS),
                        stockM: parseInt(detailBtn.dataset.stockM),
                        stockL: parseInt(detailBtn.dataset.stockL),
                        stockXL: parseInt(detailBtn.dataset.stockXl),
                        category: detailBtn.dataset.category,
                        description: detailBtn.dataset.description,
                        image: detailBtn.dataset.image
                    };
                    
                    openEditModal(productData);
                });
            });

            // Delete Modal Event Listeners
            document.getElementById('closeDeleteModal').addEventListener('click', closeDeleteModal);
            document.getElementById('cancelDelete').addEventListener('click', closeDeleteModal);
            document.getElementById('deleteConfirmModal').addEventListener('click', function(e) {
                if (e.target === this) closeDeleteModal();
            });

            // Delete buttons
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.id;
                    const productName = this.dataset.name;
                    openDeleteModal(productId, productName);
                });
            });

            // Photo URL input change
            document.getElementById('editProductPhotoUrl').addEventListener('input', function() {
                const url = this.value;
                if (url) {
                    document.getElementById('editModalProductImage').src = url;
                } else {
                    document.getElementById('editModalProductImage').src = 'https://via.placeholder.com/300x300';
                }
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                });
            }, 5000);
        });
    </script>
</body>
</html>