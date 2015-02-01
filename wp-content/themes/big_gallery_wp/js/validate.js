

// PHP Validation script
var formUrl = uri+"/php/validate.php?value=";

// Your form's id
var formid = "contactForm";
			
var formError = [];

// Launch the loadForm function while page is loading
window.onload = loadForm;

function loadForm() {
	if(document.getElementById(formid)!=null) {
		var form = document.getElementById(formid);
		form.reset();
		if (document.getElementsByTagName) {
			var formInput = document.getElementsByTagName("input");
			for (var formCount=0; formCount<formInput.length; formCount++) {
				formInput[formCount].onkeyup = function() { return validation(this); }
				formInput[formCount].onblur = function() { return validation(this); }
			}
		}
	
		if (document.getElementsByTagName) {
			var formText = document.getElementsByTagName("textarea");
			for (var formCount=0; formCount<formText.length; formCount++) {
				formText[formCount].onkeyup = function() { return validation(this); }
				formText[formCount].onblur = function() { return validation(this); }
				
			}
		}
	
		var formButt = document.getElementById("submit");
		if(formButt) formButt.onclick = function() { sendEmail();  }
	}
}
http = postHTTPObject();

function postHTTPObject() {

	var xmlhttp;
	/*@cc_on
 
	@if (@_jscript_version >= 5)
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
		try{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}catch(E){
		xmlhttp = false;
	}
	}
	@else
	xmlhttp = false;
	@end @*/
 
	if(!xmlhttp && typeof XMLHttpRequest != 'undefined'){
		try {
			xmlhttp = new XMLHttpRequest();
		} catch(e) {
			xmlhttp = false;
		}
	}
  return xmlhttp;
}

// The main validation function
function validation(formInput) {

	formId = formInput.id;
	formValue = formInput.value;
	getValue = formInput.className;
	if(getValue.indexOf(",") == -1 ) {
		formType = getValue;
		formRequired = "";
	} else {
		formRules = formInput.className.split(",");
		formRequired = formRules[0];
		formType = formRules[1];
	}

	var url = formUrl + (formValue) + "&required=" + (formRequired) + "&type=" + (formType);
	http.open("GET", url, true);
	http.onreadystatechange = handleHttpResponse;
	http.send(null);
}

function sendEmail() {

	http.open("POST", uri+"/php/validate.php");
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.send("mail=1" + "&name=" + (document.getElementById("name").value) + "&email=" + (document.getElementById("email").value)+ "&message=" + (document.getElementById("message").value)+ "&insert_name=" + (document.getElementById("insert_name").value)+ "&insert_email=" + (document.getElementById("insert_email").value)+ "&wrong_email=" + (document.getElementById("wrong_email").value)+ "&insert_message=" + (document.getElementById("insert_message").value)+ "&mail_title=" + (document.getElementById("mail_title").value)+ "&to_email=" + (document.getElementById("to_email").value)+ "&mail_success=" + (document.getElementById("mail_success").value)+ "&mail_error=" + (document.getElementById("mail_error").value)+ "&custom1=" + (document.getElementById("custom1").value)+ "&custom2=" + (document.getElementById("custom2").value)+ "&custom3=" + (document.getElementById("custom3").value)+ "&custom1_title=" + (document.getElementById("custom1_title").value)+ "&custom2_title=" + (document.getElementById("custom2_title").value) + "&custom3_title=" + (document.getElementById("custom3_title").value) + "&capreq=" + (document.getElementById("capreq").value) + "&captcha_code=" + (document.getElementById("captcha_code").value) + "&wrong_captcha=" + (document.getElementById("wrong_captcha").value));

	http.onreadystatechange = handleHttpResponse;
}

function handleHttpResponse() {

	if(http.readyState == 4) {
		if(http.responseText == "false") {
			var formInput = document.getElementById(formId);
			document[formId].src = uri+"/img/no.png";
			formInput.style.border = "1px solid #d12f19";
			formError.push(formId);
		}
		else if(http.responseText == "true") {
			var formInput = document.getElementById(formId);
			document[formId].src = uri+"/img/yes.png";
			formInput.style.border = "1px solid #338800";
		}
		else if(http.responseText == "none") {
			var formInput = document.getElementById(formId);
			document[formId].src =  uri+"/img/blank.png";
			formInput.style.border = "1px solid black";
			
		}
		else if(http.responseText) {
			document.getElementById("comment").innerHTML = http.responseText;
			if( ( http.responseText ).indexOf( 'class="success' ) > -1 ) {
				document.getElementById("contactForm").reset();
				jQuery('input:not([type=submit]):not([type=button]):not([type=hidden])').each(
					function()
					{
						jQuery( this ).css( "border" , "1px solid black" );
						var f_name = jQuery(this).attr("id");
						document[f_name].src =  uri+"/img/blank.png";
					}
				);
				jQuery('textarea').each(
					function()
					{
						jQuery( this ).css( "border" , "1px solid black" );
						var f_name = jQuery(this).attr("id");
						document[f_name].src =  uri+"/img/blank.png";
					}
				);
			}
			if (jQuery('#captcha').length) {
				jQuery('#captcha_code').val('');
				jQuery("#captcha_reload").trigger('click');
			}
				
			//reload shadows
			var settings = {
				//showArrows: true,
				hijackInternalLinks: true
			}
			var pane = jQuery('.scroll-pane');
			pane.jScrollPane(settings);
			var api = pane.data('jsp');
			jQuery('input:not([type=submit]):not([type=button])').each(
				function(index)
				{
					var position = jQuery(this).position();
					jQuery(this).next(".shadow").css("width",jQuery(this).innerWidth());
					jQuery(this).next(".shadow").css("top",position.top + jQuery(this).innerHeight() -7 );
					jQuery(this).next(".shadow").css("left",position.left);
				}
			);

			jQuery('textarea').each(
				function(index)
				{
					var position = jQuery(this).position();
					jQuery(this).next(".shadow").css("width",jQuery(this).innerWidth());
					jQuery(this).next(".shadow").css("top",position.top + jQuery(this).innerHeight() -7 );
					jQuery(this).next(".shadow").css("left",position.left);
				}
			);
			api.reinitialise(); 
			jQuery('.page-footer').children(".shadow-reverse").css("top", jQuery('.page_block').innerHeight() -jQuery('.shadow-reverse').innerHeight()+ 'px'); 
		}
	}
}

