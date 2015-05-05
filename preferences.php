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
    <script type="text/javascript"> //Insert values into MySQL database with AJAX
        $(document).ready(function(){
            $("#submit").click(function(){

                 var action=$$('input:checked[type="radio"][name="action"]').pluck('value');
                 var children=$('input:checked[type="radio"][name="children"]').pluck('value');
                 var comedies=$('input:checked[type="radio"][name="comedies"]').pluck('value');
                 var documentaries=$('input:checked[type="radio"][name="documentaries"]').pluck('value');
                 var dramas=$('input:checked[type="radio"][name="dramas"]').pluck('value');
                 var foreign=$('input:checked[type="radio"][name="foreign"]').pluck('value');
                 var horror=$('input:checked[type="radio"][name="horror"]').pluck('value');
                 var sci_fi=$('input:checked[type="radio"][name="sci_fi"]').pluck('value');
                 var tv=$('input:checked[type="radio"][name="tv"]').pluck('value');
                 var thrillers=$('input:checked[type="radio"][name="thrillers"]').pluck('value');

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
            });
        });
    </script>

</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&trade;</span>
      <div class="quick_links">
        <span>Home</span><span>New Releases</span><span>Movies</span><span>TV Shows</span>
      </div>
    </div>
    <div class="statusbar">
      <div class="locationbox">
        <span>Locations</span>
      </div>
      <div class="statusboxes">
        <div class="userbox">
          <span class="username">Welcome cnieva | </span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> <span>My Cart&nbsp;  | </span>
          <span class="items_in_cart">1</span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Which movies would you like to be featured ?<h1></div>
    <div class="preferences_page">
    <form action="" method="post"> <!-- **TAKE OFF FORM ACTION???? OR ADD??? ALREADY CALLING "setuserpreferences.php" within AJAX script tags -->
		<table>
			<tr>
				<th>&nbsp;</th>
				<th>Never</th>
				<th>Sometimes</th>
				<th>Often</th>
			</tr>
			<tr>
				<td class="row">Action &amp; Adventure</td>
				<td><input type="radio" name="action" /></td>
				<td><input type="radio" name="action" /></td>
				<td><input type="radio" name="action" /></td>
			</tr>
			<tr>
				<td class="row">Children &amp; Family</td>
				<td><input type="radio" name="children" /></td>
				<td><input type="radio" name="children" /></td>
				<td><input type="radio" name="children" /></td>
			</tr>
			<tr>
				<td class="row">Comedies</td>
				<td><input type="radio" name="comedies" /></td>
				<td><input type="radio" name="comedies" /></td>
				<td><input type="radio" name="comedies" /></td>
			</tr>
			<tr>
				<td class="row">Documentaries</td>
				<td><input type="radio" name="documentaries" /></td>
				<td><input type="radio" name="documentaries" /></td>
				<td><input type="radio" name="documentaries" /></td>
			</tr>
			<tr>
				<td class="row">Dramas</td>
				<td><input type="radio" name="dramas" /></td>
				<td><input type="radio" name="dramas" /></td>
				<td><input type="radio" name="dramas" /></td>
			</tr>
			<tr>
				<td class="row">Foreign Movies</td>
				<td><input type="radio" name="foreign" /></td>
				<td><input type="radio" name="foreign" /></td>
				<td><input type="radio" name="foreign" /></td>
			</tr>
			<tr>
				<td class="row">Horror</td>
				<td><input type="radio" name="horror" /></td>
				<td><input type="radio" name="horror" /></td>
				<td><input type="radio" name="horror" /></td>
			</tr>
			<tr>
				<td class="row">Sci-Fi &amp; Fantasy</td>
				<td><input type="radio" name="sci_fi" /></td>
				<td><input type="radio" name="sci_fi" /></td>
				<td><input type="radio" name="sci_fi" /></td>
			</tr>
			<tr>
				<td class="row">TV Shows</td>
				<td><input type="radio" name="tv" /></td>
				<td><input type="radio" name="tv" /></td>
				<td><input type="radio" name="tv" /></td>
			</tr>
			<tr>
				<td class="row">Thrillers</td>
				<td><input type="radio" name="thrillers" /></td>
				<td><input type="radio" name="thrillers" /></td>
				<td><input type="radio" name="thrillers" /></td>
			</tr>
      <tr>
        <td><input type="submit" value="submit" id="submit" ></td>
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
</body>
</html>
