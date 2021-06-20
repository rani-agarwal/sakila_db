<?php
$con=mysqli_connect('localhost','root','','sakila');
$rs=mysqli_query($con,"SELECT concat(city.city,',',country.country) AS store,
concat(staff.first_name,' ',staff.last_name) AS manager,
sum(payment.amount) AS total_sales 
from payment join 
rental on payment.rental_id = rental.rental_id 
join inventory 
on rental.inventory_id = inventory.inventory_id
join store 
on inventory.store_id = store.store_id
join address
on store.address_id = address.address_id 
join city  on address.city_id = city.city_id 
join country on city.country_id = country.country_id 
join staff on store.manager_staff_id = staff.staff_id
group by store.store_id order by country.country,city.city

");?>
<form method="get">
<table border="1px" align="center">
<tr>
<th colspan="4">List OF Total Sales in a Store</th>
</tr>
<tr>
    <th>S.No.</th>
    <th>Store Location</th>
    <th>Manager Name</th>
    <th>Total Sales</th>
   </tr>
<tr>

<?php if($rs->num_rows>0){
    $index=0;
    while($info=mysqli_fetch_assoc($rs))
    {
        ?>
    <tr>
        
        <td><?=++$index;?></td>
        <td><?=$info['store'];?></td>
        <td><?=$info['manager'];?></td>
        <td><?=$info['total_sales'];?></td> 
         
            
    </tr>
        <?php
    }
}else{
    ?>
    <tr>
    <th colspan="4">Nothing to show</th>
    </tr>
    <?php
}?>
