<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Tooltip - Video Player demo</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        .player {
            width: 500px;
            height: 300px;
            border: 2px groove gray;
            background: #ccc;
            text-align: center;
            line-height: 300px;
        }
        .ui-tooltip {
            border: 1px solid white;
            background: #111;
            color: white;
        }
        .ui-menu {
            position: absolute;
        }
        .set {
            display: inline-block;
        }
        .notification {
            position: absolute;
            display: inline-block;
            font-size: 2em;
            padding: .5em;
            box-shadow: 2px 2px 5px -2px rgba(0,0,0,0.5);
        }
    </style>
    <script>
        $(function() {
            function notify( input ) {
                var msg = "Selected " + $.trim( input.data( "tooltip-title" ) || input.text() );
                $( "<div>" )
                    .appendTo( document.body )
                    .text( msg )
                    .addClass( "notification ui-state-default ui-corner-bottom" )
                    .position({
                        my: "center top",
                        at: "center top",
                        of: window
                    })
                    .show({
                        effect: "blind"
                    })
                    .delay( 1000 )
                    .hide({
                        effect: "blind",
                        duration: "slow"
                    }, function() {
                        $( this ).remove();
                    });
            }
            $( "button" ).each(function() {
                var button = $( this ).button({
                    icons: {
                        primary: $( this ).data( "icon" )
                    },
                    text: !!$( this ).attr( "title" )
                });
                button.not( ".menu" ).click(function() {
                    notify( button );
                });
            });
            $( ".set" ).buttonset({
                items: "button"
            });
            $( "button.menu" )
                .click(function() {
                    $( document ).tooltip( "close", { currentTarget: this });
                    var menu = $( this ).next().show().position({
                        my: "left top",
                        at: "left bottom",
                        of: this
                    });
                    $( document ).one( "click", function() {
                        menu.hide();
                    });
                    return false;
                })
                .next()
                .hide()
                .menu({
                    selected: function( event, ui ) {
                        notify( ui.item );
                    }
                });
            $( document ).tooltip({
                position: {
                    my: "center top",
                    at: "center bottom+5"
                },
                show: {
                    duration: "fast"
                },
                hide: {
                    effect: "hide"
                }
            });
        });
    </script>
</head>
<body>
<div class="player">Here Be Video (HTML5?)</div>
<div class="tools">
<span class="set">
<button data-icon="ui-icon-circle-arrow-n" title="I like this">Like</button>
<button data-icon="ui-icon-circle-arrow-s">I dislike this</button>
</span>
    <div class="set">
        <button data-icon="ui-icon-circle-plus" title="Add to Watch Later">Add to</button>
        <button class="menu" data-icon="ui-icon-triangle-1-s">Add to favorites or playlist</button>
        <ul>
            <li>Favorites</li>
            <li>Funnees</li>
            <li></li>
            <li>New playlist...</li>
        </ul>
    </div>
    <button title="Share this video">Share</button>
    <button data-icon="ui-icon-alert">Flag as inappropriate</button>
</div>
</body>
</html>