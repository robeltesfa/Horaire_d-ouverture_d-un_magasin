//*******JavaScript*********
window.addEventListener("DOMContentLoaded", (event) => {
  updateStoreStatus();
  setInterval(updateStoreStatus, 60000); // En minutes
});

function updateStoreStatus() {
  const statusElement = document.getElementById("status");
  const nextOpeningElement = document.getElementById("next-opening");
  const now = new Date();
  const currentDateTime = now.toISOString().slice(0, 20).replace("T", " ");

  fetch("class.php?currentDateTime=" + currentDateTime)
    .then((response) => response.json())
    .then((data) => {
      statusElement.innerHTML = data.status;
      nextOpeningElement.innerHTML = data.nextOpening;
    })
    .catch((error) => console.error("Error:", error));
}
