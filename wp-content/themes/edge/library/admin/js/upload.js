jQuery(document).ready(function(){

	// On Click
	jQuery('.button-unisphere-upload').live("click", function () {
		formfield = jQuery(this).prev('input').attr('id');
		formID = jQuery(this).attr('rel');
		tb_show('', 'media-upload.php?post_id='+formID+'&type=image&amp;TB_iframe=1');
		
		window.original_send_to_editor = window.send_to_editor;
		window.send_to_editor = function(html) {
			if (formfield) {
				itemurl = jQuery(html).attr('href');
				jQuery('#' + formfield).val(itemurl);
				tb_remove();
				window.send_to_editor = window.original_send_to_editor;
			} else {
				window.original_send_to_editor(html);
			}			
		}		
		return false;
	});
    
	
		
	// On Click
	jQuery('.remove-unisphere-upload').live("click", function () {
		formfield = jQuery(this).prev('input').prev('input').attr('id');		
		jQuery('#' + formfield).val('');
		return false;
	});
	
});