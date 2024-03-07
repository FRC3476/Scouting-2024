<title>Team Data</title>
<html lang="en">

<?php include('navbar.php');?>


<body class="bg-body">
    <div class="container row-offcanvas row-offcanvas-left">
        <div class="well column col-lg-12 col-sm-12 col-xs-12" id="content">
            <br>
            <div class="input-group mb-3">
                <input id="inputTeamNumber" type="text" class="form-control" placeholder="Enter Team Number">
                <button id="readAllTeamMatchData" type="button" class="btn btn-primary">Load Team Data</button>
            </div>
  
            <div class="row">
                
                <!-- Number + Pictures -->
                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                    <div class="card mb-3 mt-3">
                        <div class="card-header"><h2 id='teamHeading'></h2></div>
                        <div class="card-body">

                          <div id="robotPicsCarousel" class="carousel slide" data-interval="false">
                            <div id="robotPics" class="carousel-inner">

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#robotPicsCarousel" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#robotPicsCarousel" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                        </div>
                    </div>


                    <div class="card mb-3 mt-3">
                        <div class="card-header">Pit Data</div>
                        <div class="card-body overflow-auto">

                          <table class='table table-striped'>
                            <thead>
                              <th scope="col">Pit Org</th>
                              <th scope="col">Batteries</th>
                              <th scope="col">Chargers</th>
                              <th scope="col">Language</th>
                              <th scope="col">Auto</th>
                              <th scope="col">Perimeter</th>
                              <th scope="col">Comments</th>
                            </thead>
                            <tbody id='pitData'></tbody>
                          </table>

                        </div>
                    </div>
					
					<div class="card mb-3 mt-3">
                        <div class="card-header">Strike Data</div>
                        <div class="card-body overflow-auto">

                          <table class='table table-striped'>
                            <thead>
                              <th scope="col">Vibe Check</th>
                              <th scope="col">Bumper Check</th>
                              <th scope="col">Mechanical Robustness</th>
                              <th scope="col">Electrical Robustness</th>
                              <th scope="col">Comments</th>
                            </thead>
                            <tbody id='strikeData'></tbody>
                          </table>

                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                    <div class="card mb-3 mt-3">
                        <div class="card-header">Summary</div>
                        <div class="card-body">

                          <table class='table table-striped'>
                            <thead>
                              <th scope="col"></th>
                              <th scope="col">Auto</th>
                              <th scope="col">Teleop</th>
							                <th scope="col">Total</th>
                            </thead>
                            <tbody id='totalSummary'></tbody>
                          </table>

                          <h5>Auto Table</h5>
                          <table class='table table-striped'>
                            <thead>
                              <th scope="col"></th>
                              <th scope="col">Average</th>
                              <th scope="col">Max</th>
                            </thead>
                            <tbody id='autoSummaryData'></tbody>
                          </table>

                          <h5>Teleop Table</h5>
                          <table class='table table-striped'>
                            <thead>
                              <th scope="col"></th>
                              <th scope="col">Average</th>
                              <th scope="col">Max</th>
                            </thead>
                            <tbody id='teleopSummaryData'></tbody>
                          </table>
                            
                          <h5>Endgame Table</h5>
                          <table class='table table-striped'>
                            <thead>
                              <th scope="col"></th>
                              <th scope="col">Percentages</th>
                            </thead>
                            <tbody id='endgameSummaryData'></tbody>
                          </table>
                        </div>
                    </div>
                </div>

            
                <!-- Comment Data -->
                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                  <div class="card mb-3 mt-3">
                        <div class="card-header">Comments</div>
                        <div class="card-body overflow-auto">

                          <div id='cannedComments' class='container'>
                          </div>
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                  <div class="card mb-3 mt-3">
                        <div class="card-header">Written Comments</div>
                        <div class="card-body overflow-auto">

                          <div id='writtenComments' class='container'>
                          </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                    <div class="card mb-3 mt-3">
                        <div class="card-header">Auto Piece Chart</div>
                        <div class="card-body">
                          <canvas id="dataChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                    <div class="card mb-3 mt-3">
                        <div class="card-header">Teleop Piece Chart</div>
                        <div class="card-body">
                          <canvas id="pieceChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 col-xs-12 gx-3">
                    <div class="card mb-3 mt-3">
                        <div class="card-header">Endgame Chart</div>
                        <div class="card-body">
                          <canvas id="endgameChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include("footer.php"); ?>
<script type="text/javascript" src="js/charts.js"></script>
<script type="text/javascript" src="js/matchDataProcessor.js"></script>

