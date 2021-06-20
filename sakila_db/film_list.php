<?php
$con=mysqli_connect('localhost','root','','sakila');
$rs=mysqli_query($con,"SELECT film.title,film.description,category.name as category,film.rental_rate,film.length,film.rating 
FROM film
JOIN film_category ON film.film_id=film_category.film_id 
JOIN category ON category.category_id=film_category.category_id");?>

<form method="get">
<table border="1px" align="center">
<tr>
<th colspan="7">List of Films</th>
</tr>
<tr>
    <th>film_id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Category</th>
    <th>Rental Rate</th>
    <th>Length</th>
    <th>Rating</th>
</tr>
<tr>
<td align="center" colspan="7" align="center">
<a href="customer_list.php">Check Customer List</a>
</td></tr>
<tr>
<?php if($rs->num_rows>0){
    $index=0;
    while($info=mysqli_fetch_assoc($rs))
    {
        ?>
    <tr>
        
        <td><?=++$index;?></>
        <td><?=$info['title'];?></td>
        <td><?=$info['description'];?></td>
        <td><?=$info['category'];?></td>
        <td><?=$info['rental_rate'];?></td>  
        <td><?=$info['length'];?></td>
        <td><?=$info['rating'];?></td>  
        
    </tr>
        <?php
    }
}else{
    ?>
    <tr>
    <th colspan="7">Nothing to show</th>
    </tr>
    <?php
}?>
