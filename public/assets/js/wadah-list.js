var options = {};
/**** Filepond js****/
FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginImageExifOrientation,
  FilePondPluginFileValidateSize,
  FilePondPluginFileEncode
);

const FileUploads = document.querySelectorAll(".filepond");

FileUploads.forEach((FileUpload) => {
  const pond = FilePond.create(FileUpload);

  // Get the initial image URL from the value attribute of the input element
  const initialImageUrl = FileUpload.getAttribute("value");

  if (initialImageUrl) {
    // Create a File object from the initial image URL
    fetch(initialImageUrl)
      .then((response) => response.blob())
      .then((blob) => {
        const file = new File([blob], "initial-image.jpg", {
          type: "image/jpeg",
        });

        // Add the file to the pond
        pond.addFile(file);
      });
  }
});

//For Date Range Picker
flatpickr("#daterange", {
  mode: "range",
  dateFormat: "d-m-y",
});

//To choose date
flatpickr(".product-date", {});

//delete Btn
let productbtn = document.querySelectorAll(".product-btn");

productbtn.forEach((eleBtn) => {
  eleBtn.onclick = () => {
    let product = eleBtn.closest(".product-list");
    product.remove();
  };
});
