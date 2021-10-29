<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/slicebox.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
	
</head>
<body>
	<div class="container">

		<div class="wrapper">

			<ul id="sb-slider" class="sb-slider">
				<li>
					<a target="_blank"><img src="img/Slider/Slider1.jpg" alt="image1"/></a>
				</li>
				<li>
					<a target="_blank"><img src="img/Slider/Slider2.jpg" alt="image1"/></a>
				</li>
				<li>
					<a target="_blank"><img src="img/Slider/Slider3.jpg" alt="image1"/></a>
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Siguiente</a>
					<a href="#">Anterior</a>
				</div>

			</div>

			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<script type="text/javascript" src="js/jquery.slicebox.js"></script>
			<script type="text/javascript">
				$(function() {
					
					var Page = (function() {

						var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

						};

						return { init : init };

					})();

					Page.init();

				});
			</script>
			
		</body>
		</html>