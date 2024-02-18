//Comment Functions
function getProblematicCannedCommentMatchCount(data){
    var problematicComments = ['Tipped', 'Didn\'t Move', 'Broken', 'Did Not Show Up', 'Bumpers Fell Off'];
    var commentDict = getCannedCommentsDictionary(data);
    var matchList = [];
    for (var i = 0; i != problematicComments.length; i++){
        var comment = problematicComments[i];
        if (comment in commentDict){
            matchList = [...matchList, ...commentDict[comment]];
        }
    }
    var matchSet = new Set(matchList);
    return matchSet.size;
}
function getCannedCommentsDictionary(data) {
    /* Returns a mapping of comment to list of matches */
    var commentLookup = {};
    for (var i = 0; i != data.length; i++) {
        var row = data[i];
        if (row['cannedComments'] === '' || row['cannedComments'] == 0) {
            continue;
        }
        var cannedSplit = row['cannedComments'].split(',');
        for (var j = 0; j != cannedSplit.length; j++) {
            var comment = cannedSplit[j];
            if (!(comment in commentLookup)) {
                commentLookup[comment] = [];
            }
            commentLookup[comment].push(row['matchNumber']);
        }
    }
    return commentLookup;
}
function getWrittenComments(data) {
    var comments = [];
    for (var i = 0; i != data.length; i++) {
        var row = data[i];
        if (row['textComments'] === '') {
            continue;
        }
        comments.push(row['textComments']);
        comments.push("Match " + row['matchNumber'] + ": ");
    }
    return comments;
}
//Climb Functions
function getMobilityAuto(row) {
    return row['autoMobility'] === 1;
}
function getNotInStage(row) {
    return row['climb'] == 'NOT IN STAGE';
}
function getInStage(row) {
    return row['climb'] == 'IN STAGE';
}
function getClimbed(row) {
    return row['climb'] == 'CLIMBED';
}
function getTrappedWhileClimbed(row) {
    return row['climb'] == 'TRAPPED WHILE CLIMBED';
}
function getSpotlighted(row) {
    return row['climbSpotlighted'] === 1;
}
function getHarmony(row) {
    return row['climbHarmony'] === 1;
}
function getTeleopClimbPoints(row){
    var points = 0;
    points += getInStage(row) ? 1 : 0;
	points += getClimb(row) ? 3 : 0;
	points += getTrappedWhileClimbed(row) ? 8 : 0;
	if((points != 0) && (getSpotlighted(row))){
		points+=1;
	}
	else if((points != 0) && (getHarmony(row))){
		points+=2;
	}
	else if ((points != 0) && (getHarmony(row) && (getSpotligted(row)))){
		points+=3;
	}
    return points;
}
//Auto Piece Functions
function getSpeakerAuto(row) {
	return row['autoSpeakerNote'];
}
function getAmpAuto(row){
	return row['autoAmpNote'];
}
//Teleop Piece Functions
function getSpeakerTeleop(row){
	return row['teleopSpeaker'];
}
function getSpeakerAmplifiedTeleop(row){
	return row['teleopSpeakerAmplified'];
}
function getAmpTeleop(row){
	return row['teleopAmpNote'];
}
function getTrapTeleop(row){
	return row['teleopTrap'];
}
//Piece Functions
function getAutoPieces(row){
	return (row['autoSpeakerNote'] + 
		row['autoAmpNote']);
}
function getTeleopPieces(row){
	return (row['teleopSpeaker'] + 
		row['teleopSpeakerAmplified'] + 
		row['teleopAmpNote'] + 
		row['teleopTrap']);
}
function getNotes(row){
	return getAutoPieces(row) + getTeleopPieces(row);
}
//Get Point Functions
function getMatchPointsAuto(row) {
	var points = 0;
	if (getMobilityAuto(row)) {
		points += 2;
	}
	points += 2 * getSpeakerAuto(row);
	points += 5 * getAmpAuto(row);
	return points;
}

function getMatchPointsTeleop(row) {
	var points = 0;
	if (getDockTeleop(row)) {
		points += 6;
	}
	if (getEngageTeleop(row)) {
		points += 10;
	}
	if (getParkTeleop(row)){
		points += 2;
	}
	points += 2 * getSpeakerTeleop(row);
	points += 5 * getSpeakerAmplifiedTeleop(row);
	points += 1 * getAmpTeleop(row);
	points += 5 * getTrapTeleop(row);
	return points;
}

function getMatchPoints(row) {
	var points = 0;
	if (getMobilityAuto(row)) {
		points += 2;
	}
	if (getInStage(row)) {
		points += 1;
	}
	if (getClimbed(row)) {
		points += 3;
	}
	if (getTrappedWhileClimbed(row)){
		points += 2;
	}
	if (getTrappedWhileClimbed(row)){
		points += 2;
	}
	points += 2 * getSpeakerAuto(row);
	points += 5 * getAmpAuto(row);
	points += 2 * getSpeakerTeleop(row);
	points += 5 * getSpeakerAmplifiedTeleop(row);
	points += 1 * getAmpTeleop(row);
	points += 5 * getTrapTeleop(row);
	return points;
}

function getWeightedScore(row) {
	var weightedScore = 0;
	if (getSpeakerAmplified(row)){
		weightedScore+= 5;
	}
	

	weightedScore += 4 * getTopAuto(row);
	weightedScore += 3 * getMiddleAuto(row);
	weightedScore += 2 * getBottomAuto(row);
	weightedScore += 2.5 * getTopTeleop(row);
	weightedScore += 1.75 * getMiddleTeleop(row);
	weightedScore += 1 * getBottomTeleop(row);
	weightedScore += 3 * getEngageTeleop(row);
	weightedScore += 2 * getDockTeleop(row);
	weightedScore += 0.5 * getParkTeleop(row);
	weightedScore += 4 * getEngageAuto(row);
	weightedScore += 2 * getDockAuto(row);
	weightedScore += 2 * getMobilityAuto(row);
	return weightedScore;
}