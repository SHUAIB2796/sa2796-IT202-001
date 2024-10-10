<?php
require 'database.php';  

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796


class ElectronicsCategory {
    public $ElectronicsCategoryID;
    public $ElectronicsCategoryCode;
    public $ElectronicsCategoryName;
    public $AisleNumber;
    public $DateCreated;

    public function __construct($code = null, $name = null, $aisle = null) {
        $this->ElectronicsCategoryCode = $code;
        $this->ElectronicsCategoryName = $name;
        $this->AisleNumber = $aisle;
    }

    
    public function save() {
        
        $conn = getDB(); 

        if ($conn) {
            $sql = "INSERT INTO ElectronicsCategories (ElectronicsCategoryCode, ElectronicsCategoryName, AisleNumber, DateCreated)
                    VALUES (?, ?, ?, NOW())";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $this->ElectronicsCategoryCode, $this->ElectronicsCategoryName, $this->AisleNumber);

            if ($stmt->execute()) {
                
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Database connection failed.";
        }
    }

   
    public static function getAllCategories() {
        
        $conn = getDB(); 

        if ($conn) {
            $sql = "SELECT ElectronicsCategoryID, ElectronicsCategoryCode, ElectronicsCategoryName FROM ElectronicsCategories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } else {
            echo "Database connection failed.";
            return [];
        }
    }

    
    public function update($id, $code, $name, $aisle) {
        $conn = getDB(); 
        if ($conn) {
            $sql = "UPDATE ElectronicsCategories SET ElectronicsCategoryCode = ?, ElectronicsCategoryName = ?, AisleNumber = ? WHERE ElectronicsCategoryID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssii", $code, $name, $aisle, $id);
            
            if ($stmt->execute()) {
                
                if ($stmt->affected_rows > 0) {
                    echo "Category updated successfully!";
                } else {
                    echo "No rows updated. Either no changes were made, or the record doesn't exist.";
                }
            } else {
                echo "Error: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "Database connection failed.";
        }
    }
    
    public function delete($id) {
        
        $conn = getDB();

        if ($conn) {
            $sql = "DELETE FROM ElectronicsCategories WHERE ElectronicsCategoryID = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "Category deleted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Database connection failed.";
        }
    }
}
?>
