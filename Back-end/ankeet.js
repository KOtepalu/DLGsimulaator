var kidsInput = document.getElementById("kids_input");
var next = document.getElementById("next");

if (kidsInput.value !== "") {
  localStorage.setItem("kids_input", kidsInput.value);
}

next.addEventListener("click", function() {
  console.log("next on vajutatud");
});