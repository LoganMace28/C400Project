<!DOCTYPE html>

<html>
   <head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script>
    var _data = {};
            var _data = {"2022":{"chev":"Chevrolet","dod":"Dodge","for":"Ford","hon":"Honda","tes":"Tesla"},
                        "2021":{"chev":"Chevrolet","dod":"Dodge","for":"Ford","hon":"Honda","tes":"Tesla"},
                        "2020":{"chev":"Chevrolet","dod":"Dodge","for":"Ford","hon":"Honda","tes":"Tesla"},
                        "2019":{"chev":"Chevrolet","dod":"Dodge","for":"Ford","hon":"Honda","tes":"Tesla"},
                        "2018":{"chev":"Chevrolet","dod":"Dodge","for":"Ford","hon":"Honda","tes":"Tesla"}};
    var _model = {};
            var _model = {"chev":{"equ":"Equinox"},
                            "dod":{"dur":"Durango"},
                            "for":{"esc":"Escape"},
                            "hon":{"crv":"CRV"},
                            "tes":{"mox":"Model X"}};
   </script>
      <meta charset = "utf-8" />
      <title>RedBook Value</title>
	  <link rel="stylesheet" type="text/css" href="common.css" />
   </head>

   <body>

	  <h3><?php    ?></h3>
	  
      <form method = "post" action = "AddCar.php">
         <h2>Get Red book Value</h2>

         <h2>Input a car you own</h2>
         <p>Select the Year, Make, and Model of your car</p>
         <select class = "form-control" id = "year" name = "Year" >
            <option value="">Select</option>
			<option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
         </select>
         <select class = "form-control" id = "make" name = "Make" >
            <option value="">Select</option>
         </select>
         <select class = "form-control" id = "model" name = "Model" >
            <option value="">Select</option>
         </select>
	  
   </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#year').on('change', function(e){
        var source = $(this),
            val = $.trim(source.val()),
            target = $('#make');
			$(target).empty();
        if(typeof(_data[val]) != "undefined"){
            var options = (typeof(_data[val]) != "undefined") ? _data[val] : {};
			 $('<option>Select</option>').appendTo(target);
            $.each( options , function(value, index) {
                    $('<option value="' + value + '">' + index + '</option>').appendTo(target);
            });
        }

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#make').on('change', function(e){
        var source = $(this),
            val = $.trim(source.val()),
            target = $('#model');
			$(target).empty();
        if(typeof(_model[val]) != "undefined"){
            var options = (typeof(_model[val]) != "undefined") ? _model[val] : {};
			 $('<option>Select</option>').appendTo(target);
            $.each( options , function(value, index) {
                    $('<option value="' + value + '">' + index + '</option>').appendTo(target);
            });
        }

    });
  });
</script>
