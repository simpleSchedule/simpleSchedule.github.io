<!DOCTYPE html>

<html>

	<head>

		<title>Simple Schedule</title>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,100" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icons.css">

		<link rel="stylesheet" href="css/default.css">
		<link rel="stylesheet" href="css/top-bar.css">
		<link rel="stylesheet" href="css/fabs.css">
		<link rel="stylesheet" href="css/cards.css">
		<link rel="stylesheet" href="css/card-event.css">
		<link rel="stylesheet" href="css/card-task.css">
		<link rel="stylesheet" href="css/inputs.css">
		<link rel="stylesheet" href="css/combos.css">
		<link rel="stylesheet" href="css/drawer.css">
		<link rel="stylesheet" href="css/tooltips.css">
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

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="theme-color" content="#536771">
		<meta name="mobile-web-app-capable" content="yes">

	</head>

    <body>
        
		<!-- PAGE TOP BAR -->
		<div class="z2 page-top-bar primary-bg-color">



			<div class="drawer-button">
				<div class="drawer-button-icon"></div>
			</div>

			<div class="top-bar-title pt18-light">
				Recents
			</div>

			<div class="tabs-bar">
				<div class="tab tab-color input-color-light tab-1">Recent</div>
				<div class="tab tab-color tab-2">Schedule</div>
				<div class="tab tab-color tab-3">Tasks</div>
				<div class="tab tab-color tab-4">Grades</div>
				<div class="tab-indicator"></div>
			</div>

		</div>


		<!-- PROFILE -->
		<div class="profile">

			<div class="profile-box-container">
				<div class="z2 profile-box" id="authOps">
					<div class="pt24-dark profile-name">
					</div>

					<div class="profile-box-buttons">
						<button class="input-color-dark" id="disconnect" >Disconnect</button>
						<button class="input-color-dark" id="signOut" onclick="auth2.signOut()">Log Out</button>
						<button class="secondary-color" id="authorize-button" onclick="handleAuthClick(event)">Sync</button>
					</div>
				</div>
			</div>

		</div>
