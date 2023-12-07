(function () {
  "use strict";

  /* Start::Choices JS */
  document.addEventListener("DOMContentLoaded", function () {
    var genericExamples = document.querySelectorAll(".blog-tag2");
    for (let i = 0; i < genericExamples.length; ++i) {
      var element = genericExamples[i];
      new Choices(element, {
        allowHTML: true,
        removeItemButton: true,
        placeholderValue: "Pilih petugas penyelia",
      });
    }
  });
  /**** quil Editor js****/

  //For Human Friendly dates
  flatpickr("#blog-date", {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
  });

  /* For Time Picker With 24hr Format */
  flatpickr("#blog-time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
  });
})();