<script>
  var dataChart = null;
  var pieceChart = null;
  var endgameChart = null;

  function clearData(){
    $('#teamHeading').html('');
    $('#robotPics').html('');
    $('#pitData').html('');
    $('#autoSummaryData').html('');
    $('#teleopSummaryData').html('');
    $('#totalSummary').html('');
    $('#endgameSummaryData').html('');
    if(dataChart != null){
      dataChart.destroy();
    }
    if(pieceChart != null){
      pieceChart.destroy();
    }
    if(endgameChart != null){
      endgameChart.destroy();
    }
    $('#cannedComments').html('');
    $('#writtenComments').html('');

  }

  function createSummaryData(data){
    var tTrap = 0;
    var tTrapMax = 0;
    var matchCount = 0;
    var pointsAuto = 0;
    var pointsTeleop = 0;
    var pointsTotal = 0;
    var piecesTotal = 0;
    var pointsMaxAuto = 0;
    var pointsMaxTeleop = 0;
    var pointsMax = 0;
    var piecesMax = 0;
    var aMobility = 0;
    var aTotal = 0;
    var aSpeaker = 0;
    var aAmp = 0;
    var aTotalMax = 0;
    var aSpeakerMax = 0;
    var aAmpMax = 0;
    var tTotal = 0;
    var tAmp = 0;
    var tSpeaker = 0;
    var tAmplifiedSpeaker = 0;
    var tTotalMax = 0;
    var tAmpMax = 0;
    var tSpeakerMax = 0;
    var tAmplifiedSpeakerMax = 0;
    var climbNotInStage = 0;
    var climbInStage = 0;
    var climb = 0;
    var climbTrap = 0;
    var climbPoints = 0;
    var climbPointsMax = 0;

    var Harmony = 0;
    var Spotlighed = 0;

    // Process summary data.
    for (var i = 0; i != data.length; i++){
      var row = data[i];
      matchCount++;
      console.log(row);
      console.log(data.length);
      
      pointsAuto += getMatchPointsAuto(row);      //Points in Auto
      pointsTeleop += getMatchPointsTeleop(row);  //Points in Teleop
	    pointsTotal += getMatchPoints(row);         //Points in Auto + Teleop
	    piecesTotal += getNotes(row);               //Total Pieces Overall

      pointsMaxAuto = Math.max(pointsMaxAuto, getMatchPointsAuto(row));   //Max Points Auto
      pointsMaxTeleop = Math.max(pointsMaxTeleop, getMatchPointsTeleop(row));   //Max Points Teleop
      pointsMax = Math.max(pointsMax, getMatchPoints(row));   //Max Points
      piecesMax = Math.max(piecesMax, getNotes(row));         //Max Pieces


      aMobility += getMobilityAuto(row) ? 1 : 0;  //# Auto Mobility
      aTotal += getAutoPieces(row);     //# Auto Pieces
      aSpeaker += getSpeakerAuto(row);
      aAmp += getAmpAuto(row);
      aTotalMax = Math.max(aTotalMax, getAutoPieces(row));
      aSpeakerMax = Math.max(aSpeakerMax, getSpeakerAuto(row));
      aAmpMax = Math.max(aAmpMax, getAmpAuto(row));

      tTotal += getTeleopPieces(row);
      tAmp += getAmpTeleop(row);
      tSpeaker += getSpeakerTeleop(row);
      tAmplifiedSpeaker += getSpeakerAmplifiedTeleop(row);
      tTrap += getTrapTeleop(row);
      tTotalMax = Math.max(tTotalMax, getTeleopPieces(row));
      tAmpMax = Math.max(tAmpMax, getAmpTeleop(row));
      tSpeakerMax = Math.max(tSpeakerMax, getSpeakerTeleop(row));
      tAmplifiedSpeakerMax = Math.max(tAmplifiedSpeakerMax, getSpeakerAmplifiedTeleop(row));
      tTrapMax = Math.max(tTrapMax, getTrapTeleop(row));


      climbNotInStage += getNotInStage(row) ? 1 : 0;
      climbInStage += getInStage(row) ? 1 : 0;
      climb += getClimb(row) ? 1: 0;
      climbTrap += getTrappedWhileClimbed(row) ? 1 : 0;
      climbPoints += getTeleopClimbPoints(row);
      climbPointsMax = Math.max(climbPointsMax, getTeleopClimbPoints(row));
      Harmony += getHarmony(row) ? 1 : 0;;
      Spotlighed += getSpotlighted(row) ? 1 : 0;;
    }

    // Only add data if over 0.
    if (matchCount > 0){
      // Calculate avg.
      pointsAuto = (pointsAuto / matchCount).toFixed(2);
      pointsTeleop = (pointsTeleop / matchCount).toFixed(2);
      pointsTotal = (pointsTotal / matchCount).toFixed(2);
      piecesTotal = (piecesTotal / matchCount).toFixed(2);
      aMobility = (aMobility / matchCount).toFixed(2);
      aTotal = (aTotal / matchCount).toFixed(2);
      aSpeaker = (aSpeaker / matchCount).toFixed(2);
      aAmp = (aAmp / matchCount).toFixed(2);
      tTotal = (tTotal / matchCount).toFixed(2);
      tSpeaker = (tSpeaker / matchCount).toFixed(2);
      tAmplifiedSpeaker = (tAmplifiedSpeaker / matchCount).toFixed(2);
      tAmp = (tAmp / matchCount).toFixed(2);
      tTrap = (tTrap / matchCount).toFixed(2);

      climbNotInStage = (climbNotInStage / matchCount).toFixed(2);
      climbInStage = (climbInStage / matchCount).toFixed(2);
      climb = (climb / matchCount).toFixed(2);
      climbTrap = (climbTrap / matchCount).toFixed(2);
      climbPoints = (climbPoints / matchCount).toFixed(2);
      climbPointsMax = (climbPointsMax / matchCount).toFixed(2);
      Harmony = (Harmony / matchCount).toFixed(2);
      Spotlighed = (Spotlighed / matchCount).toFixed(2);

      // Auto summary.
      var autoSummaryRows = [
        ` <tr><th scope='row'>Total Pieces</th><td scope='row'>${aTotal}</td><td scope='row'>${aTotalMax}</td></tr>`,
        ` <tr><th scope='row'>Amp</th><td scope='row'>${aAmp}</td><td scope='row'>${aAmpMax}</td></tr>`,
        ` <tr><th scope='row'>Speaker</th><td scope='row'>${aSpeaker}</td><td scope='row'>${aSpeakerMax}</td></tr>`,
        ` <tr><th scope='row'>Mobility</th><td scope='row'>${100*aMobility}%</td><td scope='row'>N/A</td></tr>`
      ].join('');
      $('#autoSummaryData').append(autoSummaryRows);

      // Teleop summary.
      var teleopSummaryRows = [
        ` <tr><th scope='row'>Total Pieces</th><td scope='row'>${tTotal}</td><td scope='row'>${tTotalMax}</td></tr>`,
        ` <tr><th scope='row'>Amp</th><td scope='row'>${tAmp}</td><td scope='row'>${tAmpMax}</td></tr>`,
        ` <tr><th scope='row'>Speaker</th><td scope='row'>${tSpeaker}</td><td scope='row'>${tSpeakerMax}</td></tr>`,
        ` <tr><th scope='row'>Amplified Speaker</th><td scope='row'>${tAmplifiedSpeaker}</td><td scope='row'>${tAmplifiedSpeakerMax}</td></tr>`,
        ` <tr><th scope='row'>Teleop Trap</th><td scope='row'>${tTrap}</td><td scope='row'>${tTrapMax}</td></tr>`
      ].join('');
      $('#teleopSummaryData').append(teleopSummaryRows);

      // Endgame summary.
      var endgameSummaryRows = [
        ` <tr><th scope='row'>Park</th><td scope='row'>${100*climbInStage}%</td></tr>`,
        ` <tr><th scope='row'>Climb</th><td scope='row'>${100*climb}%</td></tr>`,
        ` <tr><th scope='row'>Climb and Trap</th><td scope='row'>${100*climbTrap}%</td></tr>`,
        ` <tr><th scope='row'>Harmony</th><td scope='row'>${100*Harmony}%</td></tr>`,
        ` <tr><th scope='row'>Spotlighed</th><td scope='row'>${100*Spotlighed}%</td</tr>`
      ].join('');
      $('#endgameSummaryData').append(endgameSummaryRows);

      var totalSummaryRows = [
        ` <tr><th scope='row'>Average Points</th><td scope='row'>${pointsAuto}</td><td scope='row'>${pointsTeleop}</td><td scope='row'>${pointsTotal}</td></tr>`,
        ` <tr><th scope='row'>Average Game Pieces</th><td scope='row'>${aTotal}</td><td scope='row'>${tTotal}</td><td scope='row'>${piecesTotal}</td></tr>`,
      ].join('');
      $('#totalSummary').append(totalSummaryRows);
    }
  }

  function createDataChart(data){
    var matchList = [];
    var amp = [];
    var speaker = []
    var totalPieces = [];

    for (var i = 0; i != data.length; i++){
      var row = data[i];
      matchList.push(row['matchNumber']);
      amp.push(getAmpAuto(row));
      speaker.push(getSpeakerAuto(row));
      totalPieces.push(getAutoPieces(row));
    }

    var ctx = document.getElementById('dataChart');

    dataChart = new Chart(ctx, {
      data: {
        datasets: [{
          type: 'bar',
          label: 'Amp',
          data: amp,
          stack: 'Stack 0',
          backgroundColor: 'rgba(0, 128, 128, 0.5)'
        }, {
          type: 'bar',
          label: 'Speaker',
          data: speaker,
          stack: 'Stack 1',
          backgroundColor: 'rgba(255, 155, 50, 0.8)'
        }, {
          type: 'line',
          label: 'Total Pieces',
          data: totalPieces,
          borderColor: 'rgb(0, 0, 0)'
        }

        ],
        labels: matchList
      }
    });

  }

  function createPieceChart(data){
    var matchList = [];
    var amp = [];
    var speaker = []
    var ampSpeaker = [];
    var telTrap = [];
    var totalPieces = [];
    for (var i = 0; i != data.length; i++){
      var row = data[i];
      matchList.push(row['matchNumber']);

      amp.push(getAmpTeleop(row));
      speaker.push(getSpeakerTeleop(row));
      ampSpeaker.push(getSpeakerAmplifiedTeleop(row));
      telTrap.push(getTrapTeleop(row));
      totalPieces.push(getTeleopPieces(row));
    }

    var ctx = document.getElementById('pieceChart');

    pieceChart = new Chart(ctx, {
      data: {
        datasets: [{
          type: 'bar',
          label: 'Amp',
          data: amp,
          stack: 'Stack 0',
          backgroundColor: 'rgba(0, 128, 128, 0.5)'
        }, {
          type: 'bar',
          label: 'Speaker',
          data: speaker,
          stack: 'Stack 1',
          backgroundColor: 'rgba(255, 155, 50, 0.8)'
        }, {
          type: 'bar',
          label: 'Amplified Speaker',
          data: ampSpeaker,
          stack: 'Stack 1',
          backgroundColor: 'rgba(251, 192, 147, 0.95)'
        }, {
          type: 'bar',
          label: 'Teleop Trap',
          data: telTrap,
          stack: 'Stack 2',
          backgroundColor: 'rgba(155, 125, 255, 0.8)'
        }, {
          type: 'line',
          label: 'Total Pieces',
          data: totalPieces,
          borderColor: 'rgb(0, 0, 0)'
        },

        ],
        labels: matchList
      }
    });
  }

  function createEndgameChart(data){
    var matchList = [];
    var park = [];
    var climb = []
    var climb_trap = [];
    var harmony = [];
    var spotlight = [];
    for (var i = 0; i != data.length; i++){
      var row = data[i];
      matchList.push(row['matchNumber']);

      park.push(getInStage(row));
      if(getTrappedWhileClimbed(row)){
        climb.push(getTrappedWhileClimbed(row));
        climb_trap.push(getTrappedWhileClimbed(row));
      }else{
        climb.push(getClimb(row));
        climb_trap.push(getTrappedWhileClimbed(row));
      }
      harmony.push(getHarmony(row));
      spotlight.push(getSpotlighted(row));
    }

    var ctx = document.getElementById('endgameChart');
    endgameChart = new Chart(ctx, {
      data: {
        datasets: [{
          type: 'bar',
          label: 'Park',
          data: park,
          stack: 'Stack 1',
          backgroundColor: 'rgba(0, 235, 243, 1)'
        }, {
          type: 'bar',
          label: 'Climb',
          data: climb,
          stack: 'Stack 1',
          backgroundColor: 'rgba(41, 230, 243, 0.7)'
        }, {
          type: 'bar',
          label: 'Climb and Trap',
          data: climb_trap,
          stack: 'Stack 1',
          backgroundColor: 'rgba(136, 243, 241, 0.8)'
        }, {
          type: 'bar',
          label: 'Harmony',
          data: harmony,
          stack: 'Stack 2',
          backgroundColor: 'rgba(104, 243, 146, 0.8)'
        }, {
          type: 'bar',
          label: 'Spotlight',
          data: spotlight,
          stack: 'Stack 2',
          backgroundColor: 'rgba(243, 160, 225, 0.8)'
        },

        ],
        labels: matchList
      }
    });
  }

