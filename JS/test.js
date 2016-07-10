$(document).ready(function(){

    $("#testbutton").bind('click',function(){

        var name = $("#name").val();

        $.ajax({
            url:'ajax/method/test',
            type:'post',
            data:{name:name},
            success:function(result){

                $("#test_content").html("<p>"+result+"</p>");
            }
        });

    });


    $("#testbutton2").bind('click',function(){

        var name2 = $("#name2").val();

        $.ajax({
            url:'ajax/method/test2',
            type:'post',
            data:{name2:name2},
            success:function(result){

                $("#test_content2").html("<p>"+result+"</p>");
            }
        });

    });

    $("#auth_button").bind('click',function(){


        var auth_login = $("#auth_login").val();
        var auth_password = $("#auth_password").val();


        $.ajax({
            url:'ajax/method/auth',
            type:'post',
            data:{auth_login:auth_login,auth_password:auth_password},
            success:function(result){

                $("#auth_message").html("<p>"+result+"</p>");
            }
        });



    });



});