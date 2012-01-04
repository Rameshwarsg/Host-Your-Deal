/* Cufon font */
Cufon.replace('h1:not(.small,.medium,.large), h2, h3, h4, h5, h6, .nav > li > a, .portfolio-1-column-list .portfolio-title, .portfolio-4-columns-list .portfolio-title a, .portfolio-browse, .post-title, .testimonial-meta .testimonial-person, .bar-info-box span', { hover: true });

jQuery(document).ready(function() {

	/* Dropdown menu using superfish */
	jQuery('.nav').supersubs({
		minWidth: 12,
		maxWidth: 25,
		extraWidth: 1
	}).superfish({
		delay: 250,
		animation: { opacity: 'show', height: 'show' },
		speed: 'fast',
		autoArrows: false 
	})
	.find('ul')
	.bgIframe({ 
		opacity: false 
	});
	
	/* Add html separators between widgets */
	jQuery("#secondary .widget:not(:last-child), .footer-column .widget:not(:last-child)").each( function() { 
        jQuery(this).after('<div class="hr"><hr /></div>');;
    });

	/* Quicksand animation and filtering of the Portfolio */
	var data = jQuery(".portfolio-1-column-list, .portfolio-4-columns-list").clone();

	jQuery('.portfolio-filters li').click(function(e) {

		jQuery(".portfolio-filters li a").removeClass("active");

		var filterClass = jQuery(this).attr('class');

		if (filterClass == 'all') {
			var filteredData = data.find('.portfolio-item');
		} else {
			var filteredData = data.find('.portfolio-item[data-type*=' + filterClass + ']');
		}

		jQuery('.portfolio-1-column-list, .portfolio-4-columns-list').quicksand(filteredData, {
			duration: 500,
			easing: 'easeInOutExpo',
			adjustHeight: 'dynamic',
			enhancement: function() {
				Cufon.replace('.portfolio-1-column-list .portfolio-title, .portfolio-4-columns-list .portfolio-title a', { hover: true });
			}
		}, function(){
			// end callback
			SetLightbox(true);
		});

		jQuery(this).children('a').removeClass("active");
		jQuery(this).children('a').addClass("active");

		return false;
	});

	
	/* Ajax Contact form validation and submit */
	jQuery('form#contactForm').submit(function() {
		jQuery(this).find('.error').remove();
		var hasError = false;
		jQuery(this).find('.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				jQuery(this).addClass('input-error');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					jQuery(this).addClass('input-error');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			jQuery(this).find('#unisphere-submit').fadeOut('normal', function() {
				jQuery(this).parent().parent().find('.sending-message').show('normal');
			});
			var formInput = jQuery(this).serialize();
			var contactForm = jQuery(this);
			jQuery.ajax({
				type: "POST",
				url: jQuery(this).attr('action'),
				data: formInput,
				success: function(data){
					contactForm.parent().fadeOut("normal", function() {
						jQuery(this).prev().prev().show('normal'); // Show success message
					});
				},
				error: function(data){
					contactForm.parent().fadeOut("normal", function() {
						jQuery(this).prev().show('normal');  // Show error message
					});
				}
			});
		}
		
		return false;
		
	});
	
	jQuery('.requiredField').blur(function() {
		if(jQuery.trim(jQuery(this).val()) != '' && !jQuery(this).hasClass('email')) {
			jQuery(this).removeClass('input-error');
		} else {
			jQuery(this).addClass('input-error');
		}
	});
	
	jQuery('.email').blur(function() {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(emailReg.test(jQuery.trim(jQuery(this).val())) && jQuery(this).val() != '') {
			jQuery(this).removeClass('input-error');
		} else {
			jQuery(this).addClass('input-error');
		} 
	});	
		
	
	/* Search Watermark */
	var watermark = jQuery("meta[name=search]").attr('content');
	if (jQuery(".search").val() == "") {
		jQuery(".search").val(watermark);
	}
	
	jQuery(".search")
		.focus(	function() {
			if (this.value == watermark) {
				this.value = "";
			}
		})
		.blur(function() {
			if (this.value == "") {
				this.value = watermark;
			}
		});

	/* Remove empty #comments div */
	if(jQuery.trim(jQuery("#comments").text()) == "") {
		jQuery("#comments").remove();
	}
	
	/* Tabs */
	jQuery(".tab-content").hide(); //Hide all content
	jQuery(".tab-container > br").remove(); //Hide all content

	jQuery("ul.tabs").each( function() {
		jQuery(this).find("li:first").addClass("active"); //Activate first tab
	});
	
	jQuery(".tab-container").each( function() {
		jQuery(this).find(".tab-content:first").show(); //Show first tab content
	});

	jQuery("ul.tabs li").click(function() {
		jQuery(this).parent().find('li.active').removeClass("active");
		Cufon.replace('ul.tabs li a', { hover: true });
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(this).parent().next().find(".tab-content").hide(); //Hide all tab content

		var activeTabIndex = (jQuery(this).find("a").attr("href")).substring((jQuery(this).find("a").attr("href")).indexOf('#tab') + 4); //Find the href attribute value to identify the active tab + content
		
		var activeTabContent = jQuery(this).parent().next().find("div.tab-content:nth-child(" + activeTabIndex + ")");
		activeTabContent.fadeIn(); //Fade in the active ID content
		
		return false;
	});
	
	/* Toggle */
	jQuery(".toggle-container .toggle-content").hide(); //Hide (Collapse) the toggle containers on load
	jQuery(".toggle-container .toggle-sign").text('+'); //Add the + sign on load

	jQuery(".toggle-container-open .toggle-content").show(); //Show the default opened toggle containers on load	
	jQuery(".toggle-container-open .toggle-sign").text('-'); //Add the - sign on load

	jQuery(".toggle-container .toggle-content").each( function() {
		jQuery(this).css('width', jQuery(this).parent().width() - 30 );
	});
		
	jQuery(".toggle-container .toggle").toggle(function() {
		jQuery(this).find('.toggle-sign').text('-');
		jQuery(this).next(".toggle-content").slideToggle();
	}, function() {
		jQuery(this).find('.toggle-sign').text('+');
		jQuery(this).next(".toggle-content").slideToggle();
	});
	
	/* Required to style post page links similar to the wp-pagenavi ones */
	jQuery('.post_linkpages a span').each( function() {                                  
        jQuery(this).parent().html(jQuery(this).html());
    });
    jQuery('.post_linkpages span').addClass('current');
	
	/* Pricing Table */
	jQuery(".price-table > br").remove();
	jQuery(".price-table .price-column:nth-child(even)").addClass('price-column-even');
	jQuery(".price-column li:nth-child(even)").addClass('even');
	
	jQuery(".price-table").each( function() { 
        jQuery(this).find('.price-column:first').addClass('price-column-first');
    });
	
	jQuery(".price-table").each( function() { 
        jQuery(this).find('.price-column:last').addClass('price-column-last');
    });
    
    /* Buttons */
    // Add target="_blank" to buttons that have the data-newwindow="true" attribute
	jQuery('.button[data-newwindow=true]').each( function() {                                  
		jQuery(this).attr('target', '_blank').removeAttr('data-newwindow');
	});
	
	// Add custom hover background color to buttons that have the data-bgcolorhover attribute
	jQuery('.button, .button-big').each( function() {
		if( jQuery(this).attr('data-bgcolor') != '' ) { jQuery(this).css('backgroundColor', jQuery(this).attr('data-bgcolor')); }
		if( jQuery(this).attr('data-txtcolor') != '' ) { jQuery(this).css('color', jQuery(this).attr('data-txtcolor')); }
		jQuery(this).hover(
			function () { // on hover
				jQuery(this).css('backgroundColor', '');
				jQuery(this).css('color', '');
				if( jQuery(this).attr('data-bgcolorhover') != '' ) { jQuery(this).css('backgroundColor', jQuery(this).attr('data-bgcolorhover')); }
				if( jQuery(this).attr('data-txtcolorhover') != '' ) { jQuery(this).css('color', jQuery(this).attr('data-txtcolorhover')); }
			}, 
			function () { // off hover
				jQuery(this).css('backgroundColor', '');
				jQuery(this).css('color', '');
				if( jQuery(this).attr('data-bgcolor') != '' ) { jQuery(this).css('backgroundColor', jQuery(this).attr('data-bgcolor')); }
				if( jQuery(this).attr('data-txtcolor') != '' ) { jQuery(this).css('color', jQuery(this).attr('data-txtcolor')); }
			}
		);
	});
	
	/* Videos */
	if(!jQuery.browser.msie) {
		VideoJS.setupAllWhenReady();
	}
	
	jQuery('.embedded-video-flv').each( function() {
		element = jQuery(this);
		var player_id = element.find('div').attr('id');
		var flv_player_id = element.attr('id');
		var _url = element.attr('data-videourl');
		var unisphere_js = jQuery("meta[name=unisphere_js]").attr('content');
		var autoplay = (element.attr('data-autoplay') == "true") ? 1 : 0;
		var video_thumbnail = element.attr('data-video-thumbnail');
		
		if(_url.match(/(.flv)|(.mp4)/)) {
			jQuery('#' + player_id).remove();
			flowplayer(flv_player_id, 
				{ 
					src: unisphere_js + "/flowplayer-3.2.4.swf",
					cachebusting: true, 
					wmode: 'transparent'
				},
				{
					clip: {					
						url: _url,
						autoPlay: autoplay,
						scaling: 'fit'
					},							
					onLoad: function() {						
						if(autoplay == 'true') {
							this.play();
						} else {
							jQuery('#' + this.id() + '_api').css('backgroundImage', 'url(' + video_thumbnail + ')');
						}
					}
				}
			);
		}
	});
	
	/* Lightbox shortcode button firefox fix */
	jQuery('a.lightbox button').each( function() {
		jQuery(this).parent().css('textDecoration', 'none');
	});
	
    /* Hide the footer widgets area if there's no widgets present */
	if( jQuery('.footer-column .widget').size() == 0 ) {
    	jQuery('#footer-widgets-separator-container').css('display', 'none');
    	jQuery('#footer-widgets-container').css('display', 'none');
	};
});

