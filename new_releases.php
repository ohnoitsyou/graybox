<!DOCTYPE html>
<html lang="en" class="">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    
    
    <title>graybox/common.php at master · ohnoitsyou/graybox · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png">
    <meta property="fb:app_id" content="1401488693436528">

      <meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="ohnoitsyou/graybox" name="twitter:title" /><meta content="graybox - Redbox clone for my IS448 class" name="twitter:description" /><meta content="https://avatars2.githubusercontent.com/u/481225?v=3&amp;s=400" name="twitter:image:src" />
      <meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="https://avatars2.githubusercontent.com/u/481225?v=3&amp;s=400" property="og:image" /><meta content="ohnoitsyou/graybox" property="og:title" /><meta content="https://github.com/ohnoitsyou/graybox" property="og:url" /><meta content="graybox - Redbox clone for my IS448 class" property="og:description" />
      <meta name="browser-stats-url" content="https://api.github.com/_private/browser/stats">
    <meta name="browser-errors-url" content="https://api.github.com/_private/browser/errors">
    <link rel="assets" href="https://assets-cdn.github.com/">
    
    <meta name="pjax-timeout" content="1000">
    

    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="selected-link" value="repo_source" data-pjax-transient>
      <meta name="google-analytics" content="UA-3769691-2">

    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="64246BA6:5907:D039B54:55340CF7" name="octolytics-dimension-request_id" />
    
    <meta content="Rails, view, blob#show" name="analytics-event" />
    <meta class="js-ga-set" name="dimension1" content="Logged Out">
    <meta class="js-ga-set" name="dimension2" content="Header v3">
    <meta name="is-dotcom" content="true">
    <meta name="hostname" content="github.com">
    <meta name="user-login" content="">

    
    <link rel="icon" type="image/x-icon" href="https://assets-cdn.github.com/favicon.ico">


    <meta content="authenticity_token" name="csrf-param" />
	<meta content="qmkvIykoqKfczKhQyE2rSGg1tsXeu6eR67sMsVFfug/t/3xmMYgvJvzYElpGYXRaYqNwWOTEIBRD2FS/qUwl4Q==" name="csrf-token" />

    <link href="https://assets-cdn.github.com/assets/github-99d0b872ee54fd3afae4675a7592394fa9d65696f8ad7a751b79704bc999f40a.css" media="all" rel="stylesheet" />
    <link href="https://assets-cdn.github.com/assets/github2-4dcecdbd59af4cd1dd8cf24ccaf35b686d848468ddcd7d52a8bf57c21ac4e5fb.css" media="all" rel="stylesheet" />
    
    


    <meta http-equiv="x-pjax-version" content="f16199bf45edde13bbc8d0c453f279fe">

      
  <meta name="description" content="graybox - Redbox clone for my IS448 class">
  <meta name="go-import" content="github.com/ohnoitsyou/graybox git https://github.com/ohnoitsyou/graybox.git">

  <meta content="481225" name="octolytics-dimension-user_id" /><meta content="ohnoitsyou" name="octolytics-dimension-user_login" /><meta content="31221588" name="octolytics-dimension-repository_id" /><meta content="ohnoitsyou/graybox" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="31221588" name="octolytics-dimension-repository_network_root_id" /><meta content="ohnoitsyou/graybox" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/ohnoitsyou/graybox/commits/master.atom" rel="alternate" title="Recent Commits to graybox:master" type="application/atom+xml">

  </head>

  
  
  
  <body>
  	<?php
		dbLogin();
		dbSelect();
		

		#construct a query
		$constructed_query = "
		SELECT DISTINCT iName
		INTO newMovies
		FROM inventory
			WHERE releaseDate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()
		ORDER BY inventoryID DESC LIMIT 5";
							  
		#Execute query
		$result = executeQuery($constructed_query);
		
		#1st check to see which movies are new(meaning released within the week/month)
		#take out the first five movies that where released within the last 30 days.


	?>
  
  
	<!--prints out movies + image of movies(as long as movie's iNames match movie's jpg image filename)  -->
	for ($i=0; $i<5; $i++){
		print newMovies[$i]
		<img src="img/<?php newMovies[$i] ?>.jpg" alt="<?php newMovies[$i] ?> movie" width="300px" height="500px"/>;
	}
	

  </body>
</html>

