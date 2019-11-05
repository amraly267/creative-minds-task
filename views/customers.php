<?php
require_once 'layout/header.php';
require_once '../controllers/customersCtrl.php';

$customersObject = new customersCtrl();
?>


<pre id="json"></pre>

<script>
    var data = <?php $customersObject->getCustomerPurchasesJson()?>;
    document.getElementById("json").innerHTML = JSON.stringify(data, undefined, 2);
</script>