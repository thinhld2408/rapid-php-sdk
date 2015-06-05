<?php
use Rapid\Type\Enumerated\PaymentMethod;
use Rapid\Type\Enumerated\ShippingMethod;
use Rapid\Type\Enumerated\TransactionType;

// text inputs
$inText = array(
    'Customer' => array(
        'Reference' => array(
            'required'  => false,
            'value'     => 'A12345',
        ),
        'Title' => array(
            'required'  => true,
            'value'     => 'Mr.',
        ),
        'FirstName' => array(
            'required'  => true,
            'value'     => 'John',
        ),
        'LastName' => array(
            'required'  => true,
            'value'     => 'Smith',
        ),
        'CompanyName' => array(
            'required'  => false,
            'value'     => 'Demo Shop 123',
        ),
        'JobDescription' => array(
            'required'  => false,
            'value'     => 'Developer',
        ),
        'Street1' => array(
            'required'  => false,
            'value'     => 'Level 5',
        ),
        'Street2' => array(
            'required'  => false,
            'value'     => '369 Queen Street',
        ),
        'City' => array(
            'required'  => false,
            'value'     => 'Sydney',
        ),
        'State' => array(
            'required'  => false,
            'value'     => 'NSW',
        ),
        'PostalCode' => array(
            'required'  => false,
            'value'     => '2000',
        ),
        'Country' => array(
            'required'  => true,
            'value'     => 'au',
        ),
        'Phone' => array(
            'required'  => false,
            'value'     => '09 889 0986',
        ),
        'Mobile' => array(
            'required'  => false,
            'value'     => '09 889 6542',
        ),
        'Email' => array(
            'required'  => false,
            'value'     => 'demo@example.org',
        ),
        'Url' => array(
            'required'  => false,
            'value'     => 'http://www.ewaypayments.com',
        ),
    ),
    'Payment' => array(
        'TotalAmount' => array(
            'required'  => true,
            'value'     => 100,
        ),
    ),
    'ShippingAddress' => array(
        'FirstName' => array(
            'required'  => false,
            'value'     => 'John',
        ),
        'LastName' => array(
            'required'  => false,
            'value'     => 'Smith',
        ),
        'Street1' => array(
            'required'  => false,
            'value'     => 'Level 5',
        ),
        'Street2' => array(
            'required'  => false,
            'value'     => '369 Queen Street',
        ),
        'City' => array(
            'required'  => false,
            'value'     => 'Sydney',
        ),
        'State' => array(
            'required'  => false,
            'value'     => 'NSW',
        ),
        'Country' => array(
            'required'  => true,
            'value'     => 'au',
        ),
        'PostalCode' => array(
            'required'  => false,
            'value'     => '2000',
        ),
        'Phone' => array(
            'required'  => false,
            'value'     => '09 889 0986',
        ),
    ),
    'Item0' => array(
        'SKU' => array(
            'required'  => false,
            'value'     => '12345678901234567890',
        ),
        'Description' => array(
            'required'  => false,
            'value'     => 'Item Description 1',
        ),
        'Quantity' => array(
            'required'  => false,
            'value'     => 1,
        ),
        'UnitCost' => array(
            'required'  => false,
            'value'     => 400,
        ),
        'Tax' => array(
            'required'  => false,
            'value'     => 100,
        ),
        'Total' => array(
            'required'  => false,
            'value'     => 500,
        ),
    ),
    'Item1' => array(
        'SKU' => array(
            'required'  => false,
            'value'     => '123456789012',
        ),
        'Description' => array(
            'required'  => false,
            'value'     => 'Item Description 2',
        ),
        'Quantity' => array(
            'required'  => false,
            'value'     => 5,
        ),
        'UnitCost' => array(
            'required'  => false,
            'value'     => 200,
        ),
        'Tax' => array(
            'required'  => false,
            'value'     => 50,
        ),
        'Total' => array(
            'required'  => false,
            'value'     => 200,
        ),
    ),
    'PartnerID' => array(
        'required'  => false,
        'value'     => 'ID',
    ),
    'DeviceID' => array(
        'required'  => false,
        'value'     => 'DZPC',
    ),
    'CustomerIP' => array(
        'required'  => false,
        'value'     => '127.0.0.1',
    ),
    'RedirectUrl' => array(
        'required'  => true,
        'value'     => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?s=step3',
    ),
    'CancelUrl' => array(
        'required'  => true,
        'value'     => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?s=cancel',
    ),
    'LogoUrl' => array(
        'required'  => false,
        'value'     => '',
    ),
    'HeaderText' => array(
        'required'  => false,
        'value'     => 'Header Text',
    ),
    'Language' => array(
        'required'  => false,
        'value'     => 'EN',
    ),

);

// option inputs
$refSm = new ReflectionClass('Rapid\Type\Enumerated\ShippingMethod');
$opShippingMethod = $refSm->getConstants();

