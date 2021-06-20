<?php
$con=mysqli_connect('localhost','root','','sakila');
$rs=mysqli_query($con,"SELECT customer.first_name,customer.last_name,
sum(payment.amount) as paid,customer.email
FROM payment
JOIN customer ON payment.customer_id=customer.customer_id 
");?>
<form method="get">
<table border="1px" align="center">
<tr>
<th colspan="8">Total Paid By Customers</th>
</tr>
<tr>
    <th>S.No.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Total Paid</th>
    <th>E-mail</th>
</tr>
<tr>
<td align="center" colspan="8" align="center">
<a href="store.php">Sale in a store</a>
</td></tr>

<?php if($rs->num_rows>0){
    $index=0;
    while($info=mysqli_fetch_assoc($rs))
    {
        ?>
    <tr>
        
        <td><?=++$index;?></td>
        <td><?=$info['first_name'];?></td>
        <td><?=$info['last_name'];?></td>
        <td><?=$info['paid'];?></td> 
        <td><?=$info['email'];?></td> 
        
     
        
    </tr>
        <?php
    }
}else{
    ?>
    <tr>
    <th colspan="8">Nothing to show</th>
    </tr>
    <?php
}?>
