<?php

require_once '../config/database.php';

//=== Product Model Class ===
class productsModel
{
    private $conn;

    public function __construct()
    {
        $configDB = new database();
        $this->conn = $configDB->dbConnect();
    }

    //=== Get Top Purchased Products From DB Function ===
    function topPurchasedProducts($startDate = null, $endDate = null)
    {
        $query = "SELECT products.id, products.name, count(orders.product_id) as total_purchase ";
        $query .= "FROM `orders` ";
        $query .= "INNER JOIN products on orders.product_id = products.id ";
        if(isset($startDate) && isset($endDate))
        {
            $query .= "where order_date between '".$startDate."' and '".$endDate."' ";
        }
        else
        {
            $query .= "where order_date between (CURRENT_DATE - INTERVAL 1 MONTH) and CURRENT_DATE ";
        }
        $query .= "GROUP BY products.name ";
        $query .= "ORDER BY count(orders.product_id) DESC LIMIT 10 ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //=== End Function ===

}
//=== End Class ===

?>