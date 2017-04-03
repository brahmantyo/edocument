$("#success-alert").fadeTo(2000, 500).slideDown(500, function(){
   // $("#success-alert").slideUp(500);
});
$("#error-alert").fadeTo(2000, 500).slideDown(500, function(){
   // $("#error-alert").slideUp(500);
});
$('#frmkonsultasi').submit(function(e){
	e.preventDefault();
	var totpertanyaan = $('input[name^=konsultasi]').size()/2;
	var pilihan = $('input[name^=konsultasi]:checked').size();
	if(pilihan < 5){
		alert('Mohon semua jawaban diisi');
	} else {
		$(this).unbind();
		$(this).submit();
	}
});
$(".calendar").datepicker();
$(".calendar").datepicker("option","dateFormat","yy-mm-dd");
$(".calendar").datepicker("setDate",new Date(parent.value));

$("#timepicker").timepicker();


/*$(".calendar").datepicker({
	dateFormat:"yy-mm-dd",
	// dafaultDate: new Date(1980,01,01)
});*/
/*$("#collapse2 input[type='text']").on('focus',function(){
	if(this.value==='NULL'){
		this.value = '';
	}
});
$("#collapse2 input[type='text']").on('blur',function(){
	if(this.value===''){
		this.value = 'NULL';
	}
});*/