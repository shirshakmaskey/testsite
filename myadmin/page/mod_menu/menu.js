// JavaScript Document
$(document).ready(function() {
			$('#example').dataTable({
				"sPaginationType": "full_numbers"
				});
			$('.tool_tip').tooltip({animation:true,placement:'right'});
			});
			
			function changeStatus(id)
			{  
				$.post(admin_url+'mod_menu/ajax.php',{id:id,mode:'change_status'},                    function(data){
					  $("#statusChange"+id).text(data);
					  $('#message').show('slow')
								   .addClass('success')
								   .text('Status has been changed!')
								   .delay(5000)
								   .fadeOut('slow');
					});
			}