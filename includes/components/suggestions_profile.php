<?php
    $SID = $suggestions['ID'];

    $module_id = $suggestions['moduloid'];
    $ModuleQuery = "SELECT * FROM modulos WHERE ID='$module_id'";
    $ModuleQueryResponse = mysqli_query($conn, $ModuleQuery);
    $Module = mysqli_fetch_array($ModuleQueryResponse);

    $LikesQuery = "SELECT * FROM likes WHERE suggestionid='$SID' AND opinion='1'";
    $LikesResponse = mysqli_query($conn, $LikesQuery);
    $likes = mysqli_fetch_array($LikesResponse);

    $DislikesQuery = "SELECT * FROM likes WHERE suggestionid='$SID' AND opinion='0'";
    $DislikesResponse = mysqli_query($conn, $DislikesQuery);

    $CommentsQuery = "SELECT * FROM comments WHERE suggestionid='$SID'";
    $CommentsResponse = mysqli_query($conn, $CommentsQuery);
?>

<div class="row mt-4 card card-body">
    <small class="text-right">Módulo: <a href="mdetails.php?module_id=<?=$module_id?>"><?=$Module['Modulo']?></a></small>
    <div class="text-center">
        <h4><?=$suggestions['titulo']?></h4>
        <p><?=$suggestions['descripcion']?></p>
    </div>
    <div class="text-right">
        <a class="btn" href="database/like.php?action=like&sid=<?=$SID?>&module=<?=$module_id?>">
            <i class="far fa-thumbs-up"> <?=mysqli_num_rows($LikesResponse);?></i></a>
        <a class="btn" href="database/like.php?action=dislike&sid=<?=$SID;?>&module=<?=$module_id?>">
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
                $UserComments = mysqli_fetch_array($UCResponse);?>
                <div class="card card-body">
                    <p><span class="h5"><?=ucfirst($UserComments['username']);?> dice: </span> <?=$comments['descripcion'];?></p>
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
