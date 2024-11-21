<?php
require_once 'database.php';  

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796
// Shuaib Ali, 11-21-24, IT202-001 Phase 05 Assignment Email: sa2796@njit.edu UCID: sa2796


class ElectronicsCategory {
    private $categoryID;
    private $categoryCode;
    private $categoryName;
    private $aisleNumber;
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


    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }


    public function setCategoryCode($categoryCode) {
        $this->categoryCode = $categoryCode;
    }


    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }


    public function setAisleNumber($aisleNumber) {
        $this->aisleNumber = $aisleNumber;
    }


   
    public function save() {
        $conn = getDB();


        $sql = "INSERT INTO ElectronicsCategories (ElectronicsCategoryCode, ElectronicsCategoryName, AisleNumber, DateCreated)
                VALUES (?, ?, ?, NOW())";


        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $this->categoryCode, $this->categoryName, $this->aisleNumber);


        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            echo "Database Error: " . $conn->error;
            $stmt->close();
            return false;
        }
    }


   
    public static function getAllCategories() {
       
        $conn = getDB();


        if ($conn) {
            $sql = "SELECT ElectronicsCategoryID, ElectronicsCategoryCode, ElectronicsCategoryName, AisleNumber FROM ElectronicsCategories";
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


    public static function getCategoryByID($categoryID) {
        $conn = getDB();
        $query = "SELECT * FROM ElectronicsCategories WHERE ElectronicsCategoryID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $categoryID);
        $stmt->execute();
        $result = $stmt->get_result();
   
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
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

    public function getSummaryData() {
        $conn = getDB();
    
        $response = [
            'categoryCount' => 0,
            'productCount' => 0,
            'wholesaleTotal' => 0.0,
            'listTotal' => 0.0
        ];
    
        if ($conn) {
            
            $result = $conn->query("SELECT COUNT(*) AS categoryCount FROM ElectronicsCategories");
            if ($result) {
                $row = $result->fetch_assoc();
                $response['categoryCount'] = $row['categoryCount'];
            }

            $result = $conn->query("SELECT COUNT(*) AS productCount FROM ElectronicsProducts");
        if ($result) {
            $row = $result->fetch_assoc();
            $response['productCount'] = $row['productCount'];
        } else {
            error_log("MySQL error (Product Count): " . $conn->error);
        }
    
            
        $result = $conn->query("SELECT SUM(ElectronicsWholesalePrice) AS wholesaleTotal FROM ElectronicsProducts");
        if ($result) {
            $row = $result->fetch_assoc();
            $response['wholesaleTotal'] = $row['wholesaleTotal'];
        } else {
            error_log("MySQL error (WholesalePrice): " . $conn->error);
        }

        
        $result = $conn->query("SELECT SUM(ElectronicsListPrice) AS listTotal FROM ElectronicsProducts");
        if ($result) {
            $row = $result->fetch_assoc();
            $response['listTotal'] = $row['listTotal'];
        } else {
            error_log("MySQL error (ListPrice): " . $conn->error);
        }

        $conn->close();
    }
    
        return $response; 
    }    

}
?>