/* After the page has loaded... */
jQuery(window).load(function() {

	/* Insert the footer of the inner page sliders using javascript */
	jQuery('.slider').after('<div class="slider-footer"></div>');
	
	/* Apply lightbox */
	SetLightbox(false);
	
});


function SetLightbox(load) {
	
	/* PrettyPhoto */
	jQuery("a[rel^='lightbox']").prettyPhoto({
		slideshow: 5000
	});
	
	/* Reduce opacity when mouse hover lightbox images */
	jQuery("a[rel^='lightbox'] img, .post-image a img, .home-blog-list a img, .portfolio-item a img, .widget-posts a img").not("#nivo-slider img, #stage-slider img, .slider img").hover(function() {
		jQuery(this).stop().fadeTo("fast", 0.7); // This sets the opacity to 60% on hover
	},function(){
		jQuery(this).stop().fadeTo("fast", 1.0); // This sets the opacity back to 100% on mouseout
	});
}

/* Event triggered before every stage slider transition */
function onCycleBefore() {
	// By default resume the slider, if a video exists it will pause it when autoplay is on
	jQuery('#stage-slider').cycle('resume'); // go to next slider item
	
	// Search for an embeded video and remove it
	var element = jQuery(this).parent().find('object');
	element.wrap(function() {
		return '<div id="' + element.attr('id') + '" />';
	}).remove();
	
	// Now create a video if it's present on this slider item
	createVideo(jQuery(this).find('.stage-slider-video'));
}

