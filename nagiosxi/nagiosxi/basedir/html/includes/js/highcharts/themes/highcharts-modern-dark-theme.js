Highcharts.setOptions({
  colors: [
    "#DDDF0D",
    "#7798BF",
    "#55BF3B",
    "#DF5353",
    "#aaeeee",
    "#ff0066",
    "#eeaaee",
    "#55BF3B",
    "#DF5353",
    "#7798BF",
    "#aaeeee",
  ],
  chart: {
    backgroundColor: "#111",
    borderWidth: 0,
    borderRadius: 0,
    plotBackgroundColor: null,
    plotShadow: !1,
    plotBorderWidth: 0,
    resetZoomButton: {
      theme: {
        height: 15,
        r: 0,
        stroke: '#000',
        fill: '#333',
        states: {
          hover: {
            'stroke-width': 1,
            stroke: '#000',
            fill: '#666'
          },
          select: {
            'stroke-width': 1,
            stroke: '#000',
            fill: '#666'
          }
        },
        style: {
          cursor: 'pointer',
          color: '#F0F0F0'
        }
      }
    }
  },
  title: {
    style: {
      color: "#FFF",
      font: "16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif",
    },
  },
  subtitle: {
    style: {
      color: "#DDD",
      font: "12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif",
    },
  },
  xAxis: {
    gridLineWidth: 0,
    lineColor: "#999",
    tickColor: "#999",
    labels: {
      style: {
        color: "#999",
        fontWeight: "bold",
      },
    },
    title: {
      style: {
        color: "#AAA",
        font: "bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif",
      },
    },
  },
  yAxis: {
    alternateGridColor: null,
    minorTickInterval: null,
    gridLineColor: "rgba(255, 255, 255, .1)",
    minorGridLineColor: "rgba(255,255,255,0.07)",
    lineWidth: 0,
    tickWidth: 0,
    labels: {
      style: {
        color: "#999",
        fontWeight: "bold",
      },
    },
    title: {
      style: {
        color: "#AAA",
        font: "bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif",
      },
    },
  },
  legend: {
    backgroundColor: "#111",
    itemStyle: {
      color: "#CCC",
    },
    itemHoverStyle: {
      color: "#FFF",
    },
    itemHiddenStyle: {
      color: "#333",
    },
    title: {
      style: {
        color: "#E0E0E0",
      },
    },
  },
  labels: {
    style: {
      color: "#CCC",
    },
  },
  tooltip: {
    backgroundColor: "#090909",
    borderWidth: 0,
    style: {
      color: "#EEE",
    },
  },
  plotOptions: {
    series: {
      dataLabels: {
        color: "#444",
      },
      nullColor: "#444444",
    },
    line: {
      dataLabels: {
        color: "#CCC",
      },
      marker: { lineColor: "#333" },
    },
    spline: {
      marker: {
        lineColor: "#333",
      },
    },
    scatter: {
      marker: {
        lineColor: "#333",
      },
    },
    candlestick: {
      lineColor: "white",
    },
  },
  toolbar: {
    itemStyle: {
      color: "#CCC",
    },
  },
  navigation: {
    menuStyle: {
      background: "#090909",
      borderRadius: 0,
      "box-shadow": "none",
      borderWidth: 0,
      borderColor: "var(--border)",
    },
    menuItemStyle: {
      color: "#EEE",
    },
    menuItemHoverStyle: {
      background: "var(--border)",
    },
    buttonOptions: {
      symbolStroke: "#DDDDDD",
      theme: {
        r: 0,
        fill: "#111",
        states: {
          hover: {
            fill: "#333",
          },
          select: {
            fill: "#333"
          },
        },
      },
    },
  },
  rangeSelector: {
    buttonTheme: {
      fill: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0.4, "#888"],
          [0.6, "#555"],
        ],
      },
      stroke: "#000000",
      style: {
        color: "#CCC",
        fontWeight: "bold"
      },
      states: {
        hover: {
          fill: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
              [0.4, "#BBB"],
              [0.6, "#888"],
            ],
          },
          stroke: "#000000",
          style: {
            color: "white"
          },
        },
        select: {
          fill: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
              [0.1, "#000"],
              [0.3, "#333"],
            ],
          },
          stroke: "#000000",
          style: {
            color: "yellow"
          },
        },
      },
    },
    inputStyle: {
      backgroundColor: "#333",
      color: "silver"
    },
    labelStyle: {
      color: "silver"
    },
  },
  navigator: {
    handles: {
      backgroundColor: "#666",
      borderColor: "#AAA"
    },
    outlineColor: "#CCC",
    maskFill: "rgba(16, 16, 16, 0.5)",
    series: {
      color: "#7798BF",
      lineColor: "#A6C7ED"
    },
  },
  scrollbar: {
    barBackgroundColor: {
      linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
      stops: [
        [0.4, "#888"],
        [0.6, "#555"],
      ],
    },
    barBorderColor: "#CCC",
    buttonArrowColor: "#CCC",
    buttonBackgroundColor: {
      linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
      stops: [
        [0.4, "#888"],
        [0.6, "#555"],
      ],
    },
    buttonBorderColor: "#CCC",
    rifleColor: "#FFF",
    trackBackgroundColor: {
      linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
      stops: [
        [0, "#000"],
        [1, "#333"],
      ],
    },
    trackBorderColor: "#666",
  },
});
