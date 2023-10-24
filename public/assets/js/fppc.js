(function () {
  "use strict";

  let checkAll = document.querySelector(".check-all");
  checkAll.addEventListener("click", checkAllFn);

  function checkAllFn() {
    if (checkAll.checked) {
      document
        .querySelectorAll(".invoice-checkbox input")
        .forEach(function (e) {
          e.closest(".invoice-list").classList.add("selected");
          e.checked = true;
        });
    } else {
      document
        .querySelectorAll(".invoice-checkbox input")
        .forEach(function (e) {
          e.closest(".invoice-list").classList.remove("selected");
          e.checked = false;
        });
    }
  }

  //For Date Range Picker
  flatpickr("#daterange", {
    mode: "range",
    dateFormat: "Y-m-d",
  });

  //To choose date
  flatpickr(".invoice-date", {});

  /* Start::Choices JS */
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-ppk");

    searchInput.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
        const form = document.getElementById("search-form");
        form.submit();
      }
    });

    const daterangeInput = document.getElementById("daterange");

    daterangeInput.addEventListener("change", function (event) {
      const dates = event.target.value.split(" to ");

      if (dates.length === 2) {
        const dateRangeForm = document.getElementById("search-form");

        dateRangeForm.elements.start_date.value = dates[0];
        dateRangeForm.elements.end_date.value = dates[1];

        dateRangeForm.submit();
      }
    });

    const dropdownOptions = document.getElementById("dropdown-tipe");
    const links = dropdownOptions.getElementsByTagName("a");

    for (let i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function (event) {
        event.preventDefault();
        const form = document.getElementById("search-form");

        form.elements.kd_kegiatan.value = this.id;

        form.submit();
      });
    }

    var genericExamples = document.querySelectorAll("[data-trigger]");
    for (let i = 0; i < genericExamples.length; ++i) {
      var element = genericExamples[i];
      new Choices(element, {
        allowHTML: true,
        searchEnabled: false,
        removeItemButton: true,
      });
    }
  });

  //delete Btn
  let invoicebtn = document.querySelectorAll(".invoice-btn");

  invoicebtn.forEach((eleBtn) => {
    eleBtn.onclick = () => {
      let invoice = eleBtn.closest(".invoice-list");
      invoice.remove();
    };
  });
})();

let invoicePrint = (ele) => {
  document.querySelector(".invoice-edit").click();
  setTimeout(() => {
    window.print();
  }, 100);
};
