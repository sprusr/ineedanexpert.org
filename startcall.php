<!DOCTYPE html>
<html>

<!--
	Requires 2 variables to be posted:
		sessionID: ID of the video chat session
		userType ('asker'/'answerer'): Type of the user
	app.js needs to be edited to redirect to the correct places.
-->

<head>
    <title>Chat</title>
    <link href="video_page/css/app.css" rel="stylesheet" type="text/css">

    <script src="https://static.opentok.com/v2/js/opentok.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body style="background-image: url('video_page/img/sky.jpg'); background-size: cover">

    <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>

	<div style="height: 5%"></div>

	<?php
		require "video_page/opentok.phar";
		use OpenTok\OpenTok;

		//$sessionID = $_POST["sessionID"];
		$sessionID = "1_MX40NTQyNzc3Mn5-MTQ0OTM3NDM1MTk4Mn5MVStKL1lkVVBQcHN1L0pDWDMydmxMMjl-UH4";
		$opentok = new OpenTok(45427772, "51ce05e8512d7bb676c94be7fe86cd692b32793a");
		$token = $opentok->generateToken($sessionID);
		$apiKey = 45427772;

		$_POST["userType"] = "asker";
	?>

	<script type="text/javascript">
		var apiKey,
			sessionId,
			token,
			session;

		$(document).ready(function() {
			$.get(SAMPLE_SERVER_BASE_URL + '/session', function(res) {
				apiKey = <?php echo $apiKey; ?>;
				sessionId = <?php echo '"' . $sessionID . '"'; ?>;
				token = <?php echo '"' . $token . '"'; ?>;
				initializeSession();
			});
		});

		function initializeSession() {
			session = OT.initSession(apiKey, sessionId);
			var userType = <?php echo '"' . $_POST["userType"] . '"'; ?>;

			session.on('streamCreated', function(event) {
				session.subscribe(event.stream, 'subscriber', {
					insertMode: 'append',
					width: '100%',
					height: '100%'
				});
			});

			session.on('sessionDisconnected', function(event) {
				alert('You were disconnected from the session.', event.reason);
				setTimeout(5000, redirect(userType));
			});

			session.connect(token, function(error) {
				if (!error) {
					var publisher = OT.initPublisher('publisher', {
						insertMode: 'append',
						width: '100%',
						height: '100%'
					});

					session.publish(publisher);
				} else {
					console.log('There was an error connecting to the session: ', error.code, error.message);
				}
			});
		}

		function redirect(userType) {
			if (userType == "asker") {
				//set to location asker should be sent
				window.location = "video_page/lol.php";
			} else {
				//set to location answerer should be sent
				window.location = "video_page/lol.php";
			}
		}

		function endSession() {
			alert("before");
			session.disconnect();
			alert("after");
		}
	</script>

	<div id="endsession">
		<button onclick="endSession();">End Session</button>
	</div>

	<!--<script type="text/javascript" src="js/app.js"></script>-->
	<script type="text/javascript" src="video_page/js/config.js"></script>

</html>
