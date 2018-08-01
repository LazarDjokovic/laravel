//-----------------------Contact form------------------------------------
function nameCheck(){
	var name=document.getElementById("name").value;
	var regName= /^([a-zA-Z' ]+)$/;
	
	
	
	if(name.length==0){
		document.getElementById("name").style.borderColor="";
		document.getElementById("pName").style.display="none";
	}
	else if(!regName.test(name)){
		document.getElementById("name").style.borderColor="red";
		document.getElementById("pName").style.display="block";
		document.getElementById("pName").style.color="red";
	}
	else{
		document.getElementById("name").style.borderColor="";
		document.getElementById("pName").style.display="none";
	}
	
	
}

function emailCheck(){
	var email=document.getElementById("email").value;
	var regEmail=/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/;
	
	if(email.length==0){
		document.getElementById("email").style.borderColor="";
		document.getElementById("pEmail").style.display="none";
	}
	else if(!regEmail.test(email)){
		document.getElementById("email").style.borderColor="red";
		document.getElementById("pEmail").style.display="block";
		document.getElementById("pEmail").style.color="red";
	}
	else{
		document.getElementById("email").style.borderColor="";
		document.getElementById("pEmail").style.display="none";
	}
}

function yourMessageCheck(){
	var yourMessage=document.getElementById("message").value;
	var maxlen = 5000;
	var minlen = 2;
	
	if(yourMessage.length==0){
		document.getElementById("message").style.borderColor="";
		document.getElementById("pMessageS").style.display="none";
		document.getElementById("pMessageL").style.display="none";
	}
	else if(yourMessage.length > maxlen){ 
		document.getElementById("message").style.borderColor="red";
		document.getElementById("pMessageL").style.display="block";
		document.getElementById("pMessageL").style.color="red";
		document.getElementById("pMessageS").style.display="none";
	}
	else if(yourMessage.length < minlen){ 
	    document.getElementById("message").style.borderColor="red";
	    document.getElementById("pMessageS").style.display="block";
		document.getElementById("pMessageS").style.color="red";
		document.getElementById("pMessageL").style.display="none";
	}
	else{
		document.getElementById("message").style.borderColor="";
		document.getElementById("pMessageS").style.display="none";
		document.getElementById("pMessageL").style.display="none";
	}
}


function contactFormCheck(){
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var yourMessage=document.getElementById("message").value;
	
	var regName=/^[A-Z]{1}[a-z]{2,20}$/;
	var regEmail=/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/;
	var maxlen = 5000;
	var minlen = 2;
	
	var errors=0;
	
	
	
	if(!regName.test(name)){
		document.getElementById("name").style.borderColor="red";
		document.getElementById("pName").style.display="block";
		document.getElementById("pName").style.color="red";
		errors++;
	}
	else{
		document.getElementById("name").style.borderColor="";
		document.getElementById("pName").style.display="none";
	}
	
	
	
	
	if(!regEmail.test(email)){
		document.getElementById("email").style.borderColor="red";
		document.getElementById("pEmail").style.display="block";
		document.getElementById("pEmail").style.color="red";
		errors++;
	}
	else{
		document.getElementById("email").style.borderColor="";
		document.getElementById("pEmail").style.display="none";
	}
	
	
	
	
	if(yourMessage.length > maxlen){ 
		document.getElementById("message").style.borderColor="red";
		document.getElementById("pMessageL").style.display="block";
		document.getElementById("pMessageL").style.color="red";
		document.getElementById("pMessageS").style.display="none";
		errors++;
	}
	else if(yourMessage.length < minlen){ 
	    document.getElementById("message").style.borderColor="red";
	    document.getElementById("pMessageS").style.display="block";
		document.getElementById("pMessageS").style.color="red";
		document.getElementById("pMessageL").style.display="none";
		errors++;
	}
	else{
		document.getElementById("message").style.borderColor="";
		document.getElementById("pMessageS").style.display="none";
		document.getElementById("pMessageL").style.display="none";
	}
	
	if(errors!=0){
		return false;
	}else{
		return true;
	}
}
//-----------------------Contact form END------------------------------------






























//--------------------- Register Form-----------------------------------
function firstNameCheck(){
	var firstName=document.getElementById("firstName").value;
	var regFirstName=/^[A-Z]{1}[a-z]{2,20}$/;
	
	if(firstName.length==0){
		document.getElementById("firstName").style.borderColor="";
		document.getElementById("pFirstName").style.display="none";
	}
	else if(!regFirstName.test(firstName)){
		document.getElementById("firstName").style.borderColor="red";
		document.getElementById("pFirstName").style.display="block";
		document.getElementById("pFirstName").style.color="red";
	}
	else{
		document.getElementById("firstName").style.borderColor="";
		document.getElementById("pFirstName").style.display="none";
	}
}

function lastNameCheck(){
	var lastName=document.getElementById("lastName").value;
	var regLastName=/^[A-Z]{1}[a-z]{2,20}$/;
	
	if(lastName.length==0){
		document.getElementById("lastName").style.borderColor="";
		document.getElementById("pLastName").style.display="none";
	}
	else if(!regLastName.test(lastName)){
		document.getElementById("lastName").style.borderColor="red";
		document.getElementById("pLastName").style.display="block";
		document.getElementById("pLastName").style.color="red";
	}
	else{
		document.getElementById("lastName").style.borderColor="";
		document.getElementById("pLastName").style.display="none";
	}
}

function usernameCheck(){
	var username=document.getElementById("usernameReg").value;
	var regUsername=/^[a-zA-z0-9]{3,20}$/;
	
	if(username.length==0){
		document.getElementById("username").style.borderColor="";
		document.getElementById("pUsername").style.display="none";
	}
	else if(!regUsername.test(username)){
		document.getElementById("usernameReg").style.borderColor="red";
		document.getElementById("pUsername").style.display="block";
		document.getElementById("pUsername").style.color="red";
	}
	else{
		document.getElementById("usernameReg").style.borderColor="";
		document.getElementById("pUsername").style.display="none";
	}
}

function emailRegisterCheck(){
	var emailRegister=document.getElementById("emailReg").value;
	var regEamilRegister=/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/;
	
	if(emailRegister.length==0){
		document.getElementById("emailReg").style.borderColor="";
		document.getElementById("pEmailReg").style.display="none";
	}
	else if(!regEamilRegister.test(emailRegister)){
		document.getElementById("emailReg").style.borderColor="red";
		document.getElementById("pEmailReg").style.display="block";
		document.getElementById("pEmailReg").style.color="red";
	}
	else{
		document.getElementById("emailReg").style.borderColor="";
		document.getElementById("pEmailReg").style.display="none";
	}
}

function passwordRegisterCheck(){
	
	var passwordRegister=document.getElementById("passwordReg").value;
	
	var errors=0;
	
	/*
		min 6 characters, max 50 characters
		must contain 1 letter
		must contain 1 number
		may contain special characters like !@#$%^&*()_+
	*/
	
	if (passwordRegister.length < 6) {
		//return("too_short");
		errors++;
	} 
	else if (passwordRegister.length > 50) {
		//return("too_long");
		errors++;
	} 
	else if (passwordRegister.search(/\d/) == -1) {
		//return("no_num");
		errors++;
	} 
	else if (passwordRegister.search(/[a-zA-Z]/) == -1) {
		//return("no_letter");
		errors++;
	} 
	else if (passwordRegister.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
		//return("bad_char");
		errors++;
	}
	
	if(passwordRegister.length==0){
		document.getElementById("passwordReg").style.borderColor="";
		document.getElementById("pPassword").style.display="none";
	}
	else if(errors!=0){
		document.getElementById("passwordReg").style.borderColor="red";
		document.getElementById("pPassword").style.display="block";
		document.getElementById("pPassword").style.color="red";
	}
	else{
		document.getElementById("passwordReg").style.borderColor="";
		document.getElementById("pPassword").style.display="none";
	}
}

function confirmPasswordCheck(){
	var passwordRegister=document.getElementById("passwordReg").value;
	var confirmPassword=document.getElementById("confirmPassword").value;
	
	if(username.length==0){
		document.getElementById("confirmPassword").style.borderColor="";
		document.getElementById("cPassword").style.display="none";
	}
	else if(passwordRegister != confirmPassword){
		document.getElementById("confirmPassword").style.borderColor="red";
		document.getElementById("cPassword").style.display="block";
		document.getElementById("cPassword").style.color="red";
	}
	else{
		document.getElementById("confirmPassword").style.borderColor="";
		document.getElementById("cPassword").style.display="none";
	}
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function registerCheck(){
	var firstName=document.getElementById("firstName").value;
	var regFirstName=/^[A-Z]{1}[a-z]{2,20}$/;
	
	var lastName=document.getElementById("lastName").value;
	var regLastName=/^[A-Z]{1}[a-z]{2,20}$/;
	
	var username=document.getElementById("usernameReg").value;
	var regUsername=/^[a-zA-z0-9]{3,20}$/;
	
	var emailRegister=document.getElementById("emailReg").value;
	var regEamilRegister=/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/;
	
	var passwordRegister=document.getElementById("passwordReg").value;
	var confirmPassword=document.getElementById("confirmPassword").value;
	
	var errors=0;
	
	if(!regFirstName.test(firstName)){
		document.getElementById("firstName").style.borderColor="red";
		document.getElementById("pFirstName").style.display="block";
		document.getElementById("pFirstName").style.color="red";
		errors++;
	}
	else{
		document.getElementById("firstName").style.borderColor="";
		document.getElementById("pFirstName").style.display="none";
	}
	
	if(!regLastName.test(lastName)){
		document.getElementById("lastName").style.borderColor="red";
		document.getElementById("pLastName").style.display="block";
		document.getElementById("pLastName").style.color="red";
		errors++;
	}
	else{
		document.getElementById("lastName").style.borderColor="";
		document.getElementById("pLastName").style.display="none";
	}
	
	if(!regUsername.test(username)){
		document.getElementById("usernameReg").style.borderColor="red";
		document.getElementById("pUsername").style.display="block";
		document.getElementById("pUsername").style.color="red";
		errors++;
	}
	else{
		document.getElementById("usernameReg").style.borderColor="";
		document.getElementById("pUsername").style.display="none";
	}
	
	if(!regEamilRegister.test(emailRegister)){
		document.getElementById("emailReg").style.borderColor="red";
		document.getElementById("pEmailReg").style.display="block";
		document.getElementById("pEmailReg").style.color="red";
		errors++;
	}
	else{
		document.getElementById("emailReg").style.borderColor="";
		document.getElementById("pEmailReg").style.display="none";
	}
	
	
	
	
	
	
	
	
	
	/*
		min 6 characters, max 50 characters
		must contain 1 letter
		must contain 1 number
		may contain special characters like !@#$%^&*()_+
	*/
	var errorsPassword=0;
	if (passwordRegister.length < 6) {
		//return("too_short");
		errorsPassword++;
		errors++;
	} 
	else if (passwordRegister.length > 50) {
		//return("too_long");
		errorsPassword++;
		errors++;
	} 
	else if (passwordRegister.search(/\d/) == -1) {
		//return("no_num");
		errorsPassword++;
		errors++;
	} 
	else if (passwordRegister.search(/[a-zA-Z]/) == -1) {
		//return("no_letter");
		errorsPassword++;
		errors++;
	} 
	else if (passwordRegister.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
		//return("bad_char");
		errorsPassword++;
		errors++;
	}
	
	if(errorsPassword!=0){
		document.getElementById("passwordReg").style.borderColor="red";
		document.getElementById("pPassword").style.display="block";
		document.getElementById("pPassword").style.color="red";
		errors++;
	}
	else{
		document.getElementById("passwordReg").style.borderColor="";
		document.getElementById("pPassword").style.display="none";
	}
	
	
	
	
	
	
	if(passwordRegister != confirmPassword){
		document.getElementById("confirmPassword").style.borderColor="red";
		document.getElementById("cPassword").style.display="block";
		document.getElementById("cPassword").style.color="red";
		errors++;
	}
	else{
		document.getElementById("confirmPassword").style.borderColor="";
		document.getElementById("cPassword").style.display="none";
	}
	
	
	
	
	if(errors!=0){
		return false;
	}else{
		return true;
	}
}
//--------------------- Register Form END-----------------------------------










































//-----------------------Poll start------------------------------------
function listNums(){
	var hr=new XMLHttpRequest();{
		hr.onreadystatechange=function(){
			if(hr.readyState==4 && hr.status==200){
				var nums=hr.responseText.split(", ");
				document.getElementById("count1").innerHTML=nums[0];
				document.getElementById("count2").innerHTML=nums[1];
				document.getElementById("count3").innerHTML=nums[2];
				document.getElementById("count4").innerHTML=nums[3];
				document.getElementById("count5").innerHTML=nums[4];
			}
		}
	}
	hr.open("GET", "getNums.php?t="+Math.random(),true);
	hr.send();
	setTimeout("listNums()",3000);
}





var http;
function ajaxPost(){
	function fv(){
		var form=document.getElementById("pollForm");
		for(var i=0;i<form.length;i++){
			if(form[i].checked){
				var val=form[i].value;
				return(val);
			}
		}
	}
	
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	http.open("GET","voteAjax.php?radio="+fv(),true);
	http.send();
	http.onreadystatechange = function() {
     if (http.readyState == 4 && http.status == 200) {
			document.getElementById("status").innerHTML = http.responseText;
			document.getElementById("radio1").checked=false;
			document.getElementById("radio2").checked=false;
			document.getElementById("radio3").checked=false;
			document.getElementById("radio4").checked=false;
			document.getElementById("radio5").checked=false;
     }
    };
}





























//-----------------------ORDERS start------------------------------------

function numberOfOrders(){
	var http2;
    var idUsersValue=document.getElementById("idUsersValue").value;
	
	if(window.XMLHttpRequest){
		http2=new XMLHttpRequest();
	}else{
		http2=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http2.open("GET","ajaxNumberOfOrdersCheck.php?idUsersValue="+idUsersValue,true);
	http2.send();
	http2.onreadystatechange = function() {
		if (http2.readyState == 4 && http2.status == 200) {
			document.getElementById("numberOfOrders").innerHTML = "<b>"+http2.responseText+"</b>";
		}
    };
}

function addOrders(){
	var http2;
	var http3;
	var idUsersValue=document.getElementById("idUsersValue").value;
	var titleValue=document.getElementById("titleValue").value;
	var idProductValue=document.getElementById("idProductValue").value;
	var dateValue=document.getElementById("dateValue").value;
	var priceValue=document.getElementById("priceValue").value;
	
	if(window.XMLHttpRequest){
		http2=new XMLHttpRequest();
	}else{
		http2=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http2.open("GET","addToCart.php?idUsers="+idUsersValue+"&idProductAdd="+idProductValue+"&titleAdd="+titleValue+"&dateAdd="+dateValue+"&priceAdd="+priceValue,true);
	http2.send();
	http2.onreadystatechange = function() {
		if (http2.readyState == 4 && http2.status == 200) {
			document.getElementById("addToCartButton").style="display:none";
			document.getElementById("productAdded").innerHTML="<b style='color:#337ab7;'>Product is added to your cart</b>";
			//function numberOfOrders();
		}
    };
	
	if(window.XMLHttpRequest){
		http3=new XMLHttpRequest();
	}else{
		http3=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http3.open("GET","ajaxNumberOfOrdersCheck.php?idUsersValue="+idUsersValue,true);
	http3.send();
	http3.onreadystatechange = function() {
		if (http3.readyState == 4 && http3.status == 200) {
			document.getElementById("numberOfOrders").innerHTML = "<b>"+http3.responseText+"</b>";
		}
    };
}
/*
function addAndNumberOfOrders(){
	function numberOfOrders();
	function addOrders();
}*/



























































//-----------------------Likes and Dislikes start------------------------------------
function addLike(){
	var http;
	var idProduct=document.getElementById("idProductValue").value;
	var ipAddress=document.getElementById("ipAddress").value;
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","ajaxLikesOrDislikes.php?idProduct="+idProduct+"&ipAddress="+ipAddress+"&likeOrDislike="+1,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			document.getElementById("spanLikePicture").style.display="none";
			document.getElementById("spanLikePictureAdded").innerHTML="<img src='images/likesDislikes/likeClicked.png'/>";
			var nums=http.responseText.split(", ");
			document.getElementById("likeNumbers").innerHTML="<p>"+nums[0]+"</p>";
			document.getElementById("spanDislikePicture").style.display="none";
			document.getElementById("spanDislikePictureAdded").innerHTML="<img src='images/likesDislikes/dislike.png'/>";
		}
    };
}

function addDislike(){
	var http;
	var idProduct=document.getElementById("idProductValue").value;
	var ipAddress=document.getElementById("ipAddress").value;
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","ajaxLikesOrDislikes.php?idProduct="+idProduct+"&ipAddress="+ipAddress+"&likeOrDislike="+0,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			document.getElementById("spanDislikePicture").style.display="none";
			document.getElementById("spanDislikePictureAdded").innerHTML="<img src='images/likesDislikes/dislikeClicked.png'/>";
			var nums=http.responseText.split(", ");
			document.getElementById("dislikeNumbers").innerHTML="<p>"+nums[1]+"</p>";
			document.getElementById("spanLikePicture").style.display="none";
			document.getElementById("spanLikePictureAdded").innerHTML="<img src='images/likesDislikes/like.png'/>";
		}
    };
}

/*function listLikesAndDislikes(){
	var http;
	var idProduct=document.getElementById("idProductValue").value;
	var likeNumbers=document.getElementById("likeNumbers");
	var dislikeNumbers=document.getElementById("dislikeNumbers");
	
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","ajaxCheckLikesAndDislikes.php?idProduct="+idProduct,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var nums=http.responseText.split(", ");
			idProduct.innerHTML=nums[0];
			likeNumbers.innerHTML=nums[1];
		}
    };
}*/

















































//----------------------- Cancle orders start ------------------------------------
function listOrders(){
	var http;
	var idUser=document.getElementById("idUserOrders").value;
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","listOrders.php?idUser="+idUser,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			document.getElementById("listOrders").innerHTML=http.responseText;
		}
	}
}

