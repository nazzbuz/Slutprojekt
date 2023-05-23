// Retrieve HTML elements by their IDs
const imgBox = document.getElementById("imgBox");
const qrImage = document.getElementById("qrImage");
const qrText = document.getElementById("qrText");

// Generate a QR code and display it if the input field is not empty
function generateQR() {
  if (qrText.value.length > 0) {
    const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${qrText.value}`;
    qrImage.src = qrCodeUrl;
    imgBox.classList.add("show-img");
  } else {
    // Display an error message for 1 second if the input field is empty
    qrText.classList.add("error");
    setTimeout(() => {
      qrText.classList.remove("error");
    }, 1000);
  }
}
