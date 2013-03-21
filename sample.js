$(document).ready(function(){
	$('.button').click(function (e){
		$.get('http://www.sample.com/',
			{'key': 3},
			function(data) {
				$('.result').html('<li>' + data[0] + '</li><li>' + data[1] + '</li><li>' + data[2] + '</li><li>' + data[3] + '</li><li>' + data[4] + '</li><li>id: ' + data[5] + '</li>');
			},
			'json'
		);

		return false;
	});
});