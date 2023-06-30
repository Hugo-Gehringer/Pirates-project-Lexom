/* bar chart */
import Chart from 'chart.js/auto';
import colors from "tailwindcss/colors.js";
import {data} from "autoprefixer";

import annotationPlugin from 'chartjs-plugin-annotation';

Chart.register(annotationPlugin);

var chBar = document.getElementById("chBar");
let parts =  JSON.parse(chBar.getAttribute('data-parts'))
console.log((parts))
let valueArray = [];
let labelArray = [];
parts.forEach(function(part) {
    // do something
    labelArray.push(part.name);
    valueArray.push(part.pivot.condition);
});

if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: {
            labels: labelArray,
            datasets: [{
                label: 'état en pourcentage',
                data: valueArray,
                backgroundColor: colors[0]
            },]
        },
        options: {
            legend: {
                text: "état"
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                },
                x: {
                    position: 'top'
                }
            },
            plugins: {
                annotation: {
                    annotations: {
                        box1: {
                            // Indicates the type of annotation
                            type: 'line',
                            yMin: 40,
                            yMax: 40,
                            backgroundColor: 'rgba(255, 99, 132, 0.25)'
                        }
                    }
                }
            }
        }
    });
}
