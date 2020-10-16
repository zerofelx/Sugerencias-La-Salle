<?php
    $SID = $suggestions['ID'];

    $id = $suggestions['userid'];
    $query3 = "SELECT * FROM usuarios WHERE ID=$id";
    $UResponse = mysqli_query($conn, $query3);
    $users = mysqli_fetch_array($UResponse);

    $LikesQuery = "SELECT * FROM likes WHERE suggestionid='$SID' AND opinion='1'";
    $LikesResponse = mysqli_query($conn, $LikesQuery);

    $DislikesQuery = "SELECT * FROM likes WHERE suggestionid='$SID' AND opinion='0'";
    $DislikesResponse = mysqli_query($conn, $DislikesQuery);

    $CommentsQuery = "SELECT * FROM comments WHERE suggestionid='$SID'";
    $CommentsResponse = mysqli_query($conn, $CommentsQuery);
?>

<div class="row mt-4 card card-body">
    <?php
        if($_SESSION['rol'] == "admin") {?>
            <div class="row">    
                <a class="ml-2" href="database/admin_tools.php?delete_suggestion=<?=$suggestions['ID']?>&module=<?=$_GET['module_id']?>">
                    <i class="far fa-trash-alt"></i>
                </a>
                <a class="ml-2" href="database/admin_tools.php?ban_user=<?=$users['ID']?>&module=<?=$_GET['module_id']?>">
                    <i class="fas fa-ban"></i>
                </a>
            </div>
        <?php
        }
    ?>
    <small class="text-right">Autor: <?=ucfirst($users['username']);?></small>
    <small class="text-right">Fecha: <?=$suggestions['fecha']?></small>
    <div class="text-center">
        <h4><?=$suggestions['titulo']?></h4>
        <p><?=$suggestions['descripcion']?></p>
    </div>
    <div class="text-right">
        <a class="btn" href="database/like.php?action=like&sid=<?=$SID?>&module=<?=$_GET['module_id']?>">
            <i class="far fa-thumbs-up"> <?=mysqli_num_rows($LikesResponse);?></i></a>
        <a class="btn" href="database/like.php?action=dislike&sid=<?=$SID;?>&module=<?=$_GET['module_id']?>">
            <i class="far fa-thumbs-down"> <?=mysqli_num_rows($DislikesResponse);?></i></a>
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <?php
            while ($comments = mysqli_fetch_array($CommentsResponse)) {
                $ucid = $comments['userid'];
                $UserCommentsQuery = "SELECT username FROM usuarios WHERE ID='$ucid'";
                $UCResponse = mysqli_query($conn, $UserCommentsQuery);
                $UserComments = mysqli_fetch_array($UCResponse);
                ?>

                <div class="card card-body">
                    <p>
                        <?php
                            if($_SESSION['rol'] == "admin") {?>
                                <a href="database/admin_tools.php?delete_comment=<?=$comments['ID']?>&module=<?=$_GET['module_id']?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a class="ml-2" href="database/admin_tools.php?ban_user=<?=$comments['userid']?>&module=<?=$_GET['module_id']?>">
                                    <i class="fas fa-ban"></i>
                                </a>
                            <?php
                            }
                        ?>
                    <span class="h5"><?=ucfirst($UserComments['username']);?> dice: </span> <?=$comments['descripcion'];?></p>
                </div>

        <?php } if(isset($_SESSION['user_id'])) {?>
        <form class="row" action="/database/send_comment.php?suggestion=<?=$suggestions['ID']?>&module=<?=$suggestions['moduloid']?>" method="POST">
            <div class="col-md-10">
                <div class="form-group">
                    <input maxlength="250" type="text" name="comment" id="comment" class="form-control" placeholder="Escribe un comentario">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" value="Enviar" class="form-control btn-success block" name="send_comment">
                </div>
            </div>
        </form>
        <?php }; ?>
    </div>
</div>
