var slidePosition = 0;

function nextFunction() {
    slidePosition = slidePosition - 100;
    if (slidePosition == -300) {
        slidePosition = 0;
    }
    $(".slider").css("margin-left", `${slidePosition}%`)
}

function previousFunction() {
    slidePosition = slidePosition + 100;
    if (slidePosition == 100) {
        slidePosition = -200;
    }
    $(".slider").css("margin-left", `${slidePosition}%`)
}
// setInterval(() => {
//         nextFunction();
// }, 6000);
const labels = [
    '01/10',
    '02/10',
    '03/10',
    '10/10',
    '24/10',
    '31/10',
    '14/11',
    '21/11',
    '28/11',
    '5/12',
];
const data = {
    labels: labels,
    datasets: [{
        label: 'Đã tiêm',
        backgroundColor: 'blue',
        borderColor: 'blue',
        data: [111, 55, 60, 45, 99, 98, 58, 201, 45, 128, ],
    }]
};
const config = {
    type: 'line',
    data: data,
    options: {
        maintainAspectRatio: false,
    }
};


const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
console.log(document.getElementById('myChart'), )