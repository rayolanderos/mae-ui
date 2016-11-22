google.load('visualization', '1', {'packages': ['geochart', 'corechart']});
google.setOnLoadCallback(drawChart);


$(document).ready(function(){
	$('.btn-chart').bind('click', function(){
		$('#line-chart').empty();
		drawLineChart($(this).attr('data'));
	});
});

function drawChart() {
	//drawRegionsMap();
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

	if(chartType == undefined) {
		chartType = 'data1';
	}

	var data = {
		data1: [
			['Year', 'Weight', 'Height'],
			['2004',  1000,      400],
			['2005',  1170,      460],
			['2006',  660,       1120],
			['2007',  1030,      540]
		],
		data2: [
			['Year', 'Weight', 'Height'],
			['2004',  1000,      400],
			['2005',  2500,      300],
			['2006',  800,       750],
			['2007',  500,      200]
		],
		data3: [
			['Year', 'Weight', 'Height'],
			['2004',  1500,      459],
			['2005',  560,      200],
			['2006',  780,       560],
			['2007',  1500,      2000]
		]
	};


	var options = {
	  title: 'Baby\'s Stats',
	  colors:['#4A82B6','#B8C94F']
	};
	if(isGirl){
		options = {
		  title: 'Baby\'s Stats',
		  colors:['#00574F','#B8C94F']
		};	
	}

	var chart = new google.visualization.LineChart(document.getElementById('line-chart'));

	var chartData = [];

	switch(chartType)
	{
		case 'data1':
			chartData = data.data1;
			break;
		case 'data2':
			chartData = data.data2;
			break;
		case 'data3':
			chartData = data.data3;
			break;
	}
	if(google) {
		chartData = google.visualization.arrayToDataTable(chartData);
		chart.draw(chartData, options);
	}
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


	var options = {
	  title: 'Baby\'s Sleep Log', 
	  legend: { position: "none" }
	};
	

	var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));

	if(google) {
		chart.draw(data, options);
	}
}