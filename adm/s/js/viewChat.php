<style type="text/css">
    .sending, .recieving{
        margin:3px 0;
        color: white;
    }
    .sending span{
        padding:2px 5px;
        background-color:blue;
        border-radius: 0 7px 7px 0;
    }
    .recieving{
        text-align:right;
    }
    .recieving span{
        padding:2px 5px;
        background-color:orange;
        border-radius: 7px 0 0 7px ;
    }
</style>
<?php
    $curUser = $_POST['userid'];

    include "../../../connect.php";

    // Updating the status
    $UpdateChats = mysqli_query($con, "UPDATE livechat set status='read' WHERE sender='$curUser' OR reciever='$curUser'");


    $chatsQuery = mysqli_query($con, "SELECT * FROM livechat WHERE sender='$curUser' OR reciever='$curUser'");
    if($chatsQuery->num_rows > 0){
        while($chats = $chatsQuery->fetch_assoc()){
            $status = $chats['status'];
            $sender = $chats['sender'];

            if($sender == $curUser){
                $class = "sending";
            }else{
                $class = "recieving";
            }
    ?>

            <div class="<?php echo $class ?>">
                <span><?php echo $chats['message'] ?></span>
            </div>
    <?php
        }
    }
?>