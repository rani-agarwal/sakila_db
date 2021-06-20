<?php
$con=mysqli_connect('localhost','root','','sakila');
$rs=mysqli_query($con,"SELECT actor.first_name,actor.last_name,film.title as film_info 
FROM actor 
JOIN film_actor ON actor.actor_id=film_actor.actor_id 
JOIN film ON film.film_id=film_actor.film_id ");?>
<form method="get">
<table border="1px" align="center">
<tr>
<th colspan="4">List of Actors</th>
</tr>
<tr>
<th>Actor Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Title</th>
</tr>
<tr>
<td align="center" colspan="4" align="center">
<a href="film_list.php">Check Film List</a>
</td></tr>
<tr>
<?php if($rs->num_rows>0){
    $index=0;
    while($info=mysqli_fetch_assoc($rs))
    {
        ?>
    <tr>
        <td><?=++$index;?></td>
        <td><?=$info['first_name'];?></td>
        <td><?=$info['last_name'];?></td>
        <td><?=$info['film_info'];?></td>
        <!-- <td><a href="film.php">Film</a></td> -->

        
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

