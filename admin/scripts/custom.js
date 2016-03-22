
var ScriptRoute = "/onlymakebelieve/api/scripts.php";

var log = function(data) {
	if(!data) data = "<br>";
	$("#test-output").html($("#test-output").html()+"<br>"+data);
}

$(document).ready(function() {

	// Test scripts
	log("Initializing tests...");
	log();

	$.get(ScriptRoute, {
		id:1
	}, function(data) {
		log("Testing Script by Id:");
		log(data);
		log();
	});

	$.get(ScriptRoute, {
		user:3
	}, function(data) {
		log("Testing Script by UserId:");
		log(data);
		log();
	});

	/*
	// Testing Insert
	$.post(ScriptRoute, {
		name:"Test",
		synopsis:"Test"
	}, function(data) {
		log("Testing Script Edit/Post:");
		log("Inserting: Name=Test Syn=Test");
		if(data == "Success") {
			log("Insert Success");
		} else {
			log("Test Failed");
		}
		log();
	})
	*/

	// Testing update
	$.post(ScriptRoute, {
		id:2,
		name:"Test",
		synopsis:"Test"
	}, function(data) {
		log("Testing Script Edit/Post:");
		log("Updating: Id=2, Name=Test Syn=Test");
		if(data == "Success") {
			log("Insert Success");
		} else {
			log("Test Failed");
		}
		log();
	})

})