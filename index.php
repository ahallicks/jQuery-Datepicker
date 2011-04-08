<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<title>jQuery DatePicker Functions</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<style type="text/css">
* {
	margin: 0;
	padding: 0;
}
html {
	font: 11px Arial, Tahoma, sans-serif;
}
#dp {
	margin: 20px;
}
table.ui-datepicker-calendar tbody td.highlight > a {
    background: url(../gfx/jquery/images/ui-bg_inset-hard_55_ffeb80_1x100.png) repeat-x scroll 50% bottom #FFEB80;
    color: #363636;
    border: 1px solid #FFDE2E;
}
	</style>
	<link href="../jquery.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
	<script type="text/javascript">
$(function()
{

	var events = [
	    { Title: "Five K for charity", Date: new Date("02/13/2011") },
	    { Title: "Dinner", Date: new Date("02/25/2011") },
	    { Title: "Meeting with manager", Date: new Date("03/01/2011") }
	];

	$("#dp").datepicker({
	    beforeShowDay: function(date) {
	        var result = [true, '', null];
	        var matching = $.grep(events, function(event) {
	            return event.Date.valueOf() === date.valueOf();
	        });

	        if (matching.length) {
	            result = [true, 'highlight', null];
	        }
	        return result;
	    },
	    onSelect: function(dateText) {
	        var date,
	            selectedDate = new Date(dateText),
	            i = 0,
	            event = null;

	        while (i < events.length && !event) {
	            date = events[i].Date;

	            if (selectedDate.valueOf() === date.valueOf()) {
	                event = events[i];
	            }
	            i++;
	        }
	        if (event) {
	            alert(event.Title);
	        }
	    }
	});

});
	</script>
</head>
<body>

	<div id="dp"></div>

</body>
</html>