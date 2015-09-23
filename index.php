<!DOCTYPE html>

<html>

	<head>

		<title>Simple Schedule</title>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,100" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icons.css">

		<link rel="stylesheet" href="css/default.css">
		<link rel="stylesheet" href="css/top-bar.css">
		<link rel="stylesheet" href="css/cards.css">
		<link rel="stylesheet" href="css/combos.css">
		<link rel="stylesheet" href="css/drawer.css">
		<link rel="stylesheet" href="css/intro.css">
		<link rel="stylesheet" href="css/media.css">

		<script src="js/jquery.js"></script>
		<script src="js/constants.js"></script>
		<script src="js/screen-dimmer.js"></script>
		<script src="js/top-bar.js"></script>
		<script src="js/fabs.js"></script>
		<script src="js/cards.js"></script>
		<script src="js/inputs.js"></script>
		<script src="js/drawer.js"></script>
		<script src="js/scrolling.js"></script>
		<script src="js/overall.js"></script>
		<script src="js/intro.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="theme-color" content="#536771">
		<meta name="mobile-web-app-capable" content="yes">

	<script src="https://apis.google.com/js/client:platform.js?onload=startApp" async defer></script>
		<!-- JavaScript specific to this application that is not related to API
	calls -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
		<meta name="google-signin-client_id" content="316881769291-56oap95sbo2500kal321o1jnm4fu4s80.apps.googleusercontent.com"></meta>
	</head>

<body>
<script type="text/javascript">
var auth2 = {};
var helper = (function() {
	return {
	/**
	* Hides the sign in button and starts the post-authorization operations.
	*
	* @param {Object} authResult An Object which contains the access token and
	*   other authentication information.
	*/
	onSignInCallback: function(authResult) {
		$('#authResult').html('Auth Result:<br/>');
		for (var field in authResult) {
			$('#authResult').append(' ' + field + ': ' + authResult[field] + '<br/>');
		}
		if (authResult.isSignedIn.get()) {

			$(location).attr('href', 'http://stackoverflow.com')
			$('#gConnect').hide();
			helper.profile();
		} else if (authResult['error'] ||
				   authResult.currentUser.get().getAuthResponse() == null) {
			// There was an error, which means the user is not signed in.
			// As an example, you can handle by writing to the console:
			console.log('There was an error: ' + authResult['error']);
			$('#authResult').append('Logged out');
			$('#gConnect').show();
		}

		console.log('authResult', authResult);
	},

		/**
		* Calls the OAuth2 endpoint to disconnect the app for the user.
		*/
		disconnect: function() {
			// Revoke the access token.
			auth2.disconnect();
		},

		/**
		* Gets and renders the currently signed in user's profile data.
		*/
		profile: function(){
			gapi.client.plus.people.get({
				'userId': 'me'
			}).then(function(res) {
				var profile = res.result;
				$('.profile-name').append(profile.displayName);
				$(location).attr('href', 'http://stackoverflow.com');
		  $('.profile').append('<div class="profile-picture" style="background-image: url(' + profile.image.url + ');"></div>');
		  console.log(profile.displayName);
				/*if (profile.emails) {
				$('#profile').append('<br/>Emails: ');
				for (var i=0; i < profile.emails.length; i++){
				$('#profile').append(profile.emails[i].value).append(' ');
				}
				$('#profile').append('<br/>');
				}
				if (profile.cover && profile.coverPhoto) {
				$('#profile').append(
				$('<p><img src=\"' + profile.cover.coverPhoto.url + '\"></p>'));
				}*/
			}, function(err) {
				var error = err.result;
				$('#profile').empty();
				$('#profile').append(error.message);
			});
		}
	};
})();

/**
 * jQuery initialization
 */
