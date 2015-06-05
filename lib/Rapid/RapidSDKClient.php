<?php
/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid;

use Rapid\Api\AccessCode;
use Rapid\Api\AccessCodeShared;
use Rapid\Auth\BasicAuthCredential;
use Rapid\Common\ResourceModel;
use Rapid\Core\Constants;
use Rapid\Core\LoggingLevel;
use Rapid\Rest\ApiContext;
use Rapid\Type\Enumerated\PaymentMethod;
use Rapid\Type\Enumerated\TransactionType;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Refund;
use Rapid\Type\Regular\Transaction;
use Rapid\Type\Response\CancelAuthorisationResponse;
use Rapid\Type\Response\CapturePaymentResponse;
use Rapid\Type\Response\CreateAccessCodeResponse;
use Rapid\Type\Response\CreateCustomerResponse;
use Rapid\Type\Response\CreateTransactionResponse;
use Rapid\Type\Response\QueryAccessCodeResponse;
use Rapid\Type\Response\QueryCustomerResponse;
use Rapid\Type\Response\QueryTransactionResponse;
use Rapid\Type\Response\RefundResponse;

class RapidSDKClient extends ResourceModel
{
    private $change_credential = true;
    protected $api_context;
    protected $is_valid;
    protected $error_codes;
    protected $rapid_endpoint;
    protected $credential;
    protected $configs = array(
        'mode'             => Constants::MODE_SANDBOX,
        'language'         => 'EN',
        'log.LogEnabled'   => true,
        'log.FileName'     => 'rapidapi.log',
        'log.LogLevel'     => LoggingLevel::DEBUG,
        'validation.level' => 'log',
    );

    /**
     * @param $api_key
     * @param $api_password
     * @param $mode
     * @param $configs
     */
    public function __construct($api_key = null, $api_password = null, $mode = Constants::MODE_SANDBOX, $configs = array())
    {

        $this->configs = array_merge($this->configs, $configs);
        $url_endpoint = Constants::REST_SANDBOX_ENDPOINT;

        if (strtoupper(trim($mode)) == Constants::MODE_LIVE) {
            $this->configs['mode'] = Constants::MODE_LIVE;
            $url_endpoint = Constants::REST_LIVE_ENDPOINT;
        }

        $this->setRapidEndpoint($url_endpoint);
        $this->setCredential($api_key, $api_password);
    }

