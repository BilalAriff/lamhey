<?php

$paymentMethod = new PaymentMethod();
$consultant = new Consultant("consultant");

$paymentMethodList = $paymentMethod->getPaymentMethodsList();

function paymentMethodInput($value) {
    
    $name = $value['pm_name'];
    
    $input = 
    <<<HTML
        <div class="form-group">
            <input class="form-check-input" name="payment_methods[]" type="checkbox" value="$name" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">$name</label>
        </div>
    HTML;
    echo $input;
} 

function paymentList($paymentList) {
    array_map('paymentMethodInput', $paymentList);
}

if (isset($_POST['submit'])) {

    // if (is_array($_POST['payment_methods'])) {
    //     foreach($_POST['payment_methods'] as $value){
            
    //         echo "<br>";
    //         echo $value;
    //         echo "<br>";
    //     }
    //   } else {
    //     $value = $_POST['payment_methods'];
    //     echo $value;
    //   }

    // $data = serialize(array("Red", "Green", "Blue"));
    // echo $data;
    // var_dump(serialize());
    $consultant->addPaymentMethods($_POST['payment_methods'] ,"16");
}
