<title>Lead Scout Form</title>
<html lang="en">

<?php include('navbar.php'); ?>

<body class="bg-body">
  <div class="container row-offcanvas row-offcanvas-left">
    <div class="well column col-lg-12 col-sm-12 col-xs-12" id="content">
      <div class="row pt-3 pb-3 mb-3 justify-content-md-center">
      
        <!-- Left column -->
        <div class="col-md-6 col-sm-12 col-xs-12 gx-3">
          <div class="card">
            <div class="card-body">

                <div id='ourMatches'></div>

                <div class="input-group mb-3">
                  <select class="form-select" id="writeCompLevel" aria-label="Comp Level Select">
                    <option value="qm">QM</option>
                    <option value="sf">SF</option>
                    <option value="f">F</option>
                  </select>
                  <input id="writeMatchNumber" type="text" class="form-control" placeholder="Match Number" aria-label="writeMatchNumber">
                  <button id="loadMatch" type="button" class="btn btn-primary">Load Match</button>
                </div>

                <h3 id='matchBanner'>Match:</h3>
            
            </div>
          </div>
        </div>
      </div>

      <div class="row pt-3 pb-3 mb-3 justify-content-md-center">

				<div class="col-6 gx-3">
					<div class="card">
            <div class="card-body">
							<h3>Team List</h3>
							<table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Color</th>
                    <th scope="col">Team #</th>
                  </tr>
                </thead>
                <tbody id="rawAllianceRows">
                </tbody>
              </table>
						</div>
					</div>
				</div>

				<div class="col-6 gx-3">
					<div class="card">
            <div class="card-body">
							<h3>Rank</h3>
							<table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Color</th>
                    <th scope="col">Team #</th>
                  </tr>
                </thead>
                <tbody id="sortedAllianceRank">
                </tbody>
              </table>
						</div>
					</div>
				</div>

			</div>

			<div class="row pt-78 pb-3 mb-3 justify-content-md-center">
      	<button id="submitData" type="button" class="btn btn-success">Submit Ranking</button>
    	</div>

      <div class="row pt-3 pb-3 mb-3 gap-0 row-gap-3">
        <div class="col-lg-4 col-sm-12 col-xs-12 gx-3">
          <div class="card text-bg-danger">
            <div class="card-body">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingRed1">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#picRed1Accordian" aria-expanded="true" aria-controls="picRed1Accordian">
                    <h4><div id='teamHeadingRed1'>Team</div></h4>
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </div>
                  </button>
                </h2>
                <div id="picRed1Accordian" class="accordion-collapse collapse" aria-labelledby="headingRed1">
                  <div id='picRed1' class="accordion-body">

                  </div>
                </div>
              </div>

              <div class='overflow-auto'>
                <table class='table text-bg-danger'>
                  <thead>
                    <th scope="col">Avg Auto Pieces</th>
                    <th scope="col">Auto Speaker</th>
                    <th scope="col">Avg Telop Pieces</th>
                    <th scope="col">Avg Telop Speaker</th>
                    <th scope="col">Avg Telop Amp</th>
                    <th scope="col">Telop Climb %</th>
                    <th scope="col">Telop Harmony %</th>
                  </thead>
                  <tbody id='dataRed1'></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-sm-12 col-xs-12 gx-3">
          <div class="card text-bg-danger">
            <div class="card-body">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingRed2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#picRed2Accordian" aria-expanded="true" aria-controls="picRed2Accordian">
                    <h4><div id='teamHeadingRed2'>Team</div></h4>
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </div>
                  </button>
                </h2>
                <div id="picRed2Accordian" class="accordion-collapse collapse" aria-labelledby="headingRed2">
                  <div id='picRed2' class="accordion-body">

                  </div>
                </div>
              </div>

              <div class='overflow-auto'>
                <table class='table text-bg-danger'>
                  <thead>
                    <th scope="col">Avg Auto Pieces</th>
                    <th scope="col">Auto Speaker</th>
                    <th scope="col">Avg Telop Pieces</th>
                    <th scope="col">Avg Telop Speaker</th>
                    <th scope="col">Avg Telop Amp</th>
                    <th scope="col">Telop Climb %</th>
                    <th scope="col">Telop Harmony %</th>
                  </thead>
                  <tbody id='dataRed2'></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        
        <div class="col-lg-4 col-sm-12 col-xs-12 gx-3">
          <div class="card text-bg-danger">
            <div class="card-body">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingRed3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#picRed3Accordian" aria-expanded="true" aria-controls="picRed3Accordian">
                    <h4><div id='teamHeadingRed3'>Team</div></h4>
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </div>
                  </button>
                </h2>
                <div id="picRed3Accordian" class="accordion-collapse collapse" aria-labelledby="headingRed3">
                  <div id='picRed3' class="accordion-body">

                  </div>
                </div>
              </div>

              <div class='overflow-auto'>
                <table class='table text-bg-danger'>
                  <thead>
                    <th scope="col">Avg Auto Pieces</th>
                    <th scope="col">Auto Speaker</th>
                    <th scope="col">Avg Telop Pieces</th>
                    <th scope="col">Avg Telop Speaker</th>
                    <th scope="col">Avg Telop Amp</th>
                    <th scope="col">Telop Climb %</th>
                    <th scope="col">Telop Harmony %</th>
                  </thead>
                  <tbody id='dataRed3'></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row pt-3 pb-3 mb-3 justify-content-md-center gap-0 row-gap-3">

      <div class="col-lg-4 col-sm-12 col-xs-12 gx-3">
          <div class="card text-bg-primary">
            <div class="card-body">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingBlue1">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#picBlue1Accordian" aria-expanded="true" aria-controls="picBlue1Accordian">
                    <h4><div id='teamHeadingBlue1'>Team</div></h4>
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </div>
                  </button>
                </h2>
                <div id="picBlue1Accordian" class="accordion-collapse collapse" aria-labelledby="headingBlue1">
                  <div id='picBlue1' class="accordion-body">
                  
                  </div>
                </div>
              </div>

              <div class='overflow-auto'>
                <table class='table text-bg-primary'>
                  <thead>
                    <th scope="col">Avg Auto Pieces</th>
                    <th scope="col">Auto Speaker</th>
                    <th scope="col">Avg Telop Pieces</th>
                    <th scope="col">Avg Telop Speaker</th>
                    <th scope="col">Avg Telop Amp</th>
                    <th scope="col">Telop Climb %</th>
                    <th scope="col">Telop Harmony %</th>
                  </thead>
                  <tbody id='dataBlue1'></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-sm-12 col-xs-12 gx-3">
          <div class="card text-bg-primary">
            <div class="card-body">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingBlue2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#picBlue2Accordian" aria-expanded="true" aria-controls="picBlue2Accordian">
                   <h4><div id='teamHeadingBlue2'>Team</div></h4>
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </div>
                  </button>
                </h2>
                <div id="picBlue2Accordian" class="accordion-collapse collapse" aria-labelledby="headingBlue2">
                  <div id='picBlue2' class="accordion-body">

                  </div>
                </div>
              </div>

              <div class='overflow-auto'>
                <table class='table text-bg-primary'>
                  <thead>
                    <th scope="col">Avg Auto Pieces</th>
                    <th scope="col">Auto Speaker</th>
                    <th scope="col">Avg Telop Pieces</th>
                    <th scope="col">Avg Telop Speaker</th>
                    <th scope="col">Avg Telop Amp</th>
                    <th scope="col">Telop Climb %</th>
                    <th scope="col">Telop Harmony %</th>
                  </thead>
                  <tbody id='dataBlue2'></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        
        <div class="col-lg-4 col-sm-12 col-xs-12 gx-3">
          <div class="card text-bg-primary">
            <div class="card-body">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingBlue3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#picBlue3Accordian" aria-expanded="true" aria-controls="picBlue3Accordian">
                    <h4><div id='teamHeadingBlue3'>Team</div></h4>
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </div>
                  </button>
                </h2>
                <div id="picBlue3Accordian" class="accordion-collapse collapse" aria-labelledby="headingBlue3">
                  <div id='picBlue3' class="accordion-body">

                  </div>
                </div>
              </div>

              <div class='overflow-auto'>
                <table class='table text-bg-primary'>
                  <thead>
                    <th scope="col">Avg Auto Pieces</th>
                    <th scope="col">Auto Speaker</th>
                    <th scope="col">Avg Telop Pieces</th>
                    <th scope="col">Avg Telop Speaker</th>
                    <th scope="col">Avg Telop Amp</th>
                    <th scope="col">Telop Climb %</th>
                    <th scope="col">Telop Harmony %</th>
                  </thead>
                  <tbody id='dataBlue3'></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

