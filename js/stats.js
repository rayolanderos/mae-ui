google.load('visualization', '1', {'packages': ['geochart', 'corechart']});
google.setOnLoadCallback(drawChart);

var isGirl = false;

$(document).ready(function(){
	$('.btn-chart').bind('click', function(){
		$('#line-chart').empty();
		drawLineChart($(this).attr('data'));
	});
});

function drawChart() {

	drawLineChart();
	drawBarChart();

}

function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable([
      ['Country', 'Trips'],
      ['Germany', 200],
      ['United States', 300],
      ['Brazil', 400],
      ['Canada', 500],
      ['France', 600],
      ['RU', 700],
    ]);

    var options = {colorAxis: {colors: ['#006E8E', '#8ED5CC']}};
    if(isGirl){
    	options = {colorAxis: {colors: ['#E53B60', '#F4CAC0']}};
    }

    var chart = new google.visualization.GeoChart(document.getElementById('geo-chart'));
    chart.draw(data, options);
};

function drawLineChart(chartType) {

	var dataWeight = [
			['Weeks', 'Your Baby', 'Average'],
			['1',  10,      9],
			['2',  10.2,      10],
			['3',  10.5,       11],
			['4',  11,      12]
		];

	var dataHeight = [
		['Weeks', 'Your Baby', 'Average'],
		['1',  20.1,      20],
		['2',  21,      22],
		['3',  25,       23],
		['4',  26,      24]
	];


	var options = {
	  colors:['#4A82B6','#B8C94F']
	};
	if(isGirl){
		options = {
		  colors:['#00574F','#B8C94F']
		};	
	}

	var chart = new google.visualization.LineChart(document.getElementById('line-chart'));
	var chart2 = new google.visualization.LineChart(document.getElementById('height-chart'));

	if(google) {
		chartData1 = google.visualization.arrayToDataTable(dataWeight);
		chartData2 = google.visualization.arrayToDataTable(dataHeight);
		chart.draw(chartData1, options);
		chart2.draw(chartData2, options);
	}
}

function drawBarChart(chartType) {
	var style = 'stroke-color: #006E8E; stroke-opacity: 0.7; stroke-width: 4; fill-color: #8ED5CC; fill-opacity: 0.2';
	 if(isGirl){
    	style = 'stroke-color: #E53B60; stroke-opacity: 0.7; stroke-width: 4; fill-color: #F4CAC0; fill-opacity: 0.2';
    }
	var data = google.visualization.arrayToDataTable([
      ['Day', 'Hours', { role: 'style' }],
      ['Monday', 20, style],
      ['Tuesday', 16, style],
      ['Wednesday', 17, style],
      ['Thursday', 18, style],
      ['Friday', 15, style],
      ['Saturday', 16, style],
    ]);
    var dataDiapers = google.visualization.arrayToDataTable([
      ['Day', 'Diapers', { role: 'style' }],
      ['Monday', 5, style],
      ['Tuesday', 6, style],
      ['Wednesday', 5, style],
      ['Thursday', 7, style],
      ['Friday', 4, style],
      ['Saturday', 5, style],
    ]);


	var options = { 
	  legend: { position: "none" }
	};
	

	var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
	var chart2 = new google.visualization.BarChart(document.getElementById('diapers-chart'));

	if(google) {
		chart.draw(data, options);
		chart2.draw(dataDiapers, options);
	}
}