//Dont need changing


  function createCannedBadge(comment, matchList){
    var matches = matchList.join(', ');
    var count = matchList.length;
    var rows = [
      `<button style="margin-right:10px; margin-bottom:10px;" type="button" class="btn btn-primary position-relative" data-bs-container="#cannedComments" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="${matches}">`,
      `  ${comment}`,
      `  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">`,
      `    ${count}`,
     //  `    <span class="visually-hidden">${comment}</span>`,
      `  </span>`,
      `</button>`
    ].join('');
    $('#cannedComments').append(rows);
  }

  function createCannedComments(data) {
    var commentLookup = getCannedCommentsDictionary(data);

    for(let comment in commentLookup){
      createCannedBadge(comment, commentLookup[comment]);
    }

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  }

  function createWrittenComments(data) {
    var writtenComments = []
    writtenComments = getWrittenComments(data);

    for(var i = 0; i != writtenComments.length; i+=2){
      var row = [
        `<button style="margin-right:10px; margin-bottom:10px;" type="button" class="btn btn-primary position-relative">`,
        `${writtenComments[i+1]}` + `${writtenComments[i]}`,
        `</button>`
      
      ].join('');
      $('#writtenComments').append(row);
    }

  }

  var ba = 0;

  function sortMatchData(data){
    return data.sort(function(a , b){
      return a['matchNumber'] - b['matchNumber'];
    });
  }

  function loadTeamData(teamNumber){
    $.get('readAPI.php', {
      'readAllTeamMatchData': teamNumber
    }).done(function(data) {
      matchData = JSON.parse(data);
      matchData = sortMatchData(matchData);
      createSummaryData(matchData);
      createDataChart(matchData);
      createPieceChart(matchData);
      createEndgameChart(matchData);
      createWrittenComments(matchData);
      createCannedComments(matchData);
    });
  }

  function loadPitData(teamNumber){
    $.get('readAPI.php', {
      'readAllTeamPitData': teamNumber
    }).done(function(data) {
      var pit = JSON.parse(data);
      if (pit.length > 0){
        pit = pit[0];
        $('#teamHeading').html(`Team ${teamNumber}`);
        var row = [
          `<tr>`,
          ` <td scope='row'>${pit['disorganized']}</td>`,
          ` <td scope='row'>${pit['numBatteries']}</td>`,
          ` <td scope='row'>${pit['chargedBatteries']}</td>`,
          ` <td scope='row'>${pit['codeLanguage']}</td>`,
          ` <td scope='row'>${pit['autoPath']}</td>`,
          ` <td scope='row'>${pit['framePerimeterDimensions']}</td>`,
          ` <td scope='row'>${pit['pitComments']}</td>`,
          `</tr>`
        ].join('');
        $('#pitData').append(row);
      }
    });
  }
  
  function loadStrikeData(teamNumber){
    $.get('readAPI.php', {
      'readAllTeamStrikeData': teamNumber
    }).done(function(data) {
      var strike = JSON.parse(data);
      if (strike.length > 0){
        strike = strike[0];
        $('#teamHeading').html(`Team ${teamNumber}`);
        var row = [
          `<tr>`,
          ` <td scope='row'>${strike['vibes']}</td>`,
          ` <td scope='row'>${strike['bumpers']}</td>`,
          ` <td scope='row'>${strike['mechRobustness']}</td>`,
          ` <td scope='row'>${strike['elecRobustness']}</td>`,
          ` <td scope='row'>${strike['strikeComments']}</td>`,
          `</tr>`
        ].join('');
        $('#strikeData').append(row);
      }
    });
  }

  function loadTeamPictures(teamNumber){
    $.get('readAPI.php', {
      'getTeamPictureFilenames': teamNumber
    }).done(function(data) {
      var images = JSON.parse(data);
      for(var i = 0; i != images.length; i++){
        var classElement = 'carousel-item'
        if (i == 0){
          classElement = 'carousel-item active';
        }
        var element = [
          `<div class='${classElement}'>`,
          ` <img src='${images[i]}' class='d-block w-100'>`,
          `</div>`
        ].join('');
        $('#robotPics').append(element);
      }
    });
  }

  function loadTeam(teamNumber){
    clearData();

    // Set Team Number
    $('#teamHeading').html('Team ' + teamNumber);

    loadTeamPictures(teamNumber);
    loadPitData(teamNumber);
	  loadStrikeData(teamNumber);
    loadTeamData(teamNumber);
  }

  $(document).ready(function () {
    const url = new URLSearchParams(window.location.search);
    if (url.has('team')){
      loadTeam(url.get('team'));
    }
  });

  $('#readAllTeamMatchData').on('click', function(){
    loadTeam($('#inputTeamNumber').val());
  });
</script>
</html>