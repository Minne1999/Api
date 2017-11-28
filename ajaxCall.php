<head>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js">
</script>
<script>
$(document).ready(function(){
	return $.ajax({ url:"./index.php/welcome/apiClass?output=Json", 
		type:"GET", 
		datatype:"json",
		headers: {
			"Accept":"application/json;data=verbose"
		},
	}).done(function(data){
		for(var i=0; i<=data.length; i++){
			var fill = $("<p>"+data[i].opdrachtnummer+" "+data[i].opdrachtnaam+" "+data[i].beschrijving+"</p>")
			$("#dynamic").append(fill);
		}
	});
});
</script>
</head>
<body>
	<div id="dynamic">
	</div>
</body>
