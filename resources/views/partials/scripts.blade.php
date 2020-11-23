<!-- Core JS files -->
<script>
    var CKEDITOR_BASEPATH = app_url+'js/ckeditor/';
</script>

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>

<script>

	window.Echo.channel('fixit_database_messages')
	    .listen('TestBroadCastNotification', (e) => {
	    	$('.push_notification_wrapper').find('div.push_notification_message').text(e.message);
	    	$('.push_notification_wrapper').fadeIn('slow');


	    	var audioElement = document.createElement('audio');
	    	    audioElement.setAttribute('src', "{{ url('sounds/notification.mp3') }}");

	    	    audioElement.play();

		    setTimeout(function() {
		       $('.push_notification_wrapper').fadeOut('slow');
		    }, 10000);
	    });	

	window.Echo.channel('fixit_database_messages')
	    .listen('AlertAdmin', (e) => {
    	    
    	    $.ajax({
    	           url: app_url+'/admin/get-sms-balance',
    	           type: 'GET',
    	           dataType: 'html',
    	           success: function(data){
    	           		$('.sms_balance').text(data);
    	           }
    	      });

    	    $.ajax({
    	           url: app_url+'/admin/get-notifications',
    	           type: 'GET',
    	           dataType: 'html',
    	           success: function(data){
    	           		$(document).find('.notifications_wrapper ul.media-list').html('').append(data);
    	           }
    	      });

    	    $.ajax({
    	           url: app_url+'/admin/get-newnotificationcount',
    	           type: 'GET',
    	           dataType: 'json',
    	           success: function(data){
    	           		$(document).find('span.admin_notification_count').text(data);
    	           }
    	      });

	    	$('.push_notification_wrapper').find('div.push_notification_message').text(e.message);
	    	$('.push_notification_wrapper').fadeIn('slow');


	    	var audioElement = document.createElement('audio');
	    	    audioElement.setAttribute('src', "{{ url('sounds/notification.mp3') }}");

	    	    audioElement.play();

		    setTimeout(function() {
		       $('.push_notification_wrapper').fadeOut('slow');
		    }, 10000);
	    });


	$('.read-notifications').click(function(){
		$.ajax({
		       url: app_url+'/admin/read-notifications',
		       type: 'GET',
		       dataType: 'html',
		       success: function(data){

			       	setTimeout(function() {
			       	   $('.push_notification_wrapper').fadeOut('slow');
			       	}, 10000);

		       		$(document).find('.notifications_wrapper ul.media-list').html('').append(data);
		       }
		  });

		$.ajax({
		       url: app_url+'/admin/get-newnotificationcount',
		       type: 'GET',
		       dataType: 'json',
		       success: function(data){
		       		$(document).find('span.admin_notification_count').text(data);
		       }
		  });
	});

	function loadMoreNotification(page){
	  $.ajax(
	        {
	            url: app_url+'/admin/get-notifications?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();

	            $(document).find('.notifications_wrapper ul.media-list').append(data);
	        });
	}

	$(document).ready(function(){

		$.ajax({
		       url: app_url+'/admin/get-sms-balance',
		       type: 'GET',
		       dataType: 'html',
		       success: function(data){
		       		$('.sms_balance').text(data);
		       }
		  });

		/**
		 * Determine the mobile operating system.
		 * This function returns one of 'iOS', 'Android', 'Windows Phone', or 'unknown'.
		 *
		 * @returns {String}
		 */
		function getMobileOperatingSystem() {
		  var userAgent = navigator.userAgent || navigator.vendor || window.opera;

		      // Windows Phone must come first because its UA also contains "Android"
		    if (/windows phone/i.test(userAgent)) {
		        console.log("Windows Phone");
		    }

		    if (/android/i.test(userAgent)) {
		        console.log('Android');
		    }

		    // iOS detection from: http://stackoverflow.com/a/9039885/177710
		    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
		        console.log('IOS');
		    }
		}	
	})

</script>