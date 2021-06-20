<?php
$con=mysqli_connect('localhost','root','','sakila');
$rs=mysqli_query($con,"SELECT staff.first_name,staff.last_name,
address.address,address.phone,city.city,country.country
FROM staff
JOIN address ON staff.address_id=address.address_id 
JOIN city ON address.city_id=city.city_id
JOIN country ON city.country_id=country.country_id");?>
<form method="get">
<table border="1px" align="center">
<tr>
<th colspan="8">Information Of Customers</th>
</tr>
<tr>
    <th>S.No.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>City</th>
    <th>Country</th>
</tr>
<tr>
<td align="center" colspan="8" align="center">
<a href="paid_list.php">Total Paid By Customer List</a>
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
        <td><?=$info['address'];?></td> 
        <td><?=$info['phone'];?></td> 
        <td><?=$info['city'];?></td> 
        <td><?=$info['country'];?></td> 
     
        
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
