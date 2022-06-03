<!DOCTYPE html>
<html>
<head>
	<title>SankizGames - Firsst SankizTime Game</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
	body{
		font-family: sans-serif;
		background-image: url(sky.png);
		background-size: cover;
		background-repeat: no-repeat;
		overflow: hidden;
	}
	#player{
		width: 143px;
		position: relative;
		top: 420px;
		left: 60px;
	}
	.top{
		animation: tops 1s linear;
	}
	@keyframes tops{
		0%{
			top: 420px;
		}
		50%{
			top: 100px;
		}
		100%{
			top: 420px;
		}
	}
	#gunda{
		width: 83px;
		position: relative;
		top: 220px;
		left: 1350px;
		animation: gunds 4s linear infinite;
		transform: scaleX(-1);
	}
	@keyframes gunds{
		0%{
			left: 1350px;
		}
		100%{
			left: 0px;
		}
	}
	#gameover{
		position: absolute;
		top: 50%;
		left: 53%;
		transform: translate(-50%,-50%);
		display: none;
		border: 3px solid black;
		background-color: pink;
		padding: 15px;
	}
	#gameover h1{
		font-size: 70px;
	}
	#gameover a{
		text-decoration: none;
	}
	#gameover a:hover{
		color: tan;
	}
</style>
<body>
	<div id="container">
		<img src="character.png" id="player">
	</div>

	<div id="villain">
		<img src="player.png" id="gunda">
	</div>
	<div id="gameover">
		<h1>Game Over. <a href="index.php">play again</a> </h1>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script>
	$(document).ready(function(){
		document.onkeydown = function(e){
			 // alert('The key code is ' + e.keyCode);

			if (e.keyCode == 32) {
				$('#player').addClass('top');
				setTimeout(function(){
					$('#player').removeClass('top');
				},700);
			}
			if (e.keyCode == 39) {
				var mandel = document.getElementById('player');
				var mandel_top = parseInt(window.getComputedStyle(mandel).getPropertyValue("left"));

				mandel.style.left = mandel_top + 90 + "px";
			}
			if (e.keyCode == 37) {
				var mandel = document.getElementById('player');
				var mandel_top = parseInt(window.getComputedStyle(mandel).getPropertyValue("left"));

				mandel.style.left = mandel_top - 90 + "px";
			}
		}
		setInterval(function(){

			// selecting the gunda id
			var gunda = document.getElementById('gunda');
			// selecting the player id
			var mandel = document.getElementById('player');
			// finding the left position of id gunda
			var gunda_left = parseInt(window.getComputedStyle(gunda).getPropertyValue("left"));
			// finding the top position of id gunda
			var gunda_top = parseInt(window.getComputedStyle(gunda).getPropertyValue("top"));

			// finding the left position of id player
			var mandel_left = parseInt(window.getComputedStyle(mandel).getPropertyValue("left"));
			// finding the top position of id player
			var mandel_top = parseInt(window.getComputedStyle(mandel).getPropertyValue("top"));

			// subracting them to detect collisions
			var x = Math.abs(gunda_left - mandel_left);
			var y = Math.abs(gunda_top - mandel_top);
			
			// When they collide 
			if (x == '52' && y == '200') {
				var gameover = document.getElementById('gameover');
				gunda.style.display = "none";
				mandel.style.display = "none";
				gameover.style.display = "block";
			}
		},10);

	});	
</script>
</html>
