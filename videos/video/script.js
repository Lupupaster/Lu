let offset = 0

function next(){
	offset +=8	
load_videos();
}

function prev(){
offset -=8
load_videos();
}

function load_videos(){
	if(offset==0)	$('#but_prev').attr('disabled', true)
	if(offset>1)	$('#but_prev').attr('disabled', false)
	if(offset==8) 	$('#but_next').attr('disabled', true)
	if(offset<8) 	$('#but_next').attr('disabled', false)
		$.ajax({
		url: 'http://217.71.129.139:4644/videos/php/get_videos.php?count=8&offset='+offset,
		
		method: 'get',  
		dataType: 'json',
		success: function(data){
		$('#videos').html('')
			data['videos'].forEach(function(video){
				let div = $('<div class="videos">')
				div.append('<div class="foto"><img src="'+video['Logo']+'"></div>')
				div.append('<h4 class="ustal">'+video['Title']+'</h4>')
				div.append('<p class="ustal">'+video['Description']+'</p>')
				$('#videos').append(div)
			})
		}
	});
}