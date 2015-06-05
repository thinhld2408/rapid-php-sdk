<?php
/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Common;

class UserDisplayMessage extends ResourceModel
{

    public function getMessage($codes, $lang, $apiContext = null, $restCall = null)
    {
        $data = array(
            "Language"   => $lang,
            "ErrorCodes" => $codes,
        );

        $payLoad = json_encode($data);
        $json = self::executeCall(
            "/staging-au/CodeLookup",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );

        return $json;
    }

}