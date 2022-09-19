<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
        $connect = mysqli_connect('localhost','root','','webmusic');
        if(!$connect)
        {
          echo "connection failed";
        }
        $sql="SELECT * FROM song"; 
    ?>
	<table border="1">
    <tr>
        <th>Song Id</th>
        <th>Song Name </th>
        <th>Price </th>
        <th>Images </th>
        <th>Genre Name </th>
        <th>Singer Name </th>
        <th>Action </th>
     </tr>

     
         <?php
         $sql = "SELECT * FROM song ";
        $result = mysqli_query($connect, $sql);
        while($row= mysqli_fetch_array($result)){
               $song_id = $row['song_id'];
               $song_name = $row['song_name'];
               $song_price = $row['song_price'];
               $song_image = $row['song_image'];
               $genre_name = $row['genre_name'];
               $singer_name = $row['singer_name'];

            ?>
        <tr>
            <td> <?php echo $song_id ?></td>

            <td> <?php echo $song_name ?></td>
            <td> <?php echo $song_price ?></td>
            <td> <img src="image/<?php echo $song_image ?>" style ="width: 100px;"></td>
            <td> <?php echo $genre_name ?></td>
            <td> <?php echo $singer_name ?></td>
            <td> <a href="editsong.php?id=<?php echo $song_id ?>">Update Song </a></td>
            <td> <a href="?id=<?php echo $song_id ?>">Delete Song </a></td>
             </tr>
             <?php
             }
             ?>

     
</table>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql="DELETE FROM song where song_id = $id";
    $result=mysqli_query($connect,$sql);
    if($result) {
        echo "<script> alert ('successful delete!')</script>";
    }
} else{
    echo"";
}
?>
</body>
</html>