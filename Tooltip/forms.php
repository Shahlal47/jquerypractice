<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Tooltip - Forms</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        label {
            display: inline-block; width: 5em;
        }
        fieldset div {
            margin-bottom: 2em;
        }
        fieldset .help {
            display: inline-block;
        }
        .ui-tooltip {
            width: 210px;
        }
    </style>
    <script>
        $(function() {
            var tooltips = $( "[title]" ).tooltip({
                position: {
                    my: "left top",
                    at: "right+5 top-5"
                }
            });
            $( "<button>" )
                .text( "Show help" )
                .button()
                .click(function() {
                    tooltips.tooltip( "open" );
                })
                .insertAfter( "form" );
        });
    </script>
</head>
<body>
<form>
    <fieldset>
        <div>
            <label for="firstname">Firstname</label>
            <input id="firstname" name="firstname" title="Please provide your firstname.">
        </div>
        <div>
            <label for="lastname">Lastname</label>
            <input id="lastname" name="lastname" title="Please provide also your lastname.">
        </div>
        <div>
            <label for="address">Address</label>
            <input id="address" name="address" title="Your home or work address.">
        </div>
    </fieldset>
</form>
</body>
</html>