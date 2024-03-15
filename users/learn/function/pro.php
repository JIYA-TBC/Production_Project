<?php

    if($fetch->mname == "" && $fetch->state == "" && $fetch->addr == "" && $fetch->profile_p == "" && $fetch->vaccage == ""  ){ 

        echo "<span style='color:red;'>0%</span>"; 

    }elseif($fetch->mname == !"" && $fetch->state == "" && $fetch->addr == "" && $fetch->profile_p == "" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == !"" && $fetch->addr == "" && $fetch->profile_p == "" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == "" && $fetch->addr == !"" && $fetch->profile_p == "" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == "" && $fetch->addr == "" && $fetch->profile_p == !"" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == "" && $fetch->addr == "" && $fetch->profile_p == "" && $fetch->vaccage == !"" ){ 

        echo "<span style='color:red;'>25%</span>"; 

    }elseif($fetch->mname == !"" && $fetch->state == !"" && $fetch->addr == "" && $fetch->profile_p == "" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == !"" && $fetch->addr == !"" && $fetch->profile_p == "" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == "" && $fetch->addr == !"" && $fetch->profile_p == !"" && $fetch->vaccage == "" || 
    $fetch->mname == "" && $fetch->state == "" && $fetch->addr == "" && $fetch->profile_p == !"" && $fetch->vaccage == !""){

        echo "<span style='color:orange;'>50%</span>"; 

    }elseif($fetch->mname == !"" && $fetch->state == !"" && $fetch->addr == !"" && $fetch->profile_p == "" && $fetch->vaccage == "" ||
    $fetch->mname == "" && $fetch->state == "" && $fetch->addr == !"" && $fetch->profile_p == !"" && $fetch->vaccage == !"" ){

        echo "<span style='color:orange;'>65%</span>"; 
        
    }elseif($fetch->mname == !"" && $fetch->state == !"" && $fetch->addr == !"" && $fetch->profile_p == !"" && $fetch->vaccage == "" ||
    $fetch->mname == "" && $fetch->state == !"" && $fetch->addr == !"" && $fetch->profile_p == !"" && $fetch->vaccage == !"" ){

        echo "<span style='color:orange;'>75%</span>"; 
    }
    else{

        echo "<span style='color:green;'>100%</span>"; 
    }
?>