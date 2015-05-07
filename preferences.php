<?php
session_start();
require_once('api/common.php');
loggedInCheck();
?>
<!--
	Christian Nieva
	3/20/15
	IS448
	Dr. Sampath
	UC3: Set User Preferences
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src=" http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>

    <!--
    <script type="text/javascript"> //Insert values into MySQL database with AJAX
      function sendajax() {
              alert('running');
                 var action=$$('input:checked[type="radio"][name="action"]').pluck('value');
              alert(action);
                 var children=$$('input:checked[type="radio"][name="children"]').pluck('value');
                 var comedies=$$('input:checked[type="radio"][name="comedies"]').pluck('value');
                 var documentaries=$$('input:checked[type="radio"][name="documentaries"]').pluck('value');
                 var dramas=$$('input:checked[type="radio"][name="dramas"]').pluck('value');
                 var foreign=$$('input:checked[type="radio"][name="foreign"]').pluck('value');
                 var horror=$$('input:checked[type="radio"][name="horror"]').pluck('value');
                 var sci_fi=$$('input:checked[type="radio"][name="sci_fi"]').pluck('value');
                 var tv=$$('input:checked[type="radio"][name="tv"]').pluck('value');
                 var thrillers=$$('input:checked[type="radio"][name="thrillers"]').pluck('value');

                if($('input[type="radio"]:checked').length == "0"){
                    alert("Select any category");
                }
                else
                {
                    new Ajax.Request('api/setuserpreferences.php', {
                        parameters: {
                            "action" : action,
                            "children" : children,
                            "comedies" : comedies,
                            "documentaries" : documentaries,
                            "dramas" : dramas,
                            "foreign" : foreign,
                            "horror" : horror,
                            "sci_fi" : sci_fi,
                            "tv" : tv,
                            "thrillers" : thrillers,

                        },
                        onSuccess: function(resp) {
                            if(resp.responseText == "-1") {
                                alert('Failure saving preferences');
                            } else {
                                console.log(resp);
                                /*
                                alert('Successfuly saved!');
                                $("#msg").addClass('bg');
                                $("#msg").html("value Entered");
                                */
                            }

                        },
                        onFailure: function(resp) {
                            console.log('error');
                            console.log(resp.responseText);
                        }
                    });
                }
                return false;
            };
    </script>
    -->

</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&trade;</span>
      <div class="quick_links">
       <span><a href="login.php">Home</a></span><span><a href="new_releases.php">New Releases</a></span><span><a href="displayall.php">Available titles to rent</a></span><span><a href="preferences.php">Preferences</a></span>
      </div>
    </div>
    <div class="statusbar">
      <div class="statusboxes">
          <?php displayUserbox(); ?>
        <?php displayCartbox(); ?>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Which movies would you like to be featured ?<h1></div>
    <div class="preferences_page">
    <form action="display_preferences.php" method="post"> <!-- ADD FOR ACTION TO "display_preferences.php"??? to display stored preferences? -->
		<table>
			<tr>
				<th>&nbsp;</th>
				<th>Never</th>
				<th>Sometimes</th>
				<th>Often</th>
			</tr>
			<tr>
				<td class="row">Action &amp; Adventure</td>
				<td><input type="radio" name="action" value="n"/></td>
				<td><input type="radio" name="action" value="s"/></td>
				<td><input type="radio" name="action" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Children &amp; Family</td>
				<td><input type="radio" name="children" value="n" /></td>
                <td><input type="radio" name="children"value="s" /></td>
				<td><input type="radio" name="children" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Comedies</td>
				<td><input type="radio" name="comedies" value="n" /></td>
				<td><input type="radio" name="comedies" value="s"/></td>
				<td><input type="radio" name="comedies" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Documentaries</td>
				<td><input type="radio" name="documentaries" value="n" /></td>
				<td><input type="radio" name="documentaries" value="s"/></td>
				<td><input type="radio" name="documentaries" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Dramas</td>
				<td><input type="radio" name="dramas" value="n" /></td>
				<td><input type="radio" name="dramas" value="s"/></td>
				<td><input type="radio" name="dramas" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Foreign Movies</td>
				<td><input type="radio" name="foreign" value="n" /></td>
				<td><input type="radio" name="foreign" value="s"/></td>
				<td><input type="radio" name="foreign" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Horror</td>
				<td><input type="radio" name="horror" value="n" /></td>
				<td><input type="radio" name="horror" value="s"/></td>
				<td><input type="radio" name="horror" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Sci-Fi &amp; Fantasy</td>
				<td><input type="radio" name="sci_fi" value="n" /></td>
				<td><input type="radio" name="sci_fi" value="s"/></td>
				<td><input type="radio" name="sci_fi" value="o"/></td>
			</tr>
			<tr>
				<td class="row">TV Shows</td>
				<td><input type="radio" name="tv" value="n" /></td>
				<td><input type="radio" name="tv" value="s"/></td>
				<td><input type="radio" name="tv" value="o"/></td>
			</tr>
			<tr>
				<td class="row">Thrillers</td>
				<td><input type="radio" name="thrillers" value="n" /></td>
				<td><input type="radio" name="thrillers" value="s"/></td>
				<td><input type="radio" name="thrillers" value="o"/></td>
			</tr>
      <tr>
        <td><input type="submit" value="submit" id="submit" onclick="return sendajax()"></td>
        <td>&nbsp</td>
        <td>&nbsp</td>
        <td>&nbsp</td>
      </tr>
		</table>

    </form>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
         <?php functionFooter(); ?>
</body>
</html>
