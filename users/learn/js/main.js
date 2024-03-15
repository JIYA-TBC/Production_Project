function checkCart(){
    $cur_user = $('#spnCurUser').html();
    $.ajax({
        type:'post',
        data:{'user':$cur_user},
        url:'ajaxRequests/checkcart.php',
        success:function (result) {
            $('#cartDiv i.badge').html(result);
        }
    });
}

$(document).ready(function(){

    checkCart();

    $('#toggleBtn').on('click', function(){
        $('#nav-links').toggleClass('openNav');
    });

    $('#filter').on('change', function(){
        //Retrieve the value of the Select Input
        $val = $(this).val();

        // heck and pero
        if($val == 2){
            $('#catFiltSide').slideDown();
            $('#priFiltSide').slideUp();
            $('#braFiltSide').slideUp();
        }else if($val == 3){
            $('#catFiltSide').slideUp();
            $('#priFiltSide').slideDown();
            $('#braFiltSide').slideUp();
        }else if($val == 4){
            $('#catFiltSide').slideUp();
            $('#priFiltSide').slideUp();
            $('#braFiltSide').slideDown();
        }else{
            $('#catFiltSide').slideUp();
            $('#priFiltSide').slideUp();
            $('#braFiltSide').slideUp();
        }
    });

    $('#selCat').on('change', function(){
        $cat = $(this).val();
        $filter = $('#filter').val();
        $.ajax({
            type:'post',
            // data:'category=' + $cat + '&filter='+$filter,
            data:{'category' : $cat , 'filter' : $filter},
            url:'ajaxRequests/fetch_product.php',
            success:function (result) {
                $('#product_container').html(result);
            }
        });
    });

    $('#priceBtn').on('click', function () {
        $filter = $('#filter').val();
        $lowp = $('input[name=lowerp]').val();
        $highp = $('input[name=higherp]').val();
        $.ajax({
            type:'post',
            // data:'category=' + $cat + '&filter='+$filter,
            data:{'low_price' : $lowp ,'high_price' : $highp , 'filter' : $filter},
            url:'ajaxRequests/fetch_product.php',
            success:function (result) {
                $('#product_container').html(result);
            }
        });
    });

    $('#selBrand').on('keyup', function () {
        $filter = $('#filter').val();
        $brand = $('input[name=brand]').val();
        $.ajax({
            type:'post',
            // data:'category=' + $cat + '&filter='+$filter,
            data:{'brand' : $brand , 'filter' : $filter},
            url:'ajaxRequests/fetch_product.php',
            success:function (result) {
                $('#product_container').html(result);
            }
        });
    });

    $('.price_input').on('keyup', function (event) {
        // event.preventDefault();
        $keycode = event.keyCode;
        if($keycode == 13){
            $filter = $('#filter').val();
            $lowp = $('input[name=lowerp]').val();
            $highp = $('input[name=higherp]').val();
            $.ajax({
                type:'post',
                // data:'category=' + $cat + '&filter='+$filter,
                data:{'low_price' : $lowp ,'high_price' : $highp , 'filter' : $filter},
                url:'ajaxRequests/fetch_product.php',
                success:function (result) {
                    $('#product_container').html(result);
                }
            });
        }        
    });

    $('#filter').on('change', function () {
        $filter = $('#filter').val();
        if($filter == 1){
            $.ajax({
                type:'post',
                // data:'category=' + $cat + '&filter='+$filter,
                data:{'filter' : $filter},
                url:'ajaxRequests/fetch_product.php',
                success:function (result) {
                    $('#product_container').html(result);
                }
            });
        }
    });

    $('.add2cart').on('click', function(){
        $pId = $(this).attr('title');
        $cur_user = $('#spnCurUser').html();
        $.ajax({
            type:'post',
            // data:'category=' + $cat + '&filter='+$filter,
            data:{'id' : $pId, 'user':$cur_user},
            url:'ajaxRequests/addcart.php',
            success:function (result) {
                if(result == "added"){
                    $content = '<i class="fa fa-shopping-cart"></i> Remove from cart';
                    $('.add2cart').attr('title', $pId).removeClass('btn-warning');
                    $('.add2cart').attr('title', $pId).addClass('btn-danger');
                    $('.add2cart').attr('title', $pId).html($content);
                }else{
                    $content = '<i class="fa fa-shopping-cart"></i> Add to cart';
                    $('.add2cart').attr('title', $pId).removeClass('btn-danger');
                    $('.add2cart').attr('title', $pId).addClass('btn-primary');
                    $('.add2cart').attr('title', $pId).html($content);
                }
                checkCart();
            }
        });
    });

    $('.closeChat').on('click', function () {
        $('#chatDiv').slideUp(300);
        $('#openChat').slideDown(300);
    });

    $('#openChat').on('click', function () {
        $('#openChat').slideUp(300);
        $('#chatDiv').slideDown(300);
    });

    $('#chatSendBtn').on('click', function(){
        $msg = $('#msg').val();
        $user = $('#aUser').html();
        $.ajax({
            type:'post',
            data:{'message' : $msg, 'user':$user},
            url:'ajaxRequests/sendChat.php',
            success:function (result) {
                if(result == "sent"){
                    $('#msg').val("");
                    displayMsg();
                }
            }
        });
    });

    $('#msg').on('keyup', function(e){
        $key = e.keyCode;
        if($key == 13){
            $msg = $('#msg').val();
            $user = $('#aUser').html();
            $.ajax({
                type:'post',
                data:{'message' : $msg, 'user':$user},
                url:'ajaxRequests/sendChat.php',
                success:function (result) {
                    if(result == "sent"){
                        $('#msg').val("");
                        displayMsg();
                    }
                }
            });
        }
    });
    
    function displayMsg(){
        $user = $('#aUser').html();
        $.ajax({
            type:'post',
            data:{'user':$user},
            url:'ajaxRequests/displayChat.php',
            success:function (result) {
                $('#chatDisplay').html(result);
            }
        });
    }
    displayMsg();
    
    window.setInterval(function(){
        displayMsg();
    }, 500);

});

$(window).scroll(function(){
    $header_height = parseInt($('header').css('height').replace('px',''));
    $nav_height = parseInt($('#nav-logo').css('height').replace('px',''));
    $window_height = $(this).scrollTop();
    if($window_height > $header_height + $nav_height){
        $('#topNav').css({
            'position':'fixed',
            'z-index':'3000'
        });
        $('#topNav').animate({
            top:'0'
        }, "slow")
    }else{
        $('#topNav').css({
            'position':'relative'
        });
    }
    
});

// SHOW SUBJECT

$(document).ready(function(){
    $("#divweek").click(function(){
        $("#divsub").slideToggle("slow");
        $("#divsub2").hide("slow");
        $("#divsub3").hide("slow");
              
        });
});

$(document).ready(function(){
    $("#divweek2").click(function(){
        $("#divsub2").slideToggle("slow");
        $("#divsub").hide("slow");
        $("#divsub3").hide("slow");
              
        });
});

$(document).ready(function(){
    $("#divweek3").click(function(){
        $("#divsub3").slideToggle("slow");
        $("#divsub").hide("slow");
        $("#divsub2").hide("slow");
              
        });
});
