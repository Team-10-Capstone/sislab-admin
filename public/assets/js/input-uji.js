(function () {
  "use strict";
  var options = {};

  const pickrPositifs = document.querySelectorAll(".pickr-container2");
  const pickrNegatifs = document.querySelectorAll(".pickr-container3");

  /* Start::Choices JS */
  document.addEventListener("DOMContentLoaded", function () {
    var genericExamples = document.querySelectorAll(".blog-tag2");
    for (let i = 0; i < genericExamples.length; ++i) {
      var element = genericExamples[i];
      new Choices(element, {
        allowHTML: true,
      });
    }
  });

  const nanoThemes = [
    [
      "nano",
      {
        swatches: [
          "rgba(244, 67, 54, 1)",
          "rgba(233, 30, 99, 0.95)",
          "rgba(156, 39, 176, 0.9)",
          "rgba(103, 58, 183, 0.85)",
          "rgba(63, 81, 181, 0.8)",
          "rgba(33, 150, 243, 0.75)",
          "rgba(3, 169, 244, 0.7)",
        ],

        defaultRepresentation: "HEXA",
        components: {
          preview: true,
          opacity: true,
          hue: true,

          interaction: {
            hex: false,
            rgba: false,
            hsva: false,
            input: true,
            clear: true,
            save: true,
          },
        },
      },
    ],
  ];

  for (const [theme, config] of nanoThemes) {
    pickrPositifs.forEach((pickrPositif) => {
      const el = document.createElement("p");
      pickrPositif.appendChild(el);

      const pickr = new Pickr(
        Object.assign(
          {
            el,
            theme,
            default: "#000",
          },
          config
        )
      );

      pickr
        .on("init", (instance) => {})
        .on("hide", (instance) => {})
        .on("show", (color, instance) => {})
        .on("save", (color, instance) => {
          const id = pickrPositif.getAttribute("id");

          const input = document.querySelector(`#warna-${id}`);

          input.value = color.toHEXA().toString();
        })
        .on("clear", (instance) => {})
        .on("change", (color, source, instance) => {})
        .on("changestop", (source, instance) => {})
        .on("cancel", (instance) => {})
        .on("swatchselect", (color, instance) => {});
    });

    pickrNegatifs.forEach((pickrNegatif) => {
      const el = document.createElement("p");
      pickrNegatif.appendChild(el);

      const pickr = new Pickr(
        Object.assign(
          {
            el,
            theme,
            default: "#000",
          },
          config
        )
      );

      pickr
        .on("init", (instance) => {})
        .on("hide", (instance) => {})
        .on("show", (color, instance) => {})
        .on("save", (color, instance) => {
          const id = pickrNegatif.getAttribute("id");

          const input = document.querySelector(`#warna-${id}2`);

          input.value = color.toHEXA().toString();
        })
        .on("clear", (instance) => {})
        .on("change", (color, source, instance) => {})
        .on("changestop", (source, instance) => {})
        .on("cancel", (instance) => {})
        .on("swatchselect", (color, instance) => {});
    });
  }
  /**** quil Editor js****/

  const warnaSampels = document.querySelectorAll(".warna-sampel");
  warnaSampels.forEach((warnaSampel) => {
    const id = warnaSampel.getAttribute("id");
    const el = document.createElement("p");
    const [theme, config] = nanoThemes[0];
    warnaSampel.appendChild(el);

    const warnaInput = document.querySelector(`#input-${id}`);

    const nanoPickr = new Pickr(
      Object.assign(
        {
          el,
          theme,
          default: "#000",
        },
        config
      )
    );

    nanoPickr
      .on("init", (instance) => {})
      .on("hide", (instance) => {})
      .on("show", (color, instance) => {})
      .on("save", (color, instance) => {
        warnaInput.value = color.toHEXA().toString();
      })
      .on("clear", (instance) => {})
      .on("change", (color, source, instance) => {})
      .on("changestop", (source, instance) => {})
      .on("cancel", (instance) => {})
      .on("swatchselect", (color, instance) => {});
  });

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
