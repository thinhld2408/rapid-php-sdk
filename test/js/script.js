/**
 * Created by smartoscu on 6/3/15.
 */
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
