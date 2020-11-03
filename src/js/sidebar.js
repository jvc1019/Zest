var x;
function openNav() {
  	document.getElementById("mySidebar").style.width = "250px";
  	x = document.getElementById("main").style.marginLeft;
  	document.getElementById("main").style.marginLeft = "250px";
  	document.getElementById("clicker").setAttribute('onclick','closeNav()');
}

function closeNav() {
  	document.getElementById("mySidebar").style.width = "0";
  	document.getElementById("main").style.marginLeft= x;
  	document.getElementById("clicker").setAttribute('onclick','openNav()')
}