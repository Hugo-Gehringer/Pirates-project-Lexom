/* bar chart */
import Chart from 'chart.js/auto';
import colors from "tailwindcss/colors.js";
import {data} from "autoprefixer";


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
                }
            }
        }
    });
}
