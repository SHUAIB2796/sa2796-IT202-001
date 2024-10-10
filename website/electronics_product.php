<?php
require 'database.php';  

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796

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
        $sql = "INSERT INTO ElectronicsProducts (ElectronicsProductCode, ElectronicsProductName, ElectronicsDescription, ElectronicsModel, ElectronicsCategoryID, ElectronicsWholesalePrice, ElectronicsListPrice, DateCreated)
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssidd", $this->ElectronicsProductCode, $this->ElectronicsProductName, $this->ElectronicsDescription, $this->ElectronicsModel, $this->ElectronicsCategoryID, $this->ElectronicsWholesalePrice, $this->ElectronicsListPrice);
        
        if (!$stmt->execute()) {
            echo "Error: " . $conn->error;
        }
    
        $stmt->close();
    }
    

    public static function getAllProducts() {
        $conn = getDB();
        $sql = "SELECT ElectronicsProductID, ElectronicsProductCode, ElectronicsProductName, ElectronicsListPrice FROM ElectronicsProducts";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function update($id, $code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice) {
        $conn = getDB();
        $sql = "UPDATE ElectronicsProducts SET ElectronicsProductCode = ?, ElectronicsProductName = ?, ElectronicsDescription = ?, ElectronicsModel = ?, ElectronicsCategoryID = ?, ElectronicsWholesalePrice = ?, ElectronicsListPrice = ?
                WHERE ElectronicsProductID = ?"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiddii", $code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice, $id);
        
        if ($stmt->execute()) {
            echo "Product updated successfully!";
        } else {
            echo "Error: " . $conn->error;
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
