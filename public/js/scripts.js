$(function() {

    //--------------------------------------
    var _token = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });	
    //---------------------------------------
    

    $('#weather form button').click(function(e){
    	e.preventDefault();
    	var api_key = $("#api_key").val();
    	var city = $("#city").val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: ajax_param.ajax_url_weather,
            data: {
                api_key: api_key,
                city: city,
            },
            success: function(result) {
    
				console.log(result);

                if(result.cod == 200){ //success
                    var tab_id = 'menu'+$( '#weather ul.weather-tabs li' ).length;
                    appendWeatherTab(tab_id, result);
                    activateWeatherTab(tab_id);                    
                }
                else{ //errors
                    if(result.cod == 404 || result.cod == 401){
                        console.log(result.message);
                        showAlert(result.message);
                    }
                    else{
                        showAlert('try again');
                    }                    
                }
            },
            error: function(result)
            {
                console.log(result);
                showAlert('error');
            }
        });	
    });	

    function showAlert(message){

        var alert = 
            '<div class="alert alert-danger fade in alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'+
                '<strong>Alert!</strong> '+message+
            '</div>';
        
        $('#alert').html(alert);
    }

    function appendWeatherTab(tab_id, json){
		
        var icons = '';
        $.each(json.weather, function (key, data) {
            console.log(data.icon);
            icons += '<img src="https://openweathermap.org/img/w/'+data.icon+'.png">';
        });

    	var content = 
            '<p>Temperature: '+json.main.temp+' °C</p>'+
            '<p>Cloudiness: '+json.clouds.all+' %</p>'+
            '<p>Atmospheric pressure: '+json.main.pressure+' hPa</p>'+
            '<p>Humidity: '+json.main.humidity+' %</p>'+
            '<p>Wind Speed: '+json.wind.speed+' meter/sec</p>'+
            '<p>Wind direction: '+json.wind.deg+' degrees/sec</p>'+
            icons;

    	var city = json.name;

		$('#weather ul.weather-tabs').append('<li><a data-toggle="tab" href="#'+tab_id+'">'+city+'</a></li>');
		
		$('#weather .weather-content').append(
			'<div id="'+tab_id+'" class="tab-pane fade">'+
				'<h3>'+city+'</h3>'+
				content+
			'</div>'
		);    	
    }

    function activateWeatherTab(tab_id){
    	$('a[href="#'+tab_id+'"]').click();
    }

});