<?php include("footer.php"); ?>
<script type="text/javascript" src="js/sortable.min.js"></script>

<script type="text/javascript" src="js/charts.js"></script>
<script type="text/javascript" src="js/matchDataProcessor.js?cache=6"></script>

<script>

var validBlueTeams = 0;
var validRedTeams = 0

var avgBluePoints = 0;
var avgRedPoints = 0;

var avgBlueGamePieces = 0;
var avgRedGamePieces = 0;

var avgAutoBlueChargeStationPoints = 0;
var avgTeleopBlueChargeStationPoints = 0;
var avgAutoRedChargeStationPoints = 0;
var avgTeleopRedChargeStationPoints = 0;

var icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/></svg>';
var currentMatch = 0;


function clearData(){
  $('dataRed1').html('')
  $('dataRed2').html('')
  $('dataRed3').html('')
  $('dataBlue1').html('')
  $('dataBlue2').html('')
  $('dataBlue3').html('')
	$('#rawAllianceRows').html('');
	$('#sortedAllianceRank').html('');
	$('#matchBanner').html('Match:');
}


function augmentTeamDataSummary(data, elementSuffix){
  var matchCount = 0;
  var avgAutoPiece = 0;
  var avgAutoSpeaker = 0;
  var avgTelopPiece = 0;
  var avgTeleopSpeaker = 0;
  var avgTeleopAmp = 0;
  var avgTeleopClimb = 0;
  var avgTeleopHarmony = 0;
  for (var i = 0; i != data.length; i++){
    var match = data[i];
    matchCount++;
    avgAutoPiece += getPiecesAuto(match);
    avgAutoSpeaker += getSpeakerAuto(match);
    avgTelopPiece += getPiecesTeleop(match);
    avgTeleopSpeaker += getSpeakerTeleop(match) + getSpeakerAmplifiedTeleop(match);
    avgTeleopAmp += getAmpTeleop(match);
    avgTeleopClimb += getClimbTeleop(match) ? 1 : 0;
    avgTeleopHarmony += getHarmonyTeleop(match) ? 1 : 0;
  }

  if (matchCount > 0){
    avgAutoPiece = roundInt(avgAutoPiece / matchCount);
    avgAutoSpeaker = roundInt(100 * avgAutoSpeaker / matchCount);
    avgTelopPiece = roundInt(avgTelopPiece / matchCount);
    avgTeleopSpeaker = roundInt(avgTeleopSpeaker / matchCount);
    avgTeleopAmp = roundInt(avgTeleopAmp / matchCount);
    avgTeleopClimb = roundInt(100 * avgTeleopClimb / matchCount);
    avgTeleopHarmony = roundInt(100 * avgTeleopHarmony / matchCount);

    var rows = [
      `<tr>`,
      `  <td scope='col'>${avgAutoPiece}</td>`,
      `  <td scope='col'>${avgAutoSpeaker}%</td>`,
      `  <td scope='col'>${avgTelopPiece}</td>`,
      `  <td scope='col'>${avgTeleopSpeaker}</td>`,
      `  <td scope='col'>${avgTeleopAmp}</td>`,
      `  <td scope='col'>${avgTeleopClimb}%</td>`,
      `  <td scope='col'>${avgTeleopHarmony}%</td>`,
      `</tr>`
    ].join('');
    $(`#data${elementSuffix}`).html(rows);
  }
}

