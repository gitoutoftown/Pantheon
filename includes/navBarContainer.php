<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			 <img src="assets/images/icons/Pantheon-neon-logo@4x.png"> 
		</span>


		<div class="group">

			<div class="navItem">
				<span role='link' tabindex='0' onclick='openPage("search.php")' class="navItemLink">
					Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('submitSong.php')" class="navItemLink">Submit Song</span>
			</div>						
			
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo "Settings" /* $userLoggedIn->getFirstAndLastName();*/ ?></span>
				<!--<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName(); ?></span> !-->
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="" class="navItemLink">$0.00</span>
			</div>

			<?php
			if($userLoggedIn != "Guest") {
				
				} else {
					echo'
				<div class="navItem">
				<span role="link" tabindex="0" onclick="logout();openPage(\'register.php\');" class="navItemLink"> Register </span>
				</div>';
				}
			
			?>
		</div>

	</nav>
</div>