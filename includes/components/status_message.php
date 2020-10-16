<?php if(isset($_SESSION['message'])) { ?>
    <div class="row alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php unset($_SESSION['message']); unset($_SESSION['message_type']); };?>

<?php if(isset($_SESSION['login_message'])) { ?>
    <div class="row alert alert-<?=$_SESSION['login_message_type'];?> alert-dismissible fade show" role="alert">
        <?=$_SESSION['login_message'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php unset($_SESSION['login_message']); unset($_SESSION['login_message_type']); };?>