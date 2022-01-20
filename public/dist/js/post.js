$(document).ready(function(){
    // when the user clicks on like
    $('.star_stroke').on('click', function(){
        var postid = $(this).data('id');
        var userid = $(this).data('user');
            $post = $(this);

        $.ajax({
            url: 'app/action_like.php',
            type: 'post',
            data: {
                'liked': 1,
                'postid': postid,
                'userid': userid
            },
            success: function(response){
                $post.parent().find('span.likes_count').text(response);
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });
    });

    // when the user clicks on unlike
    $('.star_fill').on('click', function(){
        var postid = $(this).data('id');
        var userid = $(this).data('user');
        $post = $(this);

        $.ajax({
            url: 'app/action_like.php',
            type: 'post',
            data: {
                'unliked': 1,
                'postid': postid,
                'userid': userid
            },
            success: function(response){
                $post.parent().find('span.likes_count').text(response);
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });
    });

    // var button1 = $('.option-button1');
    // button1.on('click', function(){
    // 	$('#option1').css('display', 'block');
    // });
    
    // var button4 = $('.option-button4');
    // button4.on('click', function(){
    // 	$('#option4').css('display', 'block');
    // });

});