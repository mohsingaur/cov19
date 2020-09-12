<!DOCTYPE html>
<html>
<head>
	<title>Covid-19 Outbreak Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
	
	<script src="https://kit.fontawesome.com/e4d2a6552c.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" type="text/javascript"></script>
	<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>

	<style type="text/css">
		*{
		margin: 0;
		padding: 0;
		font-size: 100%;
		box-sizing: border-box;
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		/*font-family: "Lucida Console", Courier, monospace;*/
		/*font-family: Impact, Charcoal, sans-serif;*/
	}
	.wrapper{
		margin: 20px auto;
		width: 720px;
	}
	.container{
		margin: 20px 0;
	}
	#map{
		width: 720px; 
		height: 400px;
	}
	.header{
		background: #aac;
		padding: 10px;
		font-weight: bold;
	}
	.clear-fix::after{
		clear: both;
		content: "";
		display: table;
	}
	.footer{
		background: #acf;
		padding: 10px;
		margin-top: 50px;
		margin-bottom: 0px;
	}
	
	#statewise{
			width: 100%;
			padding: 10px;
			overflow: hidden;
		}
	#statewise table{
		font-size: 0.9em;
		border-collapse: collapse;
		border: 1px solid #eee;
		width: auto;
	}
	#statewise table th{
		border: 1px solid #eee;
	}
	#statewise table th,td{
		padding: 5px;
	}
	#statewise table tr:nth-child(even){
		background: #eee;
	}
	.card{
		width: 175px;
		height: 230px;
		border-radius: 5px;
		text-align: center;
		padding: 20px;
		font-weight: bold;
		margin: 20px;
		float: left;
	}
	#country{
		text-decoration: underline;
		font-size: 1.1em;
		color: #33f;
	}
	#mylist{
		display: none;
		width: auto;
		height: 500px;
		background: #aac;
		position: absolute;
		top: 35px;
		left: 25%;
		z-index: 72;
		overflow-y: scroll;
	}
	#mylist li{
		padding: 5px;
		font-size: 0.9em;
	}
	hr{
		margin: 5px 0;
	}
	.card p{
		font-size: 0.9em;
		height: 50px;
	}
	.fas{
		color: red;
	}
	#global{
		text-align: left;
		font-size: 1em;
	}
	.card span{
		display: block;
		padding: 10px;
		font-size: 1.1em;
		font-weight: bold;
	}
	.green{
		background: linear-gradient(to bottom, #9ae69c 0%, #9ce999 5%, #9cea9e 6%, #9cea9e 6%, #a0e99a 10%, #a3eb95 24%, #adee92 36%, #adee90 40%, #b3ef8f 45%, #b0f08f 46%, #b4f18a 50%, #b7f18d 51%, #b6f08a 53%, #baf18b 58%, #c4f780 77%, #c9f681 86%, #ccfa7e 90%, #cbf77c 94%, #cff87e 96%, #cff87e 100%);
		box-shadow: 2px 2px 8px #afb;
	}
	.blue{
		clear: both;
		font-size: 1em;
		height: 270px;
		background: linear-gradient(to bottom, #aaf 0%, #aaf 6%, #acf 8%, #acd 11%, #acf 11%, #acf 28%, #bdf 44%, #bdf 48%, #bdf 62%, #bdf 62%, #bdf 75%, #bef 79%, #bef 91%, #bef 96%, #bef 100%);
		/*background-color: #aaf;*/
		box-shadow: 2px 2px 8px #aaf;
	}
	.default{
		clear: both;
		float: none;
		height: auto;
		width: 100%;
		background-color: #aaf;
		box-shadow: 2px 2px 8px #aaf;
	}

	.red{
		background: linear-gradient(to bottom, #ff8582 0%, #fe8685 16%, #ff908e 44%, #fe908f 53%, #ff9692 62%, #ff9597 67%, #ff9a98 84%, #ff9b9b 85%, #fe9c9d 91%, #ff9e98 96%, #ff9d9c 96%, #ff9e9d 100%);
		box-shadow: 2px 2px 8px #faa;
	}
	.orange{
		background: linear-gradient(to bottom, #f5ce67 0%, #f8cd67 4%, #f6cc66 7%, #f7cb6c 13%, #f5c66c 21%, #f8c76b 23%, #f7c570 27%, #f7c36f 33%, #f9c174 39%, #f8bf72 40%, #f9ba73 47%, #f9ba77 52%, #fdb877 56%, #fab677 57%, #f9b479 60%, #fab17c 67%, #fcb17a 69%, #fbaf7e 74%, #fcab7c 77%, #fcab7e 84%, #fdaa82 85%, #fca683 100%);
		box-shadow: 2px 2px 8px #caa;
	}
	.chartarea{
		float: none;
		clear: both;
		margin: 10px;
		width: 720px;
	}
	.footer .attrib{
		padding-top: 10px;
		font-size: 5px;
		color: #fff;
	}
	.footer table td{
		padding: 3px 10px 3px 0;
	}
	@media only screen and (max-width: 600px){
		.wrapper{
		margin: 20px auto;
		width: 100%;
	}
		.container{
			display: grid;
			grid-template-columns: 1fr 1fr 1fr; 
		}
		.card{
			width: auto;
			height: auto;
			padding: 5px;
			margin: 20px 0;
			border-radius: 0;
		}
		#statewise{
			overflow-x: auto;
		}
		#statewise table{
			width: auto;
			margin: 10px;
		}
		#global{
		text-align: left;
		font-size: 1em;
		}
		.default{
			grid-column: 1 / -1;
			height: auto;
			flex: 4;
		}
		.chartarea{
			grid-column: 1 / -1;
			height: auto;
			width: auto;
			flex: 4;
			font-size: 1em;
		}
		.card p{
			font-size: 0.79em;
			height: auto;
			padding: 5px;
		}
		.blue p{
			font-size: 1.1em;
		}
		.card span{
			font-size: 1.4em;
			font-weight: bold;
		}
		#map{
			width: 99%; 
			height: 400px;
		}
	}
	</style>
	

