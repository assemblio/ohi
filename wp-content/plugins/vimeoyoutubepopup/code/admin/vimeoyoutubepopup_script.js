    jQuery(document).ready(function(){
		jQuery('.vimeoyoutubepopup_options').slideUp();
		
		jQuery('.vimeoyoutubepopup_section h3').click(function(){		
			if(jQuery(this).parent().next('.vimeoyoutubepopup_options').css('display')=='none')
				{	jQuery(this).removeClass('inactive');
					jQuery(this).addClass('active');
					jQuery(this).children('img').removeClass('inactive');
					jQuery(this).children('img').addClass('active');
					
				}
			else
				{	jQuery(this).removeClass('active');
					jQuery(this).addClass('inactive');		
					jQuery(this).children('img').removeClass('active');			
					jQuery(this).children('img').addClass('inactive');
				}
				
			jQuery(this).parent().next('.vimeoyoutubepopup_options').slideToggle('slow');	
		});
		
		// Delete Question
		jQuery("#question-editing ul.questions li .editing a.control").live("click", function(){
			jQuery(this).parent().parent().parent().slideUp("fast", function(){
				jQuery(this).remove();
				
				if( jQuery("#question-editing ul.questions li").not(".option").length == 0 ){
					jQuery("#question-editor").show();
					jQuery("#question-editing").hide();
				}
			});
		});
		
		// Add Question
		jQuery("#questionTypes .add").click(function(){
			var newSurveyQuestion = '<li class="active">';
			newSurveyQuestion += jQuery(this).parent().find(".code").html();
			newSurveyQuestion += '</li>';

			jQuery("#question-editing").show().find("ul.questions").append(newSurveyQuestion);
			jQuery("#questionOrder #question-editing li.active:last").effect("highlight", {color: "#39f300"}, 800);
			jQuery("#question-editor").hide();
			
		});
		
		jQuery('#vpcpup_color').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val( "#" + hex );
				jQuery(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#vpcpup_color').val( "#" + hex );
			}
		})
		.bind('keyup', function(){
			jQuery(this).ColorPickerSetColor(this.value);
		});
	});