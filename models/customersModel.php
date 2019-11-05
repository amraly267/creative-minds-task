<?php

require_once '../config/database.php';

//=== Customer Model Class ===
class customersModel
{
    private $conn;

    public function __construct()
    {
        $configDB = new database();
        $this->conn = $configDB->dbConnect();
    }

    //=== Get Top Purchased Products From DB Function ===
    function getCustomersPurchases()
    {
        $query = "SELECT DISTINCT customers.id AS customer_id, customers.`name` AS customer_name, GROUP_CONCAT(CAST(products.id AS CHAR)) AS product_id, GROUP_CONCAT(products.`name`) AS product_name ";
        $query .= "FROM `customers` ";
        $query .= "INNER JOIN orders ON customers.id = orders.customer_id ";
        $query .= "INNER JOIN products ON products.id = orders.product_id ";
        $query .= "GROUP BY customers.id ";
        $query .= "ORDER BY customers.id ASC ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //=== End Function ===
}
//=== End Class ===

?>