function createTeamDataSummary(alliance, index, teamNumber){
  var elementSuffix = `${alliance}${index}`;
  $(`#teamHeading${elementSuffix}`).html(teamNumber);

  // Load pics.
  $(`#pic${elementSuffix}`).html('');   
  $.get('readAPI.php', {
   'getTeamPictureFilenames': teamNumber
  }).done(function(data) { 
    var pics = JSON.parse(data); 
    if (pics.length > 0){
        $(`#pic${elementSuffix}`).html(`<img src='${pics[0]}' class='d-block w-100'>`);
    }
  });

  $.get('readAPI.php', {
   'readAllTeamMatchData': teamNumber
  }).done(function(data) { 
    var data = JSON.parse(data); 
    augmentTeamDataSummary(data, elementSuffix);
  });


}

function createDataSummaries(matchInfo){
  var redTeams = matchInfo['alliances']['red']['team_keys'];
  var blueTeams = matchInfo['alliances']['blue']['team_keys'];
  for(var i = 0; i != redTeams.length; i++){
    createTeamDataSummary('Red', i+1, strTeamToIntTeam(redTeams[i]));
  }
  for(var i = 0; i != blueTeams.length; i++){
    createTeamDataSummary('Blue', i+1, strTeamToIntTeam(blueTeams[i]));
  }
}

