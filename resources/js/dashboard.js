/* bar chart */
import Chart from 'chart.js/auto';
import colors from "tailwindcss/colors.js";

console.log("bi")
var chBar = document.getElementById("chBar");
if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S"],
            datasets: [{
                data: [80, 10, 80, 12, 29, 50, 30],
                backgroundColor: colors[0]
            },]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    categoryPercentage: 0.5
                }],
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
}
