function openNavbar(button, Navbar){
	document.getElementById(Navbar).classList.add('open');
	button.onclick = function() { closeNavbar(button, Navbar); }
	button.classList.add("open");
}

function closeNavbar(button, Navbar){
	document.getElementById(Navbar).classList.remove('open');
	button.classList.remove("open");
	button.onclick = function() { openNavbar(button, Navbar); }
}