>>
		<div class="profile-box-hider"></div>



		<!-- MAIN FAB -->
		<div id="default" class="fab-main-container">

			<div class="z2 fab-main fab-main-add secondary-bg-color">
				<div class="fab-main-icon-container">
					<div class="fab-icon fab-main-icon-add"></div>
				</div>
			</div>

		</div>


		<!-- MINI FAB - TASK -->
		<div id="task" class="fab-mini-container fab-mini-container-default fab-mini-container-task">

			<div id="default" class="z2 fab-mini secondary-bg-color">
				<div class="fab-mini-icon-container">
					<div class="fab-icon fab-mini-icon-task">
					</div>
				</div>
			</div>

		</div>

		<!-- MINI FAB - EVENT -->
		<div class="fab-mini-container fab-mini-container-default fab-mini-container-event">

			<div id="default" class="z2 fab-mini secondary-bg-color">
				<div class="fab-mini-icon-container">
					<div class="fab-icon fab-mini-icon-add">
					</div>
				</div>
			</div>

		</div>

		<!-- end of mini fabs -->



		<!-- mini fabs TOOLTIPS -->
		<div class="pt12-dark tooltip-light tooltip-task tooltip-default">New Task</div>

		<div class="pt12-dark tooltip-light tooltip-event tooltip-default">New Event</div>



		<!-- TASK CARD -->
		<div card="task" class="card">
		<form method="POST">

			<!-- top bar -->
			<div class="card-top-bar primary-bg-color" card-color="task">

				<div class="header-button header-close">
				</div>

				<div class="header-title pt18-light header-2-buttons">
					New Task
				</div>

				<button type="submit" name="new-task" value="true" class="header-button header-check">
				</button>

			</div>

			<div class="card-container">

				<!-- primary bar -->
				<div class="z2 primary-bg-color card-header" card-color="task">

					<div class="header-bottom-bar">

						<div class="input-text input-text-large input-text-light">
							<label for="task-name" class="pt32-light pt-hint-light">Task</label>
							<input id="task-name" class="pt32-light" name="event-name"></input>
							<div class="input-indicator input-indicator-light">
								<div class="input-indicator-active input-indicator-active-light"></div>
							</div>
						</div>

						<div class="task-header-inputs">

							<div class="input-text input-text-date input-text-light">
								<label for="task-date" class="pt16-light pt-hint-light">Date</label>
								<input id="task-date" class="pt16-light" name="task-date"></input>
								<div class="input-indicator input-indicator-light">
									<div class="input-indicator-active input-indicator-active-light"></div>
								</div>
							</div>

							<div style="margin-left: 20px; width: 50px;" class="input-text input-text-date input-text-light">
								<label for="task-time" class="pt16-light pt-hint-light">Time</label>
								<input id="task-time" class="pt16-light" name="task-time"></input>
								<div class="input-indicator input-indicator-light">
									<div class="input-indicator-active input-indicator-active-light"></div>
								</div>
							</div>

							<div class="table-selectable input-text-number-second pt16-light"><span table="taskevent" class="table-light table-taskevent">Event<div class="list-indicator list-indicator-light list-indicator-table"></div></span>
								<div id="taskevent" class="z2 pt16-dark table-selectable-box table-selectable-box-dark selectable-box-priority box-selected-1">
									<div id="1" class="selectable-box-option option-selected">Event 1</div>
									<div id="2" class="selectable-box-option">Event 2</div>
									<div id="3" class="selectable-box-option">Event 3</div>
								</div>
							</div>

						</div>

						<div class="color-picker pt16-light">
							<i class="material-icons">color_lens</i>
							<div id="task" class="z2 colors-box">
								<div class="color color-1"></div>
								<div class="color color-2"></div>
								<div class="color color-3"></div>
								<div class="color color-4"></div>
								<div class="color color-5"></div>
								<div class="color color-6"></div>
								<div class="color color-7"></div>
								<div class="color color-8"></div>
								<div class="color color-9"></div>
								<div class="color color-10"></div>
								<div class="color color-11"></div>
								<div class="color color-12"></div>
								<div class="color color-13"></div>
								<div class="color color-14"></div>
								<div class="color color-15"></div>
								<div class="color color-16"></div>
								<div class="color color-17"></div>
								<div class="color color-18"></div>
								<div class="color color-19"></div>
								<div class="color color-20"></div>
								<div class="color color-21"><div class="selected-color selected-color-auto"></div></div>
								<div class="color color-22"></div>
							</div>
						</div>

					</div>

				</div>

				<!-- secondary area -->

				<div class="card-bottom">

					<!-- TYPE - PRIORITY -->
					<table cellspacing="0" class="input-table">
						<tr class="pt14-dark">
							<td class="pt-hint-dark">Type</td>
							<td class="table-second-column pt-hint-dark">Priority</td>
						</tr>
						<tr class="pt16-dark">
							<td>
								<div class="table-selectable"><span table="type" class="table-dark">Default<div class="list-indicator list-indicator-dark list-indicator-table"></div></span>
									<div id="type" class="z2 table-selectable-box table-selectable-box-dark selectable-box-type box-selected-1">
										<div id="1" class="selectable-box-option option-selected">Default</div>
										<div id="2" class="selectable-box-option">Homework</div>
										<div id="3" class="selectable-box-option">Exam</div>
									</div>
								</div>
							</td>
							<td class="table-second-column">
								<div class="table-selectable"><span table="priority" class="table-dark">Medium<div class="list-indicator list-indicator-dark list-indicator-table"></div></span>
									<div id="priority" class="z2 table-selectable-box table-selectable-box-dark selectable-box-priority box-selected-2">
										<div id="1" class="selectable-box-option">Low</div>
										<div id="2" class="selectable-box-option option-selected">Medium</div>
										<div id="3" class="selectable-box-option">High</div>
									</div>
								</div>
							</td>
						</tr>
					</table>

					<!-- location input -->
					<div class="input-text input-text-dark">
						<label for="task-location" class="pt16-dark pt-hint-dark">Location</label>
						<input id="task-location" class="pt16-dark" name="event-location"></input>
						<div class="input-indicator input-indicator-dark">
							<div class="input-indicator-active secondary-bg-color"></div>
						</div>
					</div>

					<!-- information input -->
					<div class="input-text input-text-dark input-textarea scrollto">
						<label for="task-extra" class="pt16-dark pt-hint-dark">Additional information</label>
						<textarea id="task-extra" type="text" class="event-extra pt16-dark" name="event-extra"></textarea>
						<div class="input-indicator input-indicator-dark">
							<div class="input-indicator-active secondary-bg-color"></div>
						</div>
					</div>

				</div>
			</div>
		</form>
		</div>



		<!-- EVENT CARD -->
		<div card="event" class="card">
		<form method="POST">

			<!-- top bar -->
			<div class="card-top-bar primary-bg-color" card-color="event">

				<div class="header-button header-close">
				</div>

				<div class="header-title pt18-light header-2-buttons">
					Create event
				</div>

				<button type="submit" name="new-event" value="true" class="header-button header-check">
				</button>

			</div>

			<div class="card-container">

				<!-- primary bar -->
				<div class="z2 primary-bg-color card-header" card-color="event">

						<div class="header-bottom-bar">

							<div class="input-text input-text-large input-text-light">
								<label for="event-name" class="pt32-light pt-hint-light">Name of the event</label>
								<input id="event-name" class="pt32-light" name="event-name"></input>
								<div class="input-indicator input-indicator-light">
									<div class="input-indicator-active input-indicator-active-light"></div>
								</div>
							</div>

							<div class="input-text input-text-light input-text-short">
								<label for="event-name-short" class="pt16-light pt-hint-light">Short name</label>
								<input id="event-name-short" class="pt16-light" name="event-name-short"></input>
								<div class="input-indicator input-indicator-light">
									<div class="input-indicator-active input-indicator-active-light"></div>
								</div>
							</div>

							<div class="color-picker pt16-light">
								<i class="material-icons">color_lens</i>
								<div id="event" class="z2 colors-box">
									<div class="color color-1"></div>
									<div class="color color-2"></div>
									<div class="color color-3"></div>
									<div class="color color-4"></div>
									<div class="color color-5"></div>
									<div class="color color-6"></div>
									<div class="color color-7"></div>
									<div class="color color-8"></div>
									<div class="color color-9"></div>
									<div class="color color-10"></div>
									<div class="color color-11"></div>
									<div class="color color-12"></div>
									<div class="color color-13"></div>
									<div class="color color-14"></div>
									<div class="color color-15"></div>
									<div class="color color-16"></div>
									<div class="color color-17"></div>
									<div class="color color-18"></div>
									<div class="color color-19"></div>
									<div class="color color-20"></div>
									<div class="color color-21"><div class="selected-color selected-color-auto"></div></div>
									<div class="color color-22"></div>
								</div>
							</div>

						</div>

				</div>

				<!-- secondary area -->

				<div class="card-bottom">

					<!-- checkbox -->
					<div class="input-checkbox-container">
							Onetime event<div class="input-checkbox">
							<i class="material-icons checkbox-outline-dark">check_box_outline_blank</i></div>
							<input id="input-onetime" type="checkbox" name="one-time-event" style="block"></input>
					</div>

					<!-- tabs bar -->
					<div class="card-tabs-container">
						<center>
							<div class="card-tabs-bar pt14-dark tab-color-dark">
								<div id="0" class="card-tab secondary-color">Mo</div>
								<div id="1" class="card-tab">Tu</div>
								<div id="2" class="card-tab">We</div>
								<div id="3" class="card-tab">Th</div>
								<div id="4" class="card-tab">Fr</div>
								<div id="5" class="card-tab">Sa</div>
								<div id="6" class="card-tab">Su</div>
								<div class="card-indicator-container">
									<div class="card-indicator secondary-bg-color"></div>
								</div>
							</div>
						</center>

						<div class="times-container">

							<center>

								<div id="1" class="add-time-button add-time-button-days pt14-dark">
									<div>Add time</div><div class="add-time-button-icon"></div>
								</div>

								<div id="0" class="add-time-button add-time-button-one-day pt14-dark">
									<div>Add time</div><div class="add-time-button-icon"></div>
								</div>

							</center>

							<div class="card-seperator input-indicator-dark">
							</div>

							<!-- tables for the multiple days -->
							<div class="day-cards-container">
								<div class="day-cards-flow">
									<div id="1" class="day-card"></div>
									<div id="2" class="day-card"></div>
									<div id="3" class="day-card"></div>
									<div id="4" class="day-card"></div>
									<div id="5" class="day-card"></div>
									<div id="6" class="day-card"></div>
									<div id="7" class="day-card"></div>
								</div>
							</div>

							<!-- table for the one time day -->
							<div id="0" class="day-card one-day-card">
							</div>

						</div>

					</div>

					<!-- location input -->
					<div class="input-text input-text-dark">
						<label for="event-location" class="pt16-dark pt-hint-dark">Location</label>
						<input id="event-location" class="pt16-dark" name="event-location"></input>
						<div class="input-indicator input-indicator-dark">
							<div class="input-indicator-active secondary-bg-color"></div>
						</div>
					</div>

					<!-- lector input -->
					<div class="input-text input-text-dark">
						<label for="event-lector" class="pt16-dark pt-hint-dark">Lector</label>
						<input id="event-lector" class="pt16-dark" name="event-lector"></input>
						<div class="input-indicator input-indicator-dark">
							<div class="input-indicator-active secondary-bg-color"></div>
						</div>
					</div>

					<!-- information input -->
					<div class="input-text input-text-dark input-textarea scrollto">
						<label for="event-extra" class="pt16-dark pt-hint-dark">Additional information</label>
						<textarea id="event-extra" type="text" class="event-extra pt16-dark" name="event-extra"></textarea>
						<div class="input-indicator input-indicator-dark">
							<div class="input-indicator-active secondary-bg-color"></div>
						</div>
					</div>

				</div>
			</div>
		</form>
		</div>



		<!-- NAVIGATION DRAWER -->
		<div class="drawer">


			<div class="drawer-container">
				<div class="z1 drawer-header">
					<div class="drawer-header-dimmer"></div>
				</div>

				<div class="drawer-links-container">
				<div class="drawer-link pt14-dark drawer-link-active primary-color"><div class="drawer-icon">
					<i class="material-icons primary-color">access_time</i>
				</div>Recents</div>

				<div class="drawer-link pt14-dark"><div class="drawer-icon">
					<i class="material-icons">view_day</i>
				</div>Dayview</div>

				<div class="drawer-link pt14-dark"><div class="drawer-icon">
					<i class="material-icons">view_week</i>
				</div>Weekview</div>

				<div class="drawer-link pt14-dark"><div class="drawer-icon">
					<i class="material-icons">assignment_turned_in</i>
				</div>Tasks</div>

				<div class="drawer-link pt14-dark"><div class="drawer-icon">
					<i class="material-icons">school</i>
				</div>Grades</div>

				<div class="drawer-link pt14-dark"><div class="drawer-icon">
					<i class="material-icons">flight</i>
				</div>Vacations</div>

				<!-- <div class="drawer-seperator input-indicator-active-dark"></div> -->

				<div class="drawer-bottom-links-container">

					<div class="drawer-link pt14-dark"><div class="drawer-icon">
						<i class="material-icons">favorite</i>
					</div>Support</div>

					<div class="drawer-link pt14-dark"><div class="drawer-icon">
						<i class="material-icons">info</i>
					</div>About</div>

					<div class="drawer-link pt14-dark"><div class="drawer-icon">
						<i class="material-icons">settings</i>
					</div>Settings</div>

					</div>

				</div>

			</div>

		</div>



		<!-- SCREEN DIMMER -->
		<div class="screen-dimmer">
		</div>

	</body>

</html>
