var mini = true;

function toggleSidebar() {
  if (mini) {
    console.log("opening sidebar");
    document.getElementById("mySidebar").style.width = "250px";
/*    document.getElementById("main").style.marginLeft = "250px";*/
    this.mini = false;
  } else {
    console.log("closing sidebar");
    document.getElementById("mySidebar").style.width = "90px";
/*    document.getElementById("main").style.marginLeft = "85px";*/
    this.mini = true;
  }
}
function adjustContainer(){
	console.log("adjust container");
	document.getElementsByClassName('container').style.marginLeft = "90px";
}