$refPm = new ReflectionClass('Rapid\Type\Enumerated\PaymentMethod');
$opMethod = $refPm->getConstants();
unset($opMethod['CREATE_TOKEN_CUSTOMER']);
unset($opMethod['UPDATE_TOKEN_CUSTOMER']);

$refTt = new ReflectionClass('Rapid\Type\Enumerated\TransactionType');
$opTransactionType = $refTt->getConstants();

$inOption = array(
    'ShippingMethod'    => array(
        'required'  => false,
        'value'     => $opShippingMethod,
        'default'   => ShippingMethod::NEXT_DAY,
    ),
    'Method'            => array(
        'required'  => true,
        'value'     => $opMethod,
        'default'   => PaymentMethod::PROCESS_PAYMENT,
    ),
    'TransactionType'   => array(
        'required'  => true,
        'value'     => $opTransactionType,
        'default'   => TransactionType::PURCHASE,
    ),
    'CustomerReadOnly' => array(
        'required'  => false,
        'value'     => array('true', 'false'),
        'default'   => false,
    ),
    'VerifyCustomerPhone' => array(
        'required'  => false,
        'value'     => array('true', 'false'),
        'default'   => false,
    ),
    'VerifyCustomerEmail' => array(
        'required'  => false,
        'value'     => array('true', 'false'),
        'default'   => false,
    ),
    'CustomView'        => array(
        'required'  => false,
        'value'     => array('Bootstrap', 'BootstrapAmelia', 'BootstrapCerulean', 'BootstrapCosmo', 'BootstrapCyborg', 'BootstrapFlatly', 'BootstrapJournal', 'BootstrapReadable', 'BootstrapSimplex', 'BootstrapSlate', 'BootstrapSpacelab', 'BootstrapUnited'),
        'default'   => 'Bootstrap',
    ),
);

$formAction = $_SERVER['REQUEST_URI'] . '?s=step2';
?>

<div align="center">
    <h2>Create Transaction: <span style="color: blue">Responsive Shared Page</span></h2>
    <h3>Step 1: Create an access code</h3>
</div>

<form action="<?= $formAction ?>" method="POST">

    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <table border="0" style="border-collapse: collapse" width="50%">

        <?php
        foreach ($inOption as $k => $v) {
            $required = ($v['required']) ? 'required' : '';
            ?>
            <tr>
                <td width="30%"><span><?= $k ?></span></td>
                <td>
                    <select <?= $required ?> name="<?= $k ?>">
                        <?php
                        if (!empty($v['value'])) {
                            foreach ($v['value'] as $item) {
                                $selected = ($v['default'] == $item) ? 'selected' : '';
                                ?>
                                <option <?= $selected ?> value="<?= $item ?>"><?= $item ?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
        <?php
        foreach ($inText as $k => $v) {

            if (!isset($v['required'])) {
                ?>
                <tr id="<?= $k ?>">
                    <td colspan="2"><b>[<?= $k ?>]</b></td>
                </tr>
                <?php
                if (!empty($inText[$k])) {
                    foreach ($inText[$k] as $key => $value) {
                        $required = ($value['required']) ? 'required' : '';
                        ?>
                        <tr class="<?= $k ?>[<?= $key ?>]">
                            <td><span><?= $key ?></span></td>
                            <td>
                                <input type="text" class="<?= $k ?>[<?= $key ?>]" name="<?= $k ?>[<?= $key ?>]" <?= $required ?> value="<?= $value['value'] ?>">
                            </td>
                        </tr>
                    <?php
                    }
                }
            } else {
                $required = ($v['required']) ? 'required' : '';
                ?>
                <tr>
                    <td><span><?= $k ?></span></td>
                    <td>
                        <input type="text" name="<?= $k ?>" <?= $required ?> value="<?= $v['value'] ?>">
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
        <?php
        }
        ?>

        <tr>
            <td colspan="2" align="center">
                <button type="submit">Submit</button>
            </td>
        </tr>

    </table>

</form>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name=Method]').change(function() {

            var value = $(this).val();

            if (value == '<?= PaymentMethod::TOKEN_PAYMENT ?>') {
                $('input[name*=Customer]').each(function() {
                    $(this).removeAttr('required');
                });
                $('tr[class*=Customer]').addClass('hidden');
                $('tr[id=Customer]').after('<tr class="TokenCustomerID"><td width="30%"><span>Token Customer ID</span></td><td><input type="text" class="Customer[TokenCustomerID]" name="Customer[TokenCustomerID]" required value=""></td></tr>');
            } else {

                var requiredInputs = ['Title', 'FirstName', 'LastName', 'Country'];
                for (var i=0; i<requiredInputs.length; i++) {
                    $('input[name="Customer['+ requiredInputs[i] +']"]').attr('required', true);
                }

                $('tr[class=TokenCustomerID]').remove();
                $('tr[class*=Customer]').removeClass('hidden');
            }

        });
    });
</script>
<style type="text/css">
    input[type=text] {
        width: 100%;
    }
    .hidden { visibility: hidden }
</style>


