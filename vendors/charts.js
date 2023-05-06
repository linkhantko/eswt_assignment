var options8 = {
	series: [1,1,1,1,1,2,1,1,1,1,1],
	chart: {
		type: 'donut',
	},
	responsive: [{
		breakpoint: 480,
		options: {
			chart: {
				width: 200
			},
		}
	}]
};
var chart = new ApexCharts(document.querySelector("#chart8"), options8);
chart.render();

// Highcharts.chart('chart0', {
// 	title: {
// 		text: 'Pie point CSS'
// 	},
// 	series: [{
// 		type: 'pie',
// 		allowPointSelect: true,
// 		keys: ['name', 'y', 'selected', 'sliced'],
// 		data: [
// 		['Apples', 10, false],
// 		['Pears', 71.5, false],
// 		['Oranges', 106.4, false],
// 		['Plums', 129.2, false],
// 		['Bananas', 144.0, false],
// 		['Peaches', 176.0, false],
// 		['Prunes', 135.6, true, true],
// 		['Avocados', 148.5, false]
// 		],
// 		showInLegend: true
// 	}]
// });

var options5 = {
	series: [{
		name: 'Team A',
		type: 'column',
		data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
	}, {
		name: 'Team B',
		type: 'area',
		data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
	}, {
		name: 'Team C',
		type: 'line',
		data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
	}],
	chart: {
		height: 350,
		type: 'line',
		stacked: false,
		toolbar: {
			show: false,
		}
	},
	grid: {
		show: false,
		padding: {
			left: 0,
			right: 0
		}
	},
	stroke: {
		width: [0, 2, 5],
		curve: 'smooth'
	},
	plotOptions: {
		bar: {
			columnWidth: '20%'
		}
	},

	fill: {
		opacity: [0.85, 0.25, 1],
		gradient: {
			inverseColors: false,
			shade: 'light',
			type: "vertical",
			opacityFrom: 0.85,
			opacityTo: 0.55,
			stops: [0, 100, 100, 100]
		}
	},
	labels: ['01/01/2020', '02/01/2020', '03/01/2020', '04/01/2020', '05/01/2020', '06/01/2020', '07/01/2020',
	'08/01/2020', '09/01/2020', '10/01/2020', '11/01/2020'
	],
	markers: {
		size: 0
	},
	xaxis: {
		type: 'datetime'
	},
	yaxis: {
		title: {
			text: 'Points',
		},
		min: 0
	},
	tooltip: {
		shared: true,
		intersect: false,
		y: {
			formatter: function (y) {
				if (typeof y !== "undefined") {
					return y.toFixed(0) + " points";
				}
				return y;

			}
		}
	}
};
var chart = new ApexCharts(document.querySelector("#chart9"), options5);
chart.render();
