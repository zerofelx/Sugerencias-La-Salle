<?php
    $SID = $suggestions['ID'];

    $id = $suggestions['userid'];
    $query3 = "SELECT * FROM usuarios WHERE ID=$id";
    $UResponse = mysqli_query($conn, $query3);
    $users = mysqli_fetch_array($UResponse);

    $LikesQuery = "SELECT * FROM likes WHERE suggestionid='$SID' AND opinion='1'";
    $LikesResponse = mysqli_query($conn, $LikesQuery);
    $likes = mysqli_fetch_array($LikesResponse);

    $DislikesQuery = "SELECT * FROM likes WHERE suggestionid='$SID' AND opinion='0'";
    $DislikesResponse = mysqli_query($conn, $DislikesQuery);
?>

<div class="row mt-4 card card-body">
    <small>Autor: <?=$users['username'];?></small>
    <div class="text-center">
        <h4><?=$suggestions['titulo']?></h4>
        <p><?=$suggestions['descripcion']?></p>
    </div>
    <div class="text-right">
        <a class="btn btn-secondary" href="database/like.php?action=like&sid=<?=$SID?>&module=<?=$_GET['module_id']?>">
            <i class="far fa-thumbs-up"> <?=mysqli_num_rows($LikesResponse);?></i></a>
        <a class="btn btn-secondary" href="database/like.php?action=dislike&sid=<?=$SID;?>&module=<?=$_GET['module_id']?>">
            <i class="far fa-thumbs-down"> <?=mysqli_num_rows($DislikesResponse);?></i></a>
    </div>
</div>