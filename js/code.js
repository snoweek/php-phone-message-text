$(function(){
	$("#getcode").click(function(){
		var phonenumber=$("#phonenumber").val().replace(/\s/g,'');//去掉头尾空格
		if(phonenumber.length==0){
			$("#phone_number_error").text("请输入手机号码");
		}else{
			$.ajax({
				type: "post",
				dataType: "json",
				url: "/phone_message_test/create_code.php",
				data: {phonenumber:phonenumber}, 
				success: function(json_message){ 
					var data=(eval(json_message)).send;
					if(data=="success"){
						$("#getcode").val("验证码已发送");	
					}else if(data=="fail"){
						$("#getcode").val("发送失败，请刷新重试");	
					}	
				}	
			});
		}													
	});
		
	$("#testcode").click(function(){
		var phonenumber=$("#phonenumber").val().replace(/\s/g,'');//去掉头尾空格
		var code=$("#code").val();		 
		$.ajax({
			type: "post",  
			dataType: "json",
			url: "/phone_message_test/test_code.php",
			data: {phonenumber:phonenumber,
				code:code
				},
			success: function(json_message){ 
			var data=(eval(json_message)).test_code;
				if(data=="success"){	
					location.href="http://snoweek.github.io";							
				}else if(data=="fail"){
					$("#text_code_error").text("验证失败");
				}
			}
		});		
	});
});
