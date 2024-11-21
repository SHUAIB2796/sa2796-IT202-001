<?php
require_once 'database.php';  

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796
// Shuaib Ali, 11-21-24, IT202-001 Phase 05 Assignment Email: sa2796@njit.edu UCID: sa2796

class ElectronicsProduct {
    public $ElectronicsProductID;
    public $ElectronicsProductCode;
    public $ElectronicsProductName;
    public $ElectronicsDescription;
    public $ElectronicsModel;  
    public $ElectronicsCategoryID;
    public $ElectronicsWholesalePrice;
    public $ElectronicsListPrice;
    public $DateCreated;

    public function __construct($code = null, $name = null, $description = null, $model = null, $categoryID = null, $wholesalePrice = null, $listPrice = null) {
        $this->ElectronicsProductCode = $code;
        $this->ElectronicsProductName = $name;
        $this->ElectronicsDescription = $description;
        $this->ElectronicsModel = $model;  
        $this->ElectronicsCategoryID = $categoryID;
        $this->ElectronicsWholesalePrice = $wholesalePrice;
        $this->ElectronicsListPrice = $listPrice;
    }

    public function save() {
        $conn = getDB();
    
        
        if (!$conn) {
            echo "Error: Unable to connect to the database.";
            return false;
        }
    
        $sql = "INSERT INTO ElectronicsProducts 
                (ElectronicsProductCode, ElectronicsProductName, ElectronicsDescription, 
                 ElectronicsModel, ElectronicsCategoryID, ElectronicsWholesalePrice, 
                 ElectronicsListPrice, DateCreated)
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
                
        $stmt = $conn->prepare($sql);
        
        
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            return false;
        }
    
        
        if (!$stmt->bind_param("ssssidd", $this->ElectronicsProductCode, $this->ElectronicsProductName, $this->ElectronicsDescription, $this->ElectronicsModel, $this->ElectronicsCategoryID, $this->ElectronicsWholesalePrice, $this->ElectronicsListPrice)) {
            echo "Error binding parameters: " . $stmt->error;
            return false;
        }
        
        
        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
            return false;
        }
    
        
        $stmt->close();
        $conn->close();
        return true;
    }
    
    

    public static function getAllProducts() {
        $conn = getDB();
        $sql = "SELECT ElectronicsProductID, ElectronicsProductCode, ElectronicsProductName, ElectronicsDescription, ElectronicsModel, ElectronicsCategoryID, ElectronicsWholesalePrice, ElectronicsListPrice FROM ElectronicsProducts";
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    

    public static function getProductByID($productID) {
        $conn = getDB();
        $sql = "SELECT * FROM ElectronicsProducts WHERE ElectronicsProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    
        $stmt->close();
    }
    
    public function update($id, $code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice) {
        $conn = getDB();
        $sql = "UPDATE ElectronicsProducts SET 
                    ElectronicsProductCode = ?, 
                    ElectronicsProductName = ?, 
                    ElectronicsDescription = ?, 
                    ElectronicsModel = ?, 
                    ElectronicsCategoryID = ?, 
                    ElectronicsWholesalePrice = ?, 
                    ElectronicsListPrice = ? 
                WHERE ElectronicsProductID = ?"; 
    
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssddii", $code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice, $id);
    
        if ($stmt->execute()) {
            
            echo "<h2>Product updated successfully!</h2>";
            echo "<a href='index.php?content=list_electronics_products'>Go back to List Products</a>";
            $stmt->close();
            exit(); 
        } else {
           
            echo "<h2>Error updating product: " . $conn->error . "</h2>";
        }
    
        $stmt->close();
    }
    
    public function delete($id) {
        $conn = getDB();
        $sql = "DELETE FROM ElectronicsProducts WHERE ElectronicsProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Product deleted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    }


}
?>
