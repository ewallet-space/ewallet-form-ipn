<?php

//Your ID
$merchantid = '0';

//How much you charge
$amount = '4.99';

//ITEMID for IPN
$itemid =  '0';

//USERID for IPN
$userid = '0';

//URL for IPN
$ipn = 'https://example.org/ipn.php';

?>
<form action="https://ewallet.space/pay.php" method="post">
	<input type="hidden" name="pmi" value="<?php echo $merchantid; ?>">
	<input type="hidden" name="pa" value="<?php echo $amount; ?>">
	<input type="hidden" name="ii" value="<?php echo $itemid; ?>">
	<input type="hidden" name="ui" value="<?php echo $userid; ?>">
	<input type="hidden" name="ipn" value="<?php echo $ipn; ?>">
	<input type="submit" value="Buy now">
</form>