/* Function to embed a video in the stage slider */
function createVideo(element) {
	if(element.length) { // if element exists
		jQuery('#stage-slider').cycle('pause'); // pause the slider until video finishes
		var video_id = GetVideoId(element.attr('data-videourl'));
		var player_id = element.find('div').attr('id');					
		var _url = element.attr('data-videourl');
		var unisphere_js = jQuery("meta[name=unisphere_js]").attr('content');
		var autoplay = element.attr('data-autoplay');
		var video_thumbnail = element.attr('data-video-thumbnail');
		
		if(_url.match(/(youtube)/)) {
			var params = { allowScriptAccess: "always", allowfullscreen: "true", wmode: 'transparent' };
			var atts = { id: player_id, unisphere_autoplay: autoplay };
			swfobject.embedSWF("http://www.youtube.com/v/" + video_id + "?enablejsapi=1&fs=1&playerapiid=" + player_id, player_id, "100%", "100%", "8", unisphere_js + "/expressinstall.swf", null, params, atts);
		} else if(_url.match(/(vimeo)/)) {
			var flashvars = {
				clip_id: video_id,
				fullscreen: 1,
				show_portrait: 1,
				show_byline: 1,
				show_title: 1,
				js_api: 1, // required in order to use the Javascript API
				js_onLoad: 'vimeo_player_loaded', // moogaloop will call this JS function when it's done loading (optional)
				js_swf_id: player_id // this will be passed into all event methods so you can keep track of multiple moogaloops (optional)
			};
			var params = { allowscriptaccess: 'always', allowfullscreen: 'true', wmode: 'transparent' };
			var attributes = { unisphere_autoplay: autoplay };
			
			// For more SWFObject documentation visit: http://code.google.com/p/swfobject/wiki/documentation
			swfobject.embedSWF("http://vimeo.com/moogaloop.swf", player_id, "100%", "100%", "9.0.0", unisphere_js + "/expressinstall.swf", flashvars, params, attributes);
		} else {
			flowplayer(player_id, 
				{ 
					src: unisphere_js + "/flowplayer-3.2.4.swf",
					cachebusting: true, 
					wmode: 'transparent'
				},
				{
					clip: {					
						url: _url,
						autoPlay: false,
						scaling: 'fit'
					},							
					onLoad: function() {
						// If autoplay is set, then start the video and pause the slider
						if(autoplay == 'true') {
							this.play(); // start the video
						} else { // else resume the slider
							jQuery('#stage-slider').cycle('resume');
							jQuery('#' + this.id() + '_api').css('backgroundImage', 'url(' + video_thumbnail + ')');
						}
					},
					onBeforeBegin: function() {
						jQuery('#stage-slider').cycle('pause'); // pause the slider until video finishes
					},
					onFinish: function() {
						jQuery('#stage-slider').cycle('next'); // go to next slider item
					}
				}
			);
		}
	}
}