function strTeamToIntTeam(team) {
  return parseInt(team.replace(/^(frc)/, ''));
}

function getTimeStringFromNumber(timeNumber){
  var date = new Date(timeNumber * 1000);
  var hours = date.getHours();
  var suff = "AM";
  if (hours > 12) {
    hours = hours - 12;
    suff = "PM"
  }
  var minutes = "0" + date.getMinutes();
  return hours + ":" + minutes.substr(-2) + " " + suff;
}


function loadData(compLevel, matchNumber){
  console.log(compLevel);
  console.log(matchNumber);
  clearData();

  $('#matchBanner').html(`Match: ${compLevel}${matchNumber}`);

  $.get('tbaAPI.php', {
   'getMatchData': 1,
   'number' : matchNumber,
   'level' : compLevel
  }).done(function(data) { 
    var match = JSON.parse(data);
    createDataSummaries(match);
  });
}

function loadUserTeamList(){
  $.get('tbaAPI.php', {
   'getUserMatches': 1
  }).done(function(data) {
   matches = JSON.parse(data);
   var rows = [];
   for(const match of matches){
    var level = match[0];
    var num = match[1];
    rows.push(`<a href='./matchStrategy.php?level=${level}&match=${num}'><span class="badge text-bg-primary" style="margin-right:5px; margin-bottom:5px;" >${level}${num}</span></a>`)
   }
   $('#ourMatches').html(rows.join(''));
  });
}

function stripTeamTags(teamList) {
			var out = []
			for (let i = 0; i != teamList.length; i++) {
				var team = teamList[i];
				team = team.toUpperCase();
				team = team.replace("FRC", "");
				out.push(parseInt(team, 10));
			}
			return out;
		}

function addRawRow(color, team){
			var classItem = color == 'Red' ? 'table-danger' : 'table-info';
			var rows = [
				`<tr data-team='${team}' class='${classItem}'>`,
				`	<td scope='row' class='pickHandle'>${icon_svg}</td>`,
				`	<td scope='row'>${color}</td>`,
				`	<td scope='row'>${team}</td>`,
				`</tr>`
			].join('');
			$('#rawAllianceRows').append(rows);
		}

function loadMatch(number){
			currentMatch = number;
			clearData();

			$.get("tbaAPI.php", {
				getTeamsInMatch: number
			}).done(function(data) {
				$('#matchBanner').html(`Match: ${number}`);
				data = JSON.parse(data);
				var redTeams = stripTeamTags(data['red']);
				var blueTeams = stripTeamTags(data['blue']);

				for (let i = 0; i != redTeams.length; i++){addRawRow('Red', redTeams[i]);}
				for (let i = 0; i != blueTeams.length; i++){addRawRow('Blue', blueTeams[i]);}
			});
		}

function getSortedTeams() {
			var teamList = [];
			for (let tr of $("#sortedAllianceRank tr")) {
				teamList.push(Number($(tr).attr("data-team")));
			}
			return teamList;
		}

function saveRanking(){
			$.get("writeAPI.php", {
				match: currentMatch,
				saveAllianceRank: JSON.stringify(getSortedTeams())
			}).done(function(data) {
				data = JSON.parse(data);
				console.log(data);
				if (data['success'] != true){
					alert('Data did not submit!');
				}
				else {
					alert("Data successfully submitted!");
					clearData();
				}
			});
		}

$(document).ready(function() {
  loadUserTeamList();
  const url = new URLSearchParams(window.location.search);
  if (url.has('level') && url.has('match')){
    loadData(url.get('level'), url.get('match'));
  }

  unsortedTable = new Sortable(document.getElementById('rawAllianceRows'), {
    group: 'shared',
    animation: 150,
    sort: true,
    delayOnTouchOnly: true,
    fallbackTolerance: 3,
    scroll: true,
    handle: '.pickHandle'
  });

  sortedTable = new Sortable(document.getElementById('sortedAllianceRank'), {
    group: 'shared',
    animation: 150,
    sort: true,
    delayOnTouchOnly: true,
    fallbackTolerance: 3,
    scroll: true,
    handle: '.pickHandle'
  });



});

$('#loadMatch').on('click', function(){
    var matchNumber = $("#writeMatchNumber").val();
    var compLevel = $("#writeCompLevel").val();
    loadData(compLevel, matchNumber);
    loadMatch($('#writeMatchNumber').val());
});

$('#submitData').on('click', function(){
			saveRanking();
		});

</script>

</html>