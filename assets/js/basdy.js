$(document).ready(function(e) {
	$("#register").submit(function(e) {
		e.preventDefault();
		form = $(this);

    var submit = $(this).find(":submit");
    submit.button('loading');

		
		$.post("api/register", $(this).serialize(), function(data){
			if (!data.error){
				swal("", data.msg, "success").then(function() {window.location = "login";});;
				submit.button('reset')
				
				
			}
			else{
				swal("", data.msg, "error").then(function() {window.location = "";});;
				submit.button('reset')
			}
		}, "json");
    });
});

$(document).ready(function(e) {
	$("#login").submit(function(e) {
		e.preventDefault();
		form = $(this);

    var submit = $(this).find(":submit");
    submit.button('loading');

		
		$.post("api/login", $(this).serialize(), function(data){
			if (!data.error){
				swal("", data.msg, "success").then(function() {window.location = "dashboard";});;
				submit.button('reset')
				
				
			}
			else{
				swal("", data.msg, "error").then(function() {window.location = "";});;
				submit.button('reset')
			}
		}, "json");
    });
});

$(document).ready(function(e) {
	$("#changepass").submit(function(e) {
		e.preventDefault();
		form = $(this);

    var submit = $(this).find(":submit");
    submit.button('loading');

		
		$.post("api/changepass", $(this).serialize(), function(data){
			if (!data.error){
				swal("", data.msg, "success").then(function() {window.location = "logout";});;
				submit.button('reset')
				
				
			}
			else{
				swal("", data.msg, "error").then(function() {window.location = "";});;
				submit.button('reset')
			}
		}, "json");
    });
});


$(document).ready(function(e) {
	$("#topup").submit(function(e) {
		e.preventDefault();
		form = $(this);

    var submit = $(this).find(":submit");
    submit.button('loading');

		
		$.post("api/topup", $(this).serialize(), function(data){
			if (!data.error){
				swal("", data.msg, "success").then(function() {window.location = "topup";});;
				submit.button('reset')
				
				
			}
			else{
				swal("", data.msg, "error").then(function() {window.location = "";});;
				submit.button('reset')
			}
		}, "json");
    });
});



if(document.domain == 'www.auto.slotx99.com/'){
	var checkdomain = 1;
}
if(document.domain == 'auto.slotx99.com/'){
	var checkdomain = 1;
}
if(checkdomain != 1){
	window.location.replace('https://auto.slotx99.com/);
}



NProgress.start();
var interval = setInterval(function() { NProgress.inc(); }, 1000);        
jQuery(window).load(function () {
    clearInterval(interval);
    NProgress.done();
});
jQuery(window).unload(function () {
    NProgress.start();
});
