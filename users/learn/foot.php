<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>
</div>

<!-- Footer Starts Here  -->
<?php 
if(isset($_SESSION['active_chat'])){
    $iconClass = "chatClose";
    $chatDivClass = "chatOpen";
}else{
    $iconClass = "chatOpen";
    $chatDivClass = "chatClose";
}
?>
<i class="fa fa-comments <?php echo $iconClass; ?> text-success" id="openChat">
<p style="font-size:18px;" class="text-success">Chat Us</p>
</i>
<div id="chatDiv" class="<?php echo $chatDivClass; ?>">
    <?php
     if(isset($_SESSION['active_chat'])){
    ?>
        <!-- HTML HERE -->
        <div class="card">
            <div class="card-header bg-success" style="color:#fff;">
                <span><i class="fa fa-comments"></i> <span>Chat with Us</span></span>
                <i class="fa fa-close closeChat" style="cursor: pointer;"></i>
                <span id="aUser" style="display:none;"><?php echo $_SESSION['active_chat']; ?></span>
            </div>
            <div class="card-body" style="height:270px; padding:0;">
                <div id="chatDisplay">

                </div>
                <div id="dvSendChat">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Here" id="msg" />
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="chatSendBtn">
                                <i class="fa fa-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <button type="submit" name="endchat" class="btn btn-default" style="width:100%; position:absolute; bottom:0;"> <i class="fa fa-close"></i> End Chat</button>
                    <?php
                        if(isset($_POST['endchat'])){
                            session_unset($_SESSION['active_chat']);
                        }
                    ?>
                </form>
            </div>
        </div>

    <?php
     }else{
    ?>
        <!-- HTML HERE -->
        <div class="card">
            <div class="card-header bg-success" style="color:#fff;">
                <span><i class="fa fa-comments"></i> <span>Chat with Us</span></span>
                <i class="fa fa-close closeChat" style="cursor: pointer;"></i>
            </div>
            <div class="card-body" style="height:270px; padding:0 10px;">
                <?php
                    if(isset($_POST['startchat'])){
                        $user_id = $_SESSION['cur_user'];
                        $fullname = $_POST['username'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $queryCheckChat = $con->query("SELECT * FROM chatuser WHERE email='$email' AND phone='$phone'");
                        if($queryCheckChat->num_rows > 0){
                            $_SESSION['active_chat'] = $user_id;
                            echo "<p style='color:green;'>Redirecting you to text page in 1 seconds...</p>";
                                echo "<meta http-equiv='Refresh' content='1; url=index.php'>";
                        }else{
                            $queryInsertChat = $con->query("INSERT INTO chatuser(user_id, fullname, phone, email) VALUES('".$user_id."','".$fullname."','".$phone."','".$email."')");
                            if($queryInsertChat == true){
                                $_SESSION['active_chat'] = $user_id;

                                                                
                            }
                            
                        }
                    }
                ?>
                <form method="post">
                    <div class="inputDiv">
                        <div><i class="fa fa-user"></i> Fullname:</div>
                        <input type="text" class="form-control" name="username" value="<?php echo $sn." ".$fn." ".$ln; ?>" readonly required />
                    </div>
                    <div class="inputDiv">
                        <div><i class="fa fa-phone"></i> Phone:</div>
                        <input type="tel" class="form-control" name="phone" value="<?php echo $ph; ?>" readonly />
                    </div>
                    <div class="inputDiv">
                        <div><i class="fa fa-envelope-o"></i> Email:</div>
                        <input type="email" class="form-control" name="email" value="<?php echo $mail; ?>" readonly />
                    </div>
                    <div class="inputDiv">
                        <button class="btn btn-success" type="submit" name="startchat">Start Chat</button>
                    </div>
                </form>
            </div>
        </div>
    <?php
     }
     ?>
</div>