</head>
<body onload="dataCntwise('india')">

<div class="header">
	Covid-19 Stats | <i class="fas fa-search" onclick="popUp()"> </i>
	<span id="country" onclick="popUp()"><i class="fas fa-virus fa-spin"></i></span>
	<!-- <a href="javascript:void(id);" onclick="selCountry()" id="country"></a> -->
</div>

<div class="wrapper clear-fix">

<ul id="mylist"></ul>

<div class="container clear-fix">

<div class="card orange">
	<p>New Confirmed Cases</p><span id="nconf"><i class="fas fa-virus fa-spin"></i></span>
	<hr>
	<p>Total Confirmed Cases</p><span id="tconf"><i class="fas fa-virus fa-spin"></i></span>
</div>

<div class="card green">
	<p>New Recovered Cases</p><span id="nrec"><i class="fas fa-virus fa-spin"></i></span>
	<hr>
	<p>Total Recovered Cases</p><span id="trec"><i class="fas fa-virus fa-spin"></i></span>
</div>


<div class="card red">
	<p>New Deaths Recorded</p><span id="ndeath"><i class="fas fa-virus fa-spin"></i></span>
	<hr>
	<p>Total Deaths Recorded</p><span id="tdeath"><i class="fas fa-virus fa-spin"></i></span>
</div>


<div class="chartarea">
	<canvas id="confChart" width="400" height="250"></canvas>
	<canvas id="recdChart" width="400" height="250"></canvas>
	<canvas id="deathChart" width="400" height="250"></canvas>
	<canvas id="activeChart" width="400" height="250"></canvas>
</div>

</div>

<div id="statewise">

<?php
$c = 0;

echo "<table>
	<tr>
		<th>States</th>
		<th>Confirmed</th>
		<th>Active</th>
		<th>Recovered</th>
		<th>Deceased</th>
	</tr>";

$json = file_get_contents('https://api.covid19india.org/data.json');
$data = json_decode($json, true);

for($i=1; $i<count($data['statewise']); $i++) {
	echo "
		<tr>
			<td>".$data['statewise'][$i]['state']."</td>
			<td>".$data['statewise'][$i]['confirmed']."</td>
			<td>".$data['statewise'][$i]['active']."</td>
			<td>".$data['statewise'][$i]['recovered']."</td>
			<td>".$data['statewise'][$i]['deaths']."</td>
		</tr>
	";
}
echo "</table>
<i style='font-size:0.5em'>Last updated: ".Date('d/m/Y')."</i>";
?>

</div>

<div id='map'></div>

</div>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibW9oc2luZ2F1ciIsImEiOiJja2FuOHpkdDUwYnljMnlxb3BqcDhmeXp2In0.IP-yQq6-Sozu5cR_2fmE3Q';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [82.726421, 21.121142],
zoom: 3,
attributionControl: false
});
// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());

// Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
	positionOptions: {
		enableHighAccuracy: true
		},
		trackUserLocation: true
	})
);

//Calculate date a day before
var todaydate = new Date();
var yesterday = new Date();
yesterday.setDate(todaydate.getDate() - 1);
const dt = yesterday.toISOString();
// console.log(dt);

cntList();
globalData();

async function fetchApiUrl(){
	const fch = await fetch('https://api.covid19api.com/summary');
	const resp = await fch.json();
	return resp;
}

function _(id) {
	return document.getElementById(id);
}

