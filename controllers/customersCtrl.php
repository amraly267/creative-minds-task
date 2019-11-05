<?php

require_once '../models/customersModel.php';

//=== Customer Controller Class ===
class customersCtrl
{
    private $customersModelObject;

    function __construct()
    {
        $this->customersModelObject = new customersModel();
    }
    
    //=== Generate Customer Purchased Products Json Function ===
    function getCustomerPurchasesJson()
    {
        $customerJsonData = [];
        $purchases = $this->customersModelObject->getCustomersPurchases();

        for($i=0; $i<count($purchases); $i++)
        {
            $productsIDs = array_values(array_unique(explode(',', $purchases[$i]['product_id'])));
            $productsNames = array_values(array_unique(explode(',', $purchases[$i]['product_name'])));

            $customerJsonData[$i]['customer_id'] = $purchases[$i]['customer_id'];
            $customerJsonData[$i]['customer_name'] = $purchases[$i]['customer_name'];
                        
            for($ii=0; $ii<count($productsIDs); $ii++)
            {
                $customerJsonData[$i]['products'][$ii]['product_id'] = $productsIDs[$ii];
                $customerJsonData[$i]['products'][$ii]['product_name'] = $productsNames[$ii];   
            }
        }
        echo json_encode($customerJsonData);
    }
    //=== End Function ===
}
//=== End Class ===
    

?>