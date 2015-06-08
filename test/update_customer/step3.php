<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\CardDetails;
use Rapid\Type\Regular\Customer;

if (isset($_POST['form_key'])) {

    $rapidSdk = new RapidSDK();
    $rapidSdkClient = $rapidSdk->createSDKClient(API_KEY, API_PASSWORD);

    $customer = $_POST['Customer'];
    $card = $_POST['CardDetails'];

    $cardDetails = new CardDetails($_POST['CardDetails']);

    $customer = new Customer(array(
        "Reference"      => $customer['Reference'],
        "Title"          => $customer['Title'],
        "FirstName"      => $customer['FirstName'],
        "LastName"       => $customer['LastName'],
        "CompanyName"    => $customer['CompanyName'],
        "JobDescription" => $customer['JobDescription'],
        "Street1"        => $customer['Street1'],
        "Street2"        => $customer['Street2'],
        "City"           => $customer['City'],
        "State"          => $customer['State'],
        "PostalCode"     => $customer['PostalCode'],
        "Country"        => $customer['Country'],
        "Phone"          => $customer['Phone'],
        "Mobile"         => $customer['Mobile'],
        "Email"          => $customer['Email'],
        "Url"            => $customer['Url'],
        "TokenCustomerID"   => $_POST['TokenCustomerID'],
        "CardDetails"    => $cardDetails,
    ));
    $createCustomerResponse = $rapidSdkClient->updateCustomer($customer);

    $errors = $createCustomerResponse->getErrors();
    if (!empty($errors)) {
        print '<pre>'; print_r($errors); die;
    } else {
        print '<pre>'; print_r($createCustomerResponse->getCustomer()); die;
    }
}