var options1 = {
  series: [1754, 1234],
  labels: ["Accepted", "Rejected"],
  chart: {
    height: 220,
    type: "donut",
    dropShadow: {
      enabled: true,
      enabledOnSeries: undefined,
      top: 5,
      left: 0,
      blur: 3,
      color: "#525050",
      opacity: 0.1,
    },
  },
  dataLabels: {
    enabled: false,
  },

  legend: {
    show: false,
  },
  stroke: {
    show: true,
    curve: "smooth",
    lineCap: "round",
    colors: "#fff",
    width: 0,
    dashArray: 0,
  },
  plotOptions: {
    pie: {
      expandOnClick: false,
      donut: {
        size: "90%",
        background: "transparent",
        labels: {
          show: true,
          name: {
            show: true,
            fontSize: "20px",
            color: "#495057",
            offsetY: -4,
          },
          value: {
            show: true,
            fontSize: "18px",
            color: undefined,
            offsetY: 8,
            formatter: function (val) {
              return val + "%";
            },
          },
          total: {
            show: true,
            showAlways: true,
            label: "Total",
            fontSize: "22px",
            fontWeight: 600,
            color: "#495057",
          },
        },
      },
    },
  },

  colors: ["rgb(90,102,241)", "#60a5fa"],
};
document.querySelector("#candidates-chart").innerHTML = " ";
var chart1 = new ApexCharts(
  document.querySelector("#candidates-chart"),
  options1
);
chart1.render();

function Candidates() {
  chart1.updateOptions({
    colors: ["rgb(" + myVarVal + ")", "rgb(203,213,225)", "rgb(96, 165 ,250)"],
  });
}