async function dataCntwise(c) {
	
	const capidata = await fetchApiUrl();

		for(i = 0; i<capidata.Countries.length; i++){
			
			if (capidata.Countries[i].Slug == c) {
				let Cont = capidata.Countries[i].Country;
				let NewConf = capidata.Countries[i].NewConfirmed;
				let TotConf = capidata.Countries[i].TotalConfirmed;
				let NewDeath = capidata.Countries[i].NewDeaths;
				let TotDeath = capidata.Countries[i].TotalDeaths;
				let NewRec = capidata.Countries[i].NewRecovered;
				let TotRec = capidata.Countries[i].TotalRecovered;
				let date = capidata.Countries[i].Date;
				_('country').innerHTML = Cont;
				_('nconf').innerHTML = NewConf.toLocaleString('en-IN');
				_('tconf').innerHTML = TotConf.toLocaleString('en-IN');
				_('nrec').innerHTML = NewRec.toLocaleString('en-IN');
				_('trec').innerHTML = TotRec.toLocaleString('en-IN');
				_('ndeath').innerHTML = NewDeath.toLocaleString('en-IN');
				_('tdeath').innerHTML = TotDeath.toLocaleString('en-IN');
                if (capidata.Countries[i].Slug == 'india') {
                    getStatewise();
                    }
                else{
                    document.getElementById('statewise').innerHTML = '';
                }
				}
			}
    await chartsIt(c,dt);	
}


async function getData(cnt,dt) {
	closePop();
	const act = [];
	const cnf = [];
	const rcd = [];
	const dth = [];
	const dts = [];

	const response = await fetch('https://api.covid19api.com/country/'+cnt+'?from=2020-05-22T00:00:00Z&to='+dt);
	
	const data = await response.json();

	for(let i=0; i<data.length; i++){
		var dt = data[i].Date;
		var st = new Date(dt);
		var din = st.getDate();
		var month = st.getMonth()+1;
		var yr = st.getYear();
		var ndate = din+'/'+month;

		act.push(data[i].Active);
		cnf.push(data[i].Confirmed);
		rcd.push(data[i].Recovered);
		dth.push(data[i].Deaths);
		dts.push(ndate);
	}
	return {act, cnf, rcd, dth, dts};
}

async function getStatewise() {
    await fetch('statewisecov.php')
        .then( (response) => response.text())
        .then( (data) => {
        document.getElementById('statewise').innerHTML = data;
    });  
}

async function chartsIt(c,d) {
	const cdata = await getData(c,d);
	
	var ctx = document.getElementById('activeChart').getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: cdata.dts,
        datasets: [{
            label: 'Active Cases',
            data: cdata.act,
            borderColor: 'blue',
            borderWidth: 1,
            pointRadius: 0.5,
            fill: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                },
                id: 'right-y-axis',
                type: 'linear',
                position: 'right'
            }]
        }
    }
});

	var ctx = document.getElementById('confChart').getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: cdata.dts,
        datasets: [{
            label: 'Confirmed Cases',
            data: cdata.cnf,
            borderColor: 'orange',
            borderWidth: 1,
            pointRadius: 0.5,
            fill: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                },
                id: 'right-y-axis',
                type: 'linear',
                position: 'right'
            }]
        }
    }
});

	var ctx = document.getElementById('recdChart').getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: cdata.dts,
        datasets: [{
            label: 'Recovered Cases',
            data: cdata.rcd,
            borderColor: 'green',
            borderWidth: 1,
            pointRadius: 0.5,
            fill: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                },
                id: 'right-y-axis',
                type: 'linear',
                position: 'right'
            }]
        }
    }
});

	var ctx = document.getElementById('deathChart').getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: cdata.dts,
        datasets: [{
            label: 'Deceased',
            data: cdata.dth,
            borderColor: 'red',
            borderWidth: 1,
            pointRadius: 0.5,
            fill: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                },
                id: 'right-y-axis',
                type: 'linear',
                position: 'right'
            }]
        }
    }
});
}

// Get data for Global cases
async function globalData() {
	const agdata = await fetchApiUrl();
	const cdata = `<table><tr><td>Total Confirmed</td> <td> ${agdata.Global.TotalConfirmed.toLocaleString('en-IN')} </td></tr> <tr> <td>Total Recovered</td> <td>${agdata.Global.TotalRecovered.toLocaleString('en-IN')} </td></tr> <tr><td>Total Deaths</td> <td>${agdata.Global.TotalDeaths.toLocaleString('en-IN')}</td></tr> </table> `;
	document.getElementById('global').innerHTML = cdata;
}

// Fetch date as country list
async function cntList() {
	const data = await fetchApiUrl();
	for (var i = 0; i < data.Countries.length; i++) {
		var tnode = document.createTextNode(data.Countries[i].Country);
		li = document.createElement("li");
		li.setAttribute('onclick',`dataCntwise('${data.Countries[i].Slug}')`);
		li.appendChild(tnode);

		_('mylist').appendChild(li);		
	}	
}


// Window popup function

function popUp() {
	_('mylist').style.display = "block";
}

function closePop() {
  	// alert();
  	_("mylist").style.display = "none";
}

</script>


<div class="footer">
	<div class="global">
		<p>Cases Globally</p><hr>
		<p id="global"><i class="fas fa-virus fa-spin"></i></p>
	</div>
	<hr>
	<div class="attrib">
		Developed By: MG | <a href="disclaimer.html">Disclaimer</a>
	</div>
</div>


</body>
</html>



