<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "includes/db.php" ?>
<?php include "includes/function_constituent.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Maruti Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/maruti-style.css" />
<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB7Tce0Xd3GEb838FF5uRcIe8MQIRdQSo&sensor=false"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<style>
#registration-step{margin:0;padding:0;}
#registration-step li{list-style:none; float:left;padding:5px 10px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
#registration-step li.highlight{background-color:#EEE;}
#registration-form{clear:both;border:1px #EEE solid;padding:20px;}
.demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.registration-error{color:#FF0000; padding-left:15px;}
.message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
.btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>

function validate() {
var output = true;
$(".registration-error").html('');
if($("#account-field").css('display') != 'none') {
	if(!($("#name").val())) {
		output = false;
		$("#name-error").html("required");
	}	
    if(!($("#address").val())) {
		output = false;
		$("#address-error").html("required");
	}
    if(!($("#gender").val())) {
		output = false;
		$("#gender-error").html("required");
	}

}

if($("#password-field").css('display') != 'none') {
	if(!($("#purpose").val())) {
		output = false;
		$("#purpose_error").html("required");
	}	

}

if($("#general-field").css('display') != 'none') {
	if(!($("#amount").val())) {
		output = false;
		$("#amount_error").html("required");
	}	

}
return output;
}
$(document).ready(function() {
	$("#next").click(function(){
		var output = validate();
		if(output) {
			var current = $(".highlight");
			var next = $(".highlight").next("li");
			if(next.length>0) {
				$("#"+current.attr("id")+"-field").hide();
				$("#"+next.attr("id")+"-field").show();
				$("#back").show();
				$("#finish").hide();
				$(".highlight").removeClass("highlight");
				next.addClass("highlight");
				if($(".highlight").attr("id") == $("li").last().attr("id")) {
					$("#next").hide();
					$("#finish").show();	
                    $("#preview").show();	
				}
			}
		}
	});
	$("#back").click(function(){ 
		var current = $(".highlight");
		var prev = $(".highlight").prev("li");
		if(prev.length>0) {
			$("#"+current.attr("id")+"-field").hide();
			$("#"+prev.attr("id")+"-field").show();
			$("#next").show();
			$("#finish").hide();
			$(".highlight").removeClass("highlight");
			prev.addClass("highlight");
			if($(".highlight").attr("id") == $("li").first().attr("id")) {
				$("#back").hide();			
			}
		}
	});
});
</script>

</head>