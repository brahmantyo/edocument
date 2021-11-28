$(function() {
    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
			$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			$("#username").focus();
			e.preventDefault();
    });
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
       $("#success-alert").slideUp(500);
    });
});
