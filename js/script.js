/*  if remember me button is checked it will autofill email
****NOT WORKING
$(document).ready(function(){
   $("#signInButton").click(function(){
        var userEmail = $("#inputEmail").val();

        //if checked save username as a cookie
        if($("#rememberMeCheck").prop("checked")) {
            $.cookie("rememberedUser", userEmail, {expires: 365 });
        }
    }); 
});*/

//logged in user object constructor
/*function user(id, fName, lName, email, password, type) {
    this.id = id;
    this.fName = fName;
    this.lName = lName;
    this.email = email;
    this.password = password;
    this.type = type;
}*/