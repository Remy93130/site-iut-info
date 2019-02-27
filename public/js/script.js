window.onscroll = function() { scrollFunction() };

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

function useModal(modalID){
	var modal = document.getElementById(modalID);
	modal.style.display = 'block';
}

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("UPARROW").classList.remove("hidden");
  } else {
    document.getElementById("UPARROW").classList.add("hidden");
  }
}
function toTop() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 