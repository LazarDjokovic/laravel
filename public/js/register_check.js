$(document).ready(function(){
    var error_first_name;
    var error_last_name;
    var error_username;
    var error_email;
    var error_password;
    var error_confirm_password;
    var password_checked;
    //First name check onBlur begins
   $('#firstName').blur(function(){
       var first_name=$('#firstName').val();
       if(first_name==""){
           $('#pFirstName').css('display', 'none');
           $('#firstName').css({'border-color':'#CCC','border-width':'0.5px solid'});
           error_first_name=1;
           if(error_first_name==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
           }
       }
       else if(!first_name.match(/^[A-Z]{1}[a-z]{2,20}$/)){
            $('#pFirstName').css({'display':'block','color':'red'});
            $('#firstName').css('border-color','red');
            error_first_name=1;
            if(error_first_name==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
            }
       }
       else{
            $('#pFirstName').css('display', 'none');
            $('#firstName').css({'border-color':'green','border-width':'2px'});
            error_first_name=0;
            if (error_first_name == 0 && error_last_name==0 && error_username==0 && error_email==0 && error_password==0 && error_confirm_password==0){
                $('#btnRegister').removeAttr('disabled');
                $('#btnRegister').removeAttr('title');
            }
       }
   });
   //First name check onBlur ends
   //Last name check onBlur begins
   $('#lastName').blur(function(){
       var last_name=$('#lastName').val();
       if(last_name==""){
           $('#pLastName').css('display', 'none');
           $('#lastName').css({'border-color':'#CCC','border-width':'0.5px solid'});
           error_last_name=1;
           if(error_last_name==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
           }
       }
       else if(!last_name.match(/^[A-Z]{1}[a-z]{2,20}$/)){
            $('#pLastName').css({'display':'block','color':'red'});
            $('#lastName').css('border-color','red');
            error_last_name=1;
            if(error_last_name==1){
                $('#btnRegister').attr('disabled','disabled');
                $('#btnRegister').attr('title','Fill the form first');
            }
       }
       else{
            $('#pLastName').css('display', 'none');
            $('#lastName').css({'border-color':'green','border-width':'2px'});
            error_last_name=0;
            if (error_first_name == 0 && error_last_name==0 && error_username==0 && error_email==0 && error_password==0 && error_confirm_password==0){
                $('#btnRegister').removeAttr('disabled');
                $('#btnRegister').removeAttr('title');
            }
       }
   });
   //Last name check onBlur ends
   //Username check onBlur begins
   $('#usernameReg').blur(function(){
       var username=$('#usernameReg').val();
       if(username==""){
           $('#pUsername').css('display','none');
           $('#usernameReg').css({'border-color':'#CCC','border-width':'0.5px solid'});
           error_username=1;
           if(error_username==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
           }
       }
       else if(!username.match(/^[a-zA-z0-9]{3,20}$/)){
           $('#pUsername').css({'display':'block','color':'red'});
           $('#usernameReg').css('border-color','red');
           error_username=1;
           if(error_username==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
           }
       }
       else{
           $('#pUsername').css('display', 'none');
           $('#usernameReg').css({'border-color':'green','border-width':'2px'});
           error_username=0;
           if (error_first_name == 0 && error_last_name==0 && error_username==0 && error_email==0 && error_password==0 && error_confirm_password==0){
               $('#btnRegister').removeAttr('disabled');
               $('#btnRegister').removeAttr('title');
           }
       }
   });
   //Username check onBlur ends
   //Email check onBlur begins
   $('#emailReg').blur(function(){
       var email=$('#emailReg').val();
       if(email==""){
           $('#pEmailReg').css('display','none');
           $('#emailReg').css({'border-color':'#CCC','border-width':'0.5px solid'});
           error_email=1;
           if(error_email==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
           }
       }
       else if(!email.match(/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/)){
           $('#pEmailReg').css({'display':'block','color':'red'});
           $('#emailReg').css('border-color','red');
           error_email=1;
           if(error_email==1){
               $('#btnRegister').attr('disabled','disabled');
               $('#btnRegister').attr('title','Fill the form first');
           }
       }
       else{
           $('#pEmailReg').css('display', 'none');
           $('#emailReg').css({'border-color':'green','border-width':'2px'});
           error_email=0;
           if (error_first_name == 0 && error_last_name==0 && error_username==0 && error_email==0 && error_password==0 && error_confirm_password==0){
               $('#btnRegister').removeAttr('disabled');
               $('#btnRegister').removeAttr('title');
           }
       }
   });
   //Email check onBlur ends
   //Password check onBlur begins
   $('#passwordReg').blur(function(){
       var password=$('#passwordReg').val();
       if(password==""){
           $('#pPassword').css('display','none');
           $('#passwordReg').css({'border-color':'#CCC','border-width':'0.5px solid'});
           error_password=1;
           if(error_password==1) {
               $('#btnRegister').attr('disabled', 'disabled');
               $('#btnRegister').attr('title', 'Fill the form first');
           }
       }
       else if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\w~@#$%^&*+=`|{}:;!.?\"()\[\]-]{8,25}$/)){
           $('#pPassword').css({'display':'block','color':'red'});
           $('#passwordReg').css('border-color','red');
           error_password=1;
           if(error_password==1) {
               $('#btnRegister').attr('disabled', 'disabled');
               $('#btnRegister').attr('title', 'Fill the form first');
           }
       }
       else{
           $('#pPassword').css('display', 'none');
           $('#passwordReg').css({'border-color':'green','border-width':'2px'});
           error_password=0;
           password_checked=password;
           if (error_first_name == 0 && error_last_name==0 && error_username==0 && error_email==0 && error_password==0 && error_confirm_password==0){
               $('#btnRegister').removeAttr('disabled');
               $('#btnRegister').removeAttr('title');
           }
       }
   });
   //Password check onBlur ends
   //Confirm password onBluer begins
   $('#confirmPassword').blur(function(){
       var confirm_password=$('#confirmPassword').val();
       if(confirm_password==""){
           $('#cPassword').css('display','none');
           $('#confirmPassword').css({'border-color':'#CCC','border-width':'0.5px solid'});
           error_confirm_password=1;
           if(error_confirm_password==1) {
               $('#btnRegister').attr('disabled', 'disabled');
               $('#btnRegister').attr('title', 'Fill the form first');
           }
       }
       else if(confirm_password!=password_checked){
           $('#cPassword').css({'display':'block','color':'red'});
           $('#confirmPassword').css('border-color','red');
           error_confirm_password=1;
           if(error_confirm_password==1) {
               $('#btnRegister').attr('disabled', 'disabled');
               $('#btnRegister').attr('title', 'Fill the form first');
           }
       }
       else{
           $('#cPassword').css('display', 'none');
           $('#confirmPassword').css({'border-color':'green','border-width':'2px'});
           error_confirm_password=0;
           if (error_first_name == 0 && error_last_name==0 && error_username==0 && error_email==0 && error_password==0 && error_confirm_password==0){
               $('#btnRegister').removeAttr('disabled');
               $('#btnRegister').removeAttr('title');
           }
       }
   });
});