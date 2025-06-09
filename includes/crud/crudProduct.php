<?php 
require_once(__DIR__ . '/../config.php');

class ProductCRUD {
    
    // Get all products
    public function getAllProducts() {
        $conn = connectDatabase();
        $sql = "SELECT * FROM modapay_products ORDER BY created_at DESC";
        $result = $conn->query($sql);
        
        $products = [];
        if ($result->num_rows > 0) {
            $products = $result->fetch_all(MYSQLI_ASSOC);
        }
        
        $conn->close();
        return $products;
    }
    
    // Get product by ID
    public function getProductById($product_id) {
        $conn = connectDatabase();
        $sql = "SELECT * FROM modapay_products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $product = null;
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }
        
        $stmt->close();
        $conn->close();
        return $product;
    }
    
    // Add new product
    public function addProduct($data) {
        $conn = connectDatabase();
        $sql = "INSERT INTO modapay_products (product_id, product_name, category, description, price, stock_quantity, status_stock, stock_size_s, stock_size_m, stock_size_l, stock_size_xl, photo_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdiiiiiis", 
            $data['product_id'],
            $data['product_name'],
            $data['category'],
            $data['description'],
            $data['price'],
            $data['stock_quantity'],
            $data['status_stock'],
            $data['stock_size_s'],
            $data['stock_size_m'],
            $data['stock_size_l'],
            $data['stock_size_xl'],
            $data['photo_url']
        );
        
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        
        return $success;
    }
    
    // Update product
    public function updateProduct($product_id, $data) {
        $conn = connectDatabase();
        $sql = "UPDATE modapay_products SET 
                product_name = ?, 
                category = ?, 
                description = ?, 
                price = ?, 
                stock_quantity = ?, 
                status_stock = ?, 
                stock_size_s = ?, 
                stock_size_m = ?, 
                stock_size_l = ?, 
                stock_size_xl = ?, 
                photo_url = ? 
                WHERE product_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdiiiiiiis", 
            $data['product_name'],
            $data['category'],
            $data['description'],
            $data['price'],
            $data['stock_quantity'],
            $data['status_stock'],
            $data['stock_size_s'],
            $data['stock_size_m'],
            $data['stock_size_l'],
            $data['stock_size_xl'],
            $data['photo_url'],
            $product_id
        );
        
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        
        return $success;
    }
    
    // Delete product
    public function deleteProduct($product_id) {
        $conn = connectDatabase();
        $sql = "DELETE FROM modapay_products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $product_id);
        
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        
        return $success;
    }
    
    // Get products by category
    public function getProductsByCategory($category) {
        $conn = connectDatabase();
        $sql = "SELECT * FROM modapay_products WHERE category = ? ORDER BY created_at DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $products = [];
        if ($result->num_rows > 0) {
            $products = $result->fetch_all(MYSQLI_ASSOC);
        }
        
        $stmt->close();
        $conn->close();
        return $products;
    }
    
    // Get category statistics
    public function getCategoryStats() {
        $conn = connectDatabase();
        $sql = "SELECT category, COUNT(*) as count, SUM(stock_quantity) as total_stock FROM modapay_products GROUP BY category";
        $result = $conn->query($sql);
        
        $stats = [];
        if ($result->num_rows > 0) {
            $stats = $result->fetch_all(MYSQLI_ASSOC);
        }
        
        $conn->close();
        return $stats;
    }
    
    // Get unique categories from database
    public function getUniqueCategories() {
        $conn = connectDatabase();
        $sql = "SELECT DISTINCT category FROM modapay_products WHERE category IS NOT NULL AND category != '' ORDER BY category ASC";
        $result = $conn->query($sql);
        
        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row['category'];
            }
        }
        
        $conn->close();
        return $categories;
    }
    
    // Format price for display
    public function formatPrice($price) {
        return number_format($price, 0, ',', '.');
    }
    
    // Generate unique product ID
    public function generateProductId() {
        do {
            $product_id = strtoupper(substr(md5(uniqid(rand(), true)), 0, 10));
            $existing = $this->getProductById($product_id);
        } while ($existing !== null);
        
        return $product_id;
    }
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCRUD = new ProductCRUD();
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $data = [
                    'product_id' => $productCRUD->generateProductId(),
                    'product_name' => $_POST['product_name'],
                    'category' => $_POST['category'],
                    'description' => $_POST['description'] ?? '',
                    'price' => floatval($_POST['price']),
                    'stock_quantity' => intval($_POST['stock_size_s']) + intval($_POST['stock_size_m']) + intval($_POST['stock_size_l']) + intval($_POST['stock_size_xl']),
                    'status_stock' => (intval($_POST['stock_size_s']) + intval($_POST['stock_size_m']) + intval($_POST['stock_size_l']) + intval($_POST['stock_size_xl'])) > 0 ? 1 : 0,
                    'stock_size_s' => intval($_POST['stock_size_s']),
                    'stock_size_m' => intval($_POST['stock_size_m']),
                    'stock_size_l' => intval($_POST['stock_size_l']),
                    'stock_size_xl' => intval($_POST['stock_size_xl']),
                    'photo_url' => $_POST['photo_url'] ?? 'https://via.placeholder.com/150x150'
                ];
                
                if ($productCRUD->addProduct($data)) {
                    header("Location: ../inventory.php?success=Product added successfully");
                } else {
                    header("Location: ../inventory.php?error=Failed to add product");
                }
                break;
                
            case 'edit':
                $product_id = $_POST['product_id'];
                $data = [
                    'product_name' => $_POST['product_name'],
                    'category' => $_POST['category'],
                    'description' => $_POST['description'] ?? '',
                    'price' => floatval($_POST['price']),
                    'stock_quantity' => intval($_POST['stock_size_s']) + intval($_POST['stock_size_m']) + intval($_POST['stock_size_l']) + intval($_POST['stock_size_xl']),
                    'status_stock' => (intval($_POST['stock_size_s']) + intval($_POST['stock_size_m']) + intval($_POST['stock_size_l']) + intval($_POST['stock_size_xl'])) > 0 ? 1 : 0,
                    'stock_size_s' => intval($_POST['stock_size_s']),
                    'stock_size_m' => intval($_POST['stock_size_m']),
                    'stock_size_l' => intval($_POST['stock_size_l']),
                    'stock_size_xl' => intval($_POST['stock_size_xl']),
                    'photo_url' => $_POST['photo_url'] ?? 'https://via.placeholder.com/150x150'
                ];
                
                if ($productCRUD->updateProduct($product_id, $data)) {
                    header("Location: ../inventory.php?success=Product updated successfully");
                } else {
                    header("Location: ../inventory.php?error=Failed to update product");
                }
                break;
                
            case 'delete':
                $product_id = $_POST['product_id'];
                
                if ($productCRUD->deleteProduct($product_id)) {
                    header("Location: ../inventory.php?success=Product deleted successfully");
                } else {
                    header("Location: ../inventory.php?error=Failed to delete product");
                }
                break;
        }
    }
    exit;
}
?>