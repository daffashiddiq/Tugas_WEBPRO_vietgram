<?php
    include 'koneksi.php';

    $search = $_POST['search'];
    $query = "select * from photo where caption like '%".$search."%'";
    // echo $query;
    $result = mysqli_query($koneksi,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    echo $rows;

    if($rows >= 1){
        header("Location: explore.php?caption=$rows");
    }else{
        header("Location: profile.php");
    }
    // header("explore.php");
?>