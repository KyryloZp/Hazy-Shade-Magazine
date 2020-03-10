  
	/**
	 * Добавление аттрибута select для option select
	 * 
	 */
$(document).ready(function() {
	 var country = $('select').data('value');
	 $('select').each(function(){
	 	var opt = $("option[value=" + country +"]");
	 	html = $("<div>").append(opt.clone()).html();
	 	html = html.replace(/\>/, ' selected="selected">');
	 	opt.replaceWith(html);
	 });
});



/**
 * Присвоить новые данные пользователю
 * 
 */

 function updateUserData(){
 	var postData = getData('.registr_form');
 	console.log(postData);
 	$.ajax({
 		type: 'POST',
 		url: "/editaccount/update/",
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
 		}
 	});
 }