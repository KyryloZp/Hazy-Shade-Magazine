/**
 * Получить данные с формы
 * 
 */
 function getData(obj_form){
 	var hData = {};
 	var select = 0;
 	$(obj_form).find('input','textarea','select').each(function(){
 		if(this.name && this.name != ''){
 			hData[this.name] = this.value;
 		}
 	});

 	$('select').each(function(){
 		select = this.options.selectedIndex;
 		hData[this.name] = this.options[select].value;
 	});
 	return hData;
 }

/**
 * Регистрация нового пользователя
 * 
 */

 function registerNewUser(){
 	var postData = getData('.shoping-cart_billing-form');
 	$.ajax({
 		type: 'POST',
 		url: "/user/register/",
 		data: postData,
 		dataType: 'json',
 		success: function(data){
 			if (data['success']) {
 				alert('success');
 				$('.main-nav_authorize-text').remove();
 				const CLONE_TEMPLATE = $('.main-nav_account-template').contents().clone(true);
 				$('#main-nav_login').append(CLONE_TEMPLATE);
 				$('.main-nav_sign')[0].innerHTML = ( data['userName']);
 				window.location.replace("http://magazine/");

 			} else {
 				alert(data['message']);
 			}
 		},
 		error: function (xhr, ajaxOptions, thrownError) {
 			alert(xhr.status);
 			alert(thrownError);
 			alert(xhr.responseText);
 		},
 		complete: function(data) {
 			console.log(data);
 		}
 	});
 }