$(document).ready(function() {
	$('#disconnect').click(helper.disconnect);
	$('#loaderror').hide();
	if ($('meta')[0].content == 'YOUR_CLIENT_ID') {
		alert('This sample requires your OAuth credentials (client ID) ' +
			  'from the Google APIs console:\n' +
			  '    https://code.google.com/apis/console/#:access\n\n' +
			  'Find and replace YOUR_CLIENT_ID with your client ID.'
			 );
	}
});

/**
 * Handler for when the sign-in state changes.
 *
 * @param {boolean} isSignedIn The new signed in state.
 */
var updateSignIn = function() {
  console.log('update sign in state');
  if (auth2.isSignedIn.get()) {
    console.log('signed in');
    helper.onSignInCallback(gapi.auth2.getAuthInstance());
  }else{
    console.log('signed out');
    helper.onSignInCallback(gapi.auth2.getAuthInstance());
  }
}

/**
 * This method sets up the sign-in listener after the client library loads.
 */
function startApp() {
	gapi.load('auth2', function() {
		gapi.client.load('plus','v1').then(function() {
			gapi.signin2.render('signin-button', {
				scope: 'https://www.googleapis.com/auth/plus.login',
				fetch_basic_profile: false });
			gapi.auth2.init({fetch_basic_profile: false,
							 scope:'https://www.googleapis.com/auth/plus.login'}).then(
				function (){
					console.log('init');
					auth2 = gapi.auth2.getAuthInstance();
					auth2.isSignedIn.listen(updateSignIn);
					auth2.then(updateSignIn());
				});
		});
	});
}

			// Your Client ID can be retrieved from your project in the Google
			// Developer Console, https://console.developers.google.com
			var CLIENT_ID = '316881769291-56oap95sbo2500kal321o1jnm4fu4s80.apps.googleusercontent.com';

			var SCOPES = ['https://www.googleapis.com/auth/drive.appdata'];

			/**
			* Check if current user has authorized this application.
			*/
			function checkAuth() {
				gapi.auth.authorize( {
					'client_id': CLIENT_ID,
					'scope': SCOPES,
					'immediate': true
				}, handleAuthResult);
			}

			/**
			* Handle response from authorization server.
			*
			* @param {Object} authResult Authorization result.
			*/
			function handleAuthResult(authResult) {
				var authorizeDiv = document.getElementById('authorize-div');
				if (authResult && !authResult.error) {
					// Hide auth UI, then load client library.
					loadDriveApi();
				} else {
					// Show auth UI, allowing the user to initiate authorization by
					// clicking authorize button.
				}
			}

			/**
			* Initiate auth flow in response to user clicking authorize button.
			*
			* @param {Event} event Button click event.
			*/
			function handleAuthClick(event) {
				gapi.auth.authorize(
					{ client_id: CLIENT_ID, scope: SCOPES, immediate: false },
					handleAuthResult);
				return false;
			}

			/**
			* Load Drive API client library.
			*/
			function loadDriveApi() {
				gapi.client.load('drive', 'v2', listFiles);
			}

			/**
			* Print files.
			*/
			function listFiles() {
				var request = gapi.client.drive.files.list({
					'maxResults': 10
				});

				request.execute(function(resp) {
					appendPre('Files:');
					var files = resp.items;
					if (files && files.length > 0) {
						for (var i = 0; i < files.length; i++) {
							var file = files[i];
							appendPre(file.title + ' (' + file.id + ')');
						}
					} else {
						appendPre('No files found.');
					}
				});
			}


			/**
			* Append a pre element to the body containing the given message
			* as its text node.
			*
			* @param {string} message Text to be placed in pre element.
			*/
			function appendPre(message) {
				var pre = document.getElementById('output');
				var textContent = document.createTextNode(message + '\n');
				pre.appendChild(textContent);
			}

		</script>
		<script src="https://apis.google.com/js/client.js?onload=checkAuth">
		</script>
		<!-- PAGE TOP BAR -->
		<div class="z2 page-top-bar primary-bg-color">



			<div class="drawer-button">
				<div class="drawer-button-icon"></div>
			</div>

			<div class="tabs-bar">
				<div class="tab tab-color">Recent</div>
				<div class="tab tab-color">Schedule</div>
				<div class="tab tab-color">Tasks</div>
				<div class="tab tab-color">Grades</div>
			</div>

		</div>


		<!-- PROFILE -->

		<div class="profile-picture profile-picture-intro" style="background-image: url('img/avatar.png');"></div>



		<!-- INTRO CARD -->
		<div class="card card-intro">

			<div class="arrow left-arrow">
				<div id="left" class="z2 arrow-button">
					<div class="icon-arrow"></div>
				</div>
			</div>

			<div class="intro-card-container">
				<div id="0" class="intro-card-overflow">
					<div class="intro-page-container">
						<div class="z2 intro-page intro-page-1">
							<div class="page-top" style="padding-bottom: 0; height: 230px;">
								<div class="intro-picture intro-1-picture"></div>
							</div>
							<div class="z2 page-bottom">
								<div class="page-bottom-top pt40-light">Simple Schedule</div>
								<div class="page-bottom-bottom pt16-light">With great features to organize your events.</br>Check them out!</div>
							</div>
						</div>
					</div>
					<div class="intro-page-container">
						<div class="z2 intro-page intro-page-2">
							<div class="page-top">
								<div class="intro-picture intro-2-picture"></div>
							</div>
							<div class="z2 page-bottom">
								<div class="page-bottom-top pt40-light">Material</div>
								<div class="page-bottom-bottom pt16-light">Enjoy the Material inspired design and the carefully crafted views, made with efficiency in mind.</div>
							</div>
						</div>
					</div>
					<div class="intro-page-container">
						<div class="z2 intro-page intro-page-3">
							<div class="page-top">
								<div class="intro-picture intro-3-picture"></div>
							</div>
							<div class="z2 page-bottom">
								<div class="page-bottom-top pt40-light">Cloud</div>
								<div class="page-bottom-bottom pt16-light">Synchronise with Google Drive&trade; to backup your data in the cloud and access it on multiple devices.</div>
							</div>
						</div>
					</div>
					<div class="intro-page-container">
						<div class="z2 intro-page intro-page-4">
							<div class="page-top" style="padding-bottom: 0; height: 230px;">
								<div class="intro-picture intro-4-picture"></div>
							</div>
							<div class="z2 page-bottom">
								<div class="page-bottom-top pt40-light">Android</div>
								<div class="page-bottom-bottom pt16-light">Get the best experience on mobile with the Simple Schedule app.
									<a style="display: block; margin-top: 10px;" href="https://play.google.com/store/apps/details?id=ins.luk.projecttimetable">
										<img alt="Get it on Google Play" src="https://developer.android.com/images/brand/en_generic_rgb_wo_45.png" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="arrow right-arrow">
				<div id="right" class="z2 arrow-button">
					<div class="icon-arrow icon-arrow-right"></div>
				</div>
			</div>

			<div class="page-indicator-container">
				<div class="indicator-bubbles-container">
					<div class="indicator-bubble-container">
						<div class="z2 indicator-bubble bubble-0 indicator-bubble-active"></div>
					</div>
					<div class="indicator-bubble-container">
						<div class="z2 indicator-bubble bubble-1"></div>
					</div>
					<div class="indicator-bubble-container">
						<div class="z2 indicator-bubble bubble-2"></div>
					</div>
					<div class="indicator-bubble-container">
						<div class="z2 indicator-bubble bubble-3"></div>
					</div>
				</div>
			</div>

            <div class="login-button-container">
                <center>
                <div id="gConnect" class="login-button">
                    <div id="signin-button"></div>
                </div>
                </center>
            </div>

		</div>



		<!-- SCREEN DIMMER -->
		<div class="screen-dimmer screen-dimmer-intro">
		</div>

	</body>

</html>
