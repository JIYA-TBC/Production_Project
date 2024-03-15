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
session_start();
    $curUser = $_POST['user'];

    include "../connect.php";

    $chatsQuery = $con->query("SELECT * FROM livechat WHERE sender='$curUser' OR reciever='$curUser'");
    if($chatsQuery->num_rows > 0){
        while($chats = $chatsQuery->fetch_assoc()){
            $status = $chats['status'];
            $sender = $chats['sender'];
            
            if($status == "unread"){
                $icon = '<i class="fa fa-spinner spin" style="color:orange; font-size:0.7em;"></i>';
            }else{
                $icon = '<i class="fa fa-check" style="color:green; font-size:0.7em;"></i>';
            }

            if($sender == $curUser){
                ?>
                    <div class="sending">
                        <span><?php echo $chats['message'] ?></span> <?php echo $icon; ?>
                    </div>
                <?php
            }else{
                ?>
                    <div class="recieving">
                        <span><?php echo $chats['message'] ?></span>
                    </div>
                <?php
            }
        }
    }
?>