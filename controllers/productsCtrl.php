<?php

require_once '../models/productsModel.php';

//=== Products Controller Class ===
class productsCtrl
{
    private $productsModelObject;

    function __construct()
    {
        $this->productsModelObject = new productsModel();
    }

    //=== Get Top 10 Purchased Products Function ===
    function getTopProducts($startDate = null, $endDate = null)
    {
        $data = $this->productsModelObject->topPurchasedProducts($startDate, $endDate);
        return json_encode($data);
    }
    //=== End Function ===

    //=== Date Validation Function ===
    function dateValidation($date)
    {
        $year = explode('/', $date)[0];
        $month = explode('/', $date)[1];
        $day = explode('/', $date)[2];
        return checkdate($month, $day, $year);
    }
    //=== End Function ===
}
//=== End Class ===

//=== Check If The Request From Ajax ===
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
{
    if(isset($_GET['function']))
    {
        $data['products'] = [];
        $data['error'] = false;
        $data['errorMsg'] = '';

        $startDate = str_replace(' ', '',explode('-', $_POST['dateRange'])[0]);
        $endDate = str_replace(' ', '',explode('-', $_POST['dateRange'])[1]);

        $prod = new productsCtrl();

        if($prod->dateValidation($startDate) && $prod->dateValidation($endDate))
        {
            if($startDate < $endDate)
            {
                $data['products'] = $prod->getTopProducts($startDate, $endDate);
            }
            else
            {
                $data['error'] = true;
                $data['errorMsg'] = 'Start date is not less than end date';
            }
        }
        else
        {
            $data['error'] = true;
            $data['errorMsg'] = 'End date is not less than  start date';
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
}
//=== End Handling Ajax Request ===

?>