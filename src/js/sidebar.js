
function openNav() {
  	document.getElementById("mySidebar").style.width = "250px";
  	document.getElementById("clicker").setAttribute('onclick','closeNav()');
}

function closeNav() {
  	document.getElementById("mySidebar").style.width = "0";
  	document.getElementById("clicker").setAttribute('onclick','openNav()')
}