Highcharts.addEvent(
  Highcharts.seriesTypes.networkgraph,
  'afterSetOptions',
  function (e) {
    var colors = Highcharts.getOptions().colors,
      i = 0,
      nodes = {};
    e.options.data.forEach(function (link) {

      if (link[0] === 'Вычисления') {
        nodes['Вычисления'] = {
          id: 'Вычисления',
          marker: {
            radius: 28
          }
        };
        nodes[link[1]] = {
          id: link[1],
          marker: {
            radius: 18
          },
          color: colors[i++]
        };
      } else if (nodes[link[0]] && nodes[link[0]].color) {
        nodes[link[1]] = {
          id: link[1],
          color: nodes[link[0]].color
        };
      }
    });

    e.options.nodes = Object.keys(nodes).map(function (id) {
      return nodes[id];
    });
  }
);

Highcharts.chart('container', {
  chart: {
    type: 'networkgraph'
  },
  title: {
    text: 'Карта знаний математики'
  },
  plotOptions: {
    networkgraph: {
      keys: ['from', 'to'],
      layoutAlgorithm: {
        enableSimulation: false,
        integration: 'verlet',
      },
      marker: {
        radius: 10
      }
    }
  },
  series: [{
    dataLabels: {
      enabled: true,
      linkFormat: ''
    },
    data: data
  }]
});