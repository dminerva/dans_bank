$(document).ready(function(){
   $("#signInButton").click(function(){
        var userEmail = $("#inputEmail").val();

        //if checked save username as a cookie
        if($("#rememberMeCheck").prop("checked")) {
            $.cookie("rememberedUser", userEmail, {expires: 10 });
        }
    }); 
});