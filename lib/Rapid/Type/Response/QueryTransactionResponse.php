<?php
/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Type\Response;

use Rapid\Type\Regular\Transaction;

class QueryTransactionResponse extends AbstractResponse
{
    protected $transactions = array();

    /**
     * @return mixed
     */
    public function getAccessCode()
    {
        return $this->access_code;
    }

    /**
     * @param mixed $access_code
     * @return $this
     */
    public function setAccessCode($access_code)
    {
        $this->access_code = $access_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param $transactions
     * @return $this
     * @internal param mixed $transaction
     */
    public function setTransactions($transactions)
    {
        $class = 'Rapid\Type\Regular\Transaction';
        if(count($transactions) > 0){
            foreach($transactions as $transaction){
                if ($transaction instanceof $class) {
                    $this->transactions[] = $transaction;
                } else {
                    $this->transactions[] = new Transaction($transaction);
                }
            }
        }
        return $this;
    }

}