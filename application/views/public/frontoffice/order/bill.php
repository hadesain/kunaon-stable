<table>
	<tr>
		<td align="center"><strong>BILL ORDER</strong></td>
	</tr>
	<tr>
		<td align="center"><strong><?php echo setting('com_name');?></strong></td>
	</tr>
	<tr>
		<td align="center"><?php echo setting('com_address');?></td>
	</tr>
	<tr>
		<td align="center"><small>Phone : <?php echo setting('com_phone');?></small></td>
	</tr>
	 <tr>
		<td colspan="3" align="right"><?php for($i=1;$i<=43;$i++){ echo "="; }  ?></td>
	</tr>
</table>
<table>
	<tr>
		<td>Date</td>
		<td style="width:5%;">:</td>
		<td style="width:50%;"><?php if($paid){ echo my_date($payment->transaction_date); }else { echo "-"; }  ?></td>
	</tr>
	<tr>
		<td>No</td>
		<td>:</td>
		<td><?php if($paid){ echo 'TRN'.$payment->transaction_number; }else { echo "-"; } ?></td>
	</tr>
	<tr>
		<td>Table</td>
		<td >:</td>
		<td><?php echo $table;?></td>
	</tr>
</table>
<br>
<table>
	<tr>
		<td colspan="3" align="right"><?php for($i=1;$i<=75;$i++){ echo "-"; }  ?></td>
	</tr>
	<?php $qty = 0; $data = json_decode($payment->items); foreach($data as $row): ?>
	<tr>
		<td colspan="3"><?php echo $row->menu; ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $row->qty.' x '.price($row->price); ?></td>
		<td><?php echo price($row->total); ?></td>
	</tr>
	<?php $qty+=$row->qty; EndForeach; ?>
</table>
<?php
	$v_subtotal = (float)$payment->subtotal;
	$v_discount = (float)$payment->discount;
	$v_tax = (float)$payment->tax;
	$p_disc = ($v_discount>0) ? floor(100/($v_subtotal/$v_discount)) : 0;
	$p_tax = ($v_tax>0) ? floor(100/($v_subtotal/$v_tax)) : 0;
?>
<table>
	<tr>
		<td colspan="3" align="right"><?php for($i=1;$i<=70;$i++){ echo "-"; }  ?> (+)</td>
	</tr>
	<tr>
		<td></td>
		<td>SUBTOTAL</td>
		<td><?php echo price($payment->subtotal); ?></td>
	</tr>
	<tr>
		<td></td>
		<td>DISCOUNT (<?php echo $p_disc.'%';?>)</td>
		<td><?php echo price($payment->discount); ?></td>
	</tr>
	<tr>
		<td></td>
		<td>SERVICE (<?php echo $p_tax.'%';?>)</td>
		<td><?php echo price($payment->tax); ?></td>
	</tr>
	<tr>
		<td colspan="3" align="right"><?php for($i=1;$i<=70;$i++){ echo "-"; }  ?> (-)</td>
	</tr>
</table>
<br>
<table>
  <tr>
	<td>TOTAL QTY <?php echo $qty;?></td>
	<td>TOTAL</td>
	<td><?php echo price($payment->grandtotal); ?></td>
   </tr>
   <tr>
		<td colspan="3" align="right"><?php for($i=1;$i<=43;$i++){ echo "="; }  ?></td>
   </tr>
</table>
<table>
   <tr>
   	 <td></td>
   	 <td></td>
   	 <td></td>
   </tr>
   <tr>
   	 <td></td>
   	 <td></td>
   	 <td></td>
   </tr>
   <tr>
   	 <td colspan="3" align="center"><?php echo $this->barcode->generateImage($payment->id);?></td>
   </tr>
    <tr>
   	 <td></td>
   	 <td></td>
   	 <td></td>
   </tr>
    <tr>
   	 <td></td>
   	 <td></td>
   	 <td></td>
   </tr>
    <tr>
 	<td colspan="3" align="center"><b>Thank You</b></td>
   </tr>
   <tr>
		<td colspan="3" align="right"><?php for($i=1;$i<=43;$i++){ echo "="; }  ?></td>
   </tr>
</table>