function cancleOrders(){
	var http;
	var idUser=document.getElementById("idUserOrders").value;
	var chbOrders=document.getElementsByName("chbOrder");
	var checkedOrders=[];
	
	for (var i=0; i<chbOrders.length; i++){
		if(chbOrders[i].checked){
			checkedOrders.push(chbOrders[i].value);
		}
    }
	
	if(checkedOrders.length==0){
		document.getElementById("cancleOrdersResponse").innerHTML="<p style='color:#ff0000;'>You need to check orders!</p>";
	}
	else{
		
		if(window.XMLHttpRequest){
			http=new XMLHttpRequest();
		}else{
			http=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		http.open("GET","ajaxCancledOrders.php?idUser="+idUser+"&idProducts="+checkedOrders,true);
		http.send();
		http.onreadystatechange = function() {
			if (http.readyState == 4 && http.status == 200) {
				numberOfOrders(); //when we are calling function inside another function we dont need to wrtite function! just the name of the function
				listOrders();
				document.getElementById("cancleOrdersResponse").innerHTML="<p style='color:#ff0000;'>"+http.responseText+"</p>";
			}
		}
	}
}





























//----------------------- Profile picture start ------------------------------------
function listProfilePicture(){
	var http;
	var idUser=document.getElementById("idUserProfile").value;
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","ajaxMyProfile.php?idUser="+idUser,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			document.getElementById("listMyProfile").innerHTML=http.responseText;
		}
	}
}







































//----------------------- List comments start ------------------------------------
function listComments(){
	var idProduct=document.getElementById("idProductValue").value;
	var idUser=document.getElementById("idUsersValue");
	
	if(idUser.value==null){
		idUser=0;
	}
	else{
		idUser=idUser.value;
	}
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","ajaxListComments.php?idUser="+idUser+"&idProduct="+idProduct,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			document.getElementById("listComments").innerHTML=http.responseText;
		}
	}
}

function postComment(){
	var idProduct=document.getElementById("idProductValue").value;
	var idUser=document.getElementById("idUsersValue").value;
	var comment=document.getElementById("taComment").value;
	var username=document.getElementById("idUsernameValue").value;
	var profilePicture=document.getElementById("profilePictureValue").value;
	
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	http.open("GET","ajaxPostComment.php?idUser="+idUser+"&idProduct="+idProduct+"&comment="+comment+"&username="+username+"&profilePicture="+profilePicture,true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			document.getElementById("commentEmptyWarning").innerHTML=http.responseText;
			listComments();
		}
	}
}