function onYouTubePlayerReady(playerId) {
	ytplayer = document.getElementById(playerId); // Get the reference to the video			
	ytplayer.addEventListener("onStateChange", "onytplayerStateChange"); // add onStateChange event listener
	
	// If autoplay is set, then start the video and pause the slider
	if(jQuery('#'+playerId).attr('unisphere_autoplay') == 'true') {
		ytplayer.playVideo(); // start the video
	} else { // else resume the slider
		jQuery('#stage-slider').cycle('resume');
	}
}
	
function onytplayerStateChange(newState) {
	if(newState == '3') { // Video as started
		jQuery('#stage-slider').cycle('pause'); // pause the slider until video finishes
	}
	if(newState == '0') { // Video has ended
		jQuery('#stage-slider').cycle('next'); // go to next slider item
	}
}

function vimeo_player_loaded(playerId) {
	vmplayer = document.getElementById(playerId); // Get the reference to the video			
	vmplayer.api_addEventListener('onPlay', 'vimeo_on_play'); // add onPlay event listener
	vmplayer.api_addEventListener('onFinish', 'vimeo_on_finish'); // add onFinish event listener
	
	// If autoplay is set, then start the video and pause the slider
	if(jQuery('#'+playerId).attr('unisphere_autoplay') == 'true') {
		vmplayer.api_play(); // start the video
	} else { // else resume the slider
		jQuery('#stage-slider').cycle('resume');
	}
}

function vimeo_on_play(playerId) {
	jQuery('#stage-slider').cycle('pause'); // pause the slider until video finishes
}

function vimeo_on_finish(playerId) {
	jQuery('#stage-slider').cycle('next'); // go to next slider item
}

/* Extract video id */
function GetVideoId(url) {
	var videoId;

	if(url.match(/(youtube)/)) {
		videoId = url.replace(/^[^v]+v.(.{11}).*/,"$1"); // Youtube Video
	} else if(url.match(/(vimeo)/)) {
		var re = new RegExp('/[0-9]+', "g");
		var match = re.exec(url);
		videoId = match[0].substring(1);
	} else {
		videoId = false;
	}

	return videoId;
}