    /**
     * @param $api_key
     * @param $api_password
     * @return $this
     */
    public function setCredential($api_key, $api_password)
    {
        $this->change_credential = true;
        $this->credential = new BasicAuthCredential($api_key, $api_password);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @return mixed
     */
    public function getApiContext()
    {
        if ($this->change_credential) {
            $this->api_context = new ApiContext($this->getCredential());
            $this->change_credential = false;
        }

        return $this->api_context;
    }

    /**
     * Deprecated
     * @param mixed $api_context
     * @return $this
     */
    public function setApiContext(ApiContext $api_context)
    {
        $this->api_context = $api_context;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->is_valid;
    }

    /**
     * @param mixed $is_valid
     */
    public function setIsValid($is_valid)
    {
        $this->is_valid = $is_valid;
    }

    /**
     * @return mixed
     */
    public function getErrorCodes()
    {
        return $this->error_codes;
    }

    /**
     * @param mixed $error_codes
     */
    public function setErrorCodes($error_codes)
    {
        $this->error_codes = $error_codes;
    }

    /**
     * @return mixed
     */
    public function getRapidEndpoint()
    {
        return $this->rapid_endpoint;
    }

    /**
     * @param mixed $rapid_endpoint
     */
    public function setRapidEndpoint($rapid_endpoint)
    {
        $this->rapid_endpoint = $rapid_endpoint;
    }

    /**
     * @return mixed
     */
    public function getConfigs()
    {
        return $this->configs;
    }

    /**
     * @param mixed $configs
     */
    public function setConfigs($configs)
    {
        $this->configs = $configs;
    }

    /**
     * Creates a token customer to store card details in the secure eWay Vault
     * for charging later.
     * @param Customer $customer
     * @return CreateCustomerResponse
     */
    function createCustomer(Customer $customer)
    {
        $payment = new PaymentDetails(array(
            "TotalAmount" => 0
        ));
        $path = "/Transaction";
        $data = array(
            "Customer"        => $customer->toArray(),
            "Method"          => PaymentMethod::CREATE_TOKEN_CUSTOMER,
            "Payment"         => $payment->toArray(),
            "TransactionType" => TransactionType::PURCHASE
        );

        $payLoad = json_encode($data);
        $json = self::executeCall(
            $path,
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new CreateCustomerResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Update Customer Token
     * To update a Token Customer, use the same process as a transaction in any of the available eWAY Rapid payment methods
     * (Transparent Redirection, Direct Connection, Responsive Shared Page) with the following details
     * @param Customer $customer
     * @return CreateCustomerResponse
     */
    function updateCustomer(Customer $customer)
    {
        $path = "/Transaction";
        $payment = new PaymentDetails(array(
            "TotalAmount" => 0
        ));
        $data = array(
            "Customer"        => $customer->toArray(),
            "Method"          => PaymentMethod::UPDATE_TOKEN_CUSTOMER,
            "Payment"         => $payment->toArray(),
            "TransactionType" => TransactionType::PURCHASE
        );

        $payLoad = json_encode($data);
        $json = self::executeCall(
            $path,
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new CreateCustomerResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Retrieve customer details from the vault.
     * @param $token_customer_id
     * @return CreateCustomerResponse
     */
    function queryCustomer($token_customer_id)
    {
        $json = self::executeCall(
            "/Customer/{$token_customer_id}",
            "GET",
            array(),
            null,
            $this->getApiContext(),
            null
        );

        $response = new QueryCustomerResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Create Access code
     * @param AccessCode $access_code
     * @return CreateTransactionResponse
     */
    function createAccessCode(AccessCode $access_code)
    {
        $payLoad = $access_code->toJSON();
        $json = self::executeCall(
            "/AccessCodes",
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new CreateAccessCodeResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * REQUEST THE RESULTS
     * @param string $access_code
     * @return QueryAccessCodeResponse
     */
    function queryAccessCode($access_code)
    {
        $json = self::executeCall(
            "/AccessCode/{$access_code}",
            "GET",
            null,
            null,
            $this->getApiContext(),
            null
        );

        $response = new QueryAccessCodeResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Create Access Code Shared
     * @param AccessCodeShared $access_code_shared
     * @return CreateAccessCodeResponse
     */
    function createAccessCodeShared(AccessCodeShared $access_code_shared)
    {
        $payLoad = $access_code_shared->toJSON();
        $json = self::executeCall(
            "/AccessCodesShared",
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new CreateAccessCodeResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Create a transaction either using an Authorisation, the responsive shared
     * page, transparent redirect, or direct as the source of funds.
     * @param Transaction $transaction
     * @return string
     */
    function createTransaction(Transaction $transaction)
    {
        $path = "/Transaction";

        $payLoad = $transaction->toJSON();
        $json = self::executeCall(
            $path,
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new CreateTransactionResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Get transaction status
     * In order to request complete details about a transaction, eWAY’s Transaction Query API can be used.
     * @param string $access_code Enter Access code or Transaction id
     * @return object
     */
    function queryTransaction($access_code)
    {
        $json = self::executeCall(
            "/Transaction/{$access_code}",
            "GET",
            array(),
            null,
            $this->getApiContext(),
            null
        );

        $response = new QueryTransactionResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * Full and partial refunds can be processed for any transaction in eWAY.
     * Note: Before accessing the direct refund API you must add the Refund ability to your API user role.
     * @param $transaction_id
     * @param Refund $refund
     * @return RefundResponse
     */
    function refundTransaction($transaction_id, Refund $refund)
    {
        $path = "/Transaction/{$transaction_id}/Refund";

        $payLoad = $refund->toJSON();
        $json = self::executeCall(
            $path,
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new RefundResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * PRE-AUTH
     *
     * eWAY's PreAuth solution allows merchants to reserve funds on a customer's credit card without charging it.
     * They can then login to MYeWAY and confirm the transaction at their convenience.
     * This service is perfect for merchants whose prices are dependent on variable costs
     * Please note that PreAuth is currently only available for Australian merchants
     *
     * Authorisation
     * To authorise a payment, use the same process as a transaction in any of the available payment methods
     * (Transparent Redirection, Direct Connection, Responsive Shared Page) with the "Method" set to "Authorise".
     * Remember to store the Transaction ID so that you can Capture or Cancel the payment!
     */

    /**
     * Once a payment has been authorised, the money can be withdrawn with a Capture request
     * @param $transaction_id
     * @param PaymentDetails $payment
     * @return CapturePaymentResponse
     */
    function capturePayment($transaction_id, PaymentDetails $payment)
    {
        $path = "/CapturePayment";
        $data = array(
            "TransactionId" => $transaction_id,
            "Payment"       => $payment->toArray()
        );
        $payLoad = json_encode($data);
        $json = self::executeCall(
            $path,
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );
        $response = new CapturePaymentResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }

    /**
     * @param $transaction_id
     * @return CancelAuthorisationResponse
     */
    function cancelAuthorisation($transaction_id)
    {
        $path = "/CancelAuthorisation";
        $data = array(
            "TransactionId" => $transaction_id,
        );
        $payLoad = json_encode($data);
        $json = self::executeCall(
            $path,
            "POST",
            $payLoad,
            null,
            $this->getApiContext(),
            null
        );

        $response = new CancelAuthorisationResponse($json);
        // $response->prepareMessages($this->getApiContext(), $this->configs['language']);
        return $response;
    }
}