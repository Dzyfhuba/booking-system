var acc = document.getElementsByClassName("accordion");
var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     this.classList.toggle("active");
//     var panel = this.nextElementSibling;
//     if (panel.style.maxHeight) {
//       panel.style.maxHeight = null;
//     } else {
//       panel.style.maxHeight = panel.scrollHeight + "px";
//     } 
//   });
// }


//OPEN NAVBAR 
function openFullNavbar() {
  document.getElementById("navbarFullpage").style.width = "100%";
  document.getElementById("body").style.overflow = "hidden";
}
function closeFullNavbar() {
  document.getElementById("navbarFullpage").style.width = "0%";
  document.getElementById("body").style.overflow = "auto";

}


function openEditProfile() {
  document.getElementById("modalEditProfile").style.display = "flex";
}
function closeEditProfile() {
  document.getElementById("modalEditProfile").style.display = "none";
}