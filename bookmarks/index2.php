<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Bookmarks</title>
		<meta name="description" content="Blueprint: Vertical Timeline" />
		<meta name="keywords" content="timeline, vertical, layout, style, component, web development, template, responsive" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<style>
		div.ui-widget-assignment-container {
		    width: 48%;
		    display: inline-block;
		    vertical-align: top;
		    min-width: 200px;
		    margin-bottom: 20px;
		}
		
		div.ui-widget-assignment-container h1.ui-article-title {
		    line-height: 1em;
		    font-size: 20px;
		}
		
		.as1 div div img {
		    display: none;
		}
		
		ul.page-navigation {
		    display: none;
		}
		
		.btn { 
		background-color: #ffffff;
		color: #47a3da;
		font-weight: bold;
		padding: 8px;
		display: block;
		border-radius: 4px;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<!--<span>Blueprint</span>-->
				<h1>My Bookmarks</h1>
				<nav>
					<a href="http://lmrhomeaccess.spihost.com/" class="icon-drop" data-info="check grades">check grades</a>
				</nav>
			</header>	
			<div class="main">
				<ul class="cbp_tmtimeline">
					<li>
						<time class="cbp_tmtime" datetime="2013-04-13 05:36"><span>4/13/13</span> <span>00:00</span></time>
						<div class="cbp_tmicon cbp_tmicon-mail"></div>
						<a href="http://www.lmtsd.org/Page/1716"><div class="cbp_tmlabel as1">
							<h2>American Studies (Mont)</h2>
							<p><?php
						   // include DOM extractor
						   include('dom.php');

						   	// assignments
						   $html = file_get_html('http://www.lmtsd.org/Page/1716');
						   foreach($html->find('.ui-widget-detail') as $element)
						          echo $element;
							?>
							<a href="http://connected.mcgraw-hill.com/sv/" class="btn">Textbook: The American Vision</a>
							<!-- 
							User Name:	Password:
							VICTORL170	victo522
							--></p>
						</div></a>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-09-24 18:30"><span>9/24/13</span> <span>00:00</span></time>
						<div class="cbp_tmicon cbp_tmicon-earth"></div>
						<a href="http://www.lmtsd.org//site/Default.aspx?PageID=1736"><div class="cbp_tmlabel as2">
							<h2>American Studies (Pezza)</h2>
							<p>
							<?php
						   // assignments
						   $html = file_get_html('http://www.lmtsd.org//site/Default.aspx?PageID=1736');
						   foreach($html->find('.ui-widget-assignment-container') as $element)
						          echo $element;

							?></p>
						</div></a>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-09-24T12:04"><span>9/24/13</span> <span>00:00</span></time>
						<div class="cbp_tmicon cbp_tmicon-screen"></div>
						<a href="http://edmodo.com"><div class="cbp_tmlabel sci">
							<h2>Science (Engleman)</h2>
							<p>Welcome to Edmodo.com!<br>

								<form id="login-container" method="post" action="http://edmodo.com/" autocomplete="off">
					
            					<h4>Sign in to Edmodo.</h4>
					
					
            					<div id="sign-up-inputs">
					
            					    <div class="placeholder-container" id="username"><input type="text" name="username" class="unfocused placeholder-input clickedonce" value="" tabindex="1" aria-required="true"><label class="placeholder-text">Username or Email</label></div>
            					    <div class="login-btn-container">
            					        <div class="placeholder-container" id="password"><input type="password" name="password" class="unfocused placeholder-input" tabindex="2" aria-required="true"><label class="placeholder-text">Password</label></div>
            					        <a id="login-btn" class="" href="javascript:;" tabindex="3" role="button">Login</a>
            					        <div class="clear"></div>
            					    </div>
					
							
        							        
        						</div>
							
							
        						<input type="hidden" name="go2url" value="/home">
							
        						</form>
							<a href="https://www.pearsonsuccessnet.com/snpapp/login/login.jsp?showLoginPage=true" class="btn">Textbook: Physical Science</a>
							<br>
							<a href="ibook://93284636321.app/auth" class="btn">iBook: Physical Science</a>

							</p>

						</div></a>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-13 05:36"><span>9/24/13</span> <span>00:00</span></time>
						<div class="cbp_tmicon cbp_tmicon-mail"></div>
						<a href="http://www.lmtsd.org/Page/8582"><div class="cbp_tmlabel">
							<h2>Spanish (Pearson)</h2>
							<p>							<?php
						   // assignments
						   $html = file_get_html('http://www.lmtsd.org/Page/8582');
						   foreach($html->find('table') as $element)
						          echo $element;

							?><a href="https://www.pearsonsuccessnet.com/snpapp/login/login.jsp?showLoginPage=true" class="btn">Textbook: Realidades</a> </p>
							</div></a>
					</li>
					<!--<li>
						<time class="cbp_tmtime" datetime="2013-04-15 13:15"><span>4/15/13</span> <span>13:15</span></time>
						<div class="cbp_tmicon cbp_tmicon-phone"></div>
						<div class="cbp_tmlabel">
							<h2>Watercress ricebean</h2>
							<p>Peanut gourd nori welsh onion rock melon mustard jícama. Desert raisin amaranth kombu aubergine kale seakale brussels sprout pea. Black-eyed pea celtuce bamboo shoot salad kohlrabi leek squash prairie turnip catsear rock melon chard taro broccoli turnip greens. Fennel quandong potato watercress ricebean swiss chard garbanzo. Endive daikon brussels sprout lotus root silver beet epazote melon shallot.</p>
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-16 21:30"><span>4/16/13</span> <span>21:30</span></time>
						<div class="cbp_tmicon cbp_tmicon-earth"></div>
						<div class="cbp_tmlabel">
							<h2>Courgette daikon</h2>
							<p>Parsley amaranth tigernut silver beet maize fennel spinach. Ricebean black-eyed pea maize scallion green bean spinach cabbage jícama bell pepper carrot onion corn plantain garbanzo. Sierra leone bologi komatsuna celery peanut swiss chard silver beet squash dandelion maize chicory burdock tatsoi dulse radish wakame beetroot.</p>
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-17 12:11"><span>4/17/13</span> <span>12:11</span></time>
						<div class="cbp_tmicon cbp_tmicon-screen"></div>
						<div class="cbp_tmlabel">
							<h2>Greens radish arugula</h2>
							<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-18 09:56"><span>4/18/13</span> <span>09:56</span></time>
						<div class="cbp_tmicon cbp_tmicon-phone"></div>
						<div class="cbp_tmlabel">
							<h2>Sprout garlic kohlrabi</h2>
							<p>Parsnip lotus root celery yarrow seakale tomato collard greens tigernut epazote ricebean melon tomatillo soybean chicory broccoli beet greens peanut salad. Lotus root burdock bell pepper chickweed shallot groundnut pea sprouts welsh onion wattle seed pea salsify turnip scallion peanut arugula bamboo shoot onion swiss chard. Avocado tomato peanut soko amaranth grape fennel chickweed mung bean soybean endive squash beet greens carrot chicory green bean. Tigernut dandelion sea lettuce garlic daikon courgette celery maize parsley komatsuna black-eyed pea bell pepper aubergine cauliflower zucchini. Quandong pea chickweed tomatillo quandong cauliflower spinach water spinach.</p>
						</div>
					</li>-->
				</ul>
			</div>
		</div>
	</body>
</html>
