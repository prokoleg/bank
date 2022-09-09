  /* globals Chart:false, feather:false */
(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
          'Понедельник',
          'Вторник',
          'Среда',
          'Четверг',
          'Пятница',
          'Суббота',
          'Воскресенье'
      ],
      datasets: [{
      /*  data: [
          15,
          17,
          18,
          20,
          23,
          24,
          20
        ],*/
        data: [
<?php // внесение данных в график через рнр
        $arr = array(1,1.5,2,2.7,3,3.2,3);
foreach ($arr as $key => $value) {
  echo "\t\t\t".$value.",\n";
}?>        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()