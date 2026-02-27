document.getElementById("product").addEventListener("change", function () {
  const selectedOption = this.options[this.selectedIndex];
  if (selectedOption.value) {
    document.getElementById("name").value =
      selectedOption.getAttribute("data-name");
    document.getElementById("description").value =
      selectedOption.getAttribute("data-description");
    document.getElementById("price").value =
      selectedOption.getAttribute("data-price");
  } else {
    document.getElementById("name").value = "";
    document.getElementById("description").value = "";
    document.getElementById("price").value = "";
  }
});
