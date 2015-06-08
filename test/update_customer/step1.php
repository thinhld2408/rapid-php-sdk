<form action="<?= $_SERVER['REQUEST_URI'] . '?s=step2' ?>" method="post">

    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <table width="50%">
        <tr>
            <td colspan="30%">Token Customer ID</td>
            <td>
                <input type="text" name="TokenCustomerID" value="" required="true" placeholder="Enter Token Customer ID...">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Submit</button>
            </td>
        </tr>
    </table>

</form>