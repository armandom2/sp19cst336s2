<!DOCTYPE html>
<html>
    <head>
        <title> Final Scheduler Exam </title>
        <!--This is for the Google sign in-->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="771332740040-bst02ajh5o98uga1dk3e36sv30pjknuh.apps.googleusercontent.com">
        <script type="text/javascript" src="js/login.js"></script>
        
        <!--This is the Bootstap for the model-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         
         <!--This will input the data into the data base-->
         <script type="text/javascript" src="js/inputData.js"></script>
         <!--This will get the data from the data base-->
         <script type="text/javascript" src="js/getData.js"></script>


    </head>
    <body>
        <div id = "logout">
            <a href="#" onclick="signOut();">Logout</a>
        </div>
        <div id = "invitation" >Invitation Link <input type = "text" id = "invitationLink" value = "" style = "width:300px; height:25px;font-size:15px;"/> <button type="button" onclick="printLink()"id="inviteLinkButton">Link</button></div>
        <div id = "centerTable">
            <table id = "timeSlotTable">
                <tr id = "HeadersForTable">
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Duration</th>
                    <th>Booked By</th>
                    <th>
                        Add Multiple Time Slots<button type="button" style="width:30px; height:30px; background: url(img/plus.jpg);" data-toggle="modal" data-target="#myModal"></button>
                    </th>
                </tr>
            </table>
        </div>
        
        
        <!--MODEL TO CREATE NEW SLOTS-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content" style="width: 500px; height:500px;">
                  <div id= "modelInfo">
                      Date: <input type="date" id="dateInput">
                      <br><br>
                      Start Time: <input type="time" id="startTime">
                      <br><br>
                      End Time: <input type="time" id="endTime">
                      <br><br>
                      <button style="margin-left:50px;" type="button" data-dismiss="modal">Cancel</button>
                      <button type="button" onclick="addData()" > Add</button>
                  </div>
              </div>
            </div>
         </div>
         
         <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content" style="width: 500px; height:500px;">
                  <div id= "deleteInfo">
                      <h3 id="delStartTime"></h3>
                      <h3 id="delEndTime"></h3>
                      <h3>Are you sure you want to remove the</h3>
                      <h3>time slot? this cannot be undone.</h3>
                      <button style="margin-left:50px;" type="button" data-dismiss="modal">Cancel</button>
                      <button type="button" id ="confirmDelete"> Yes, Remove it!</button>
                  </div>
              </div>
            </div>
         </div>
         
         
         <!--RUBRIC-->
         <div id="rubric">
         <table>
            <thead>
            <tr>
            <th style="text-align:left">#</th>
            <th style="text-align:left">Task Description</th>
            <th style="text-align:left">Points</th>
            </tr>
            </thead>
            <tbody>
            <tr style = "background-color:yellow">
            <td style="text-align:left">1</td>
            <td style="text-align:left">You provide a ERD diagram representing the data and its relationships. This may be included in Cloud9 as a picture or from a designer tool</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr style = "background-color:green">
            <td style="text-align:left">2</td>
            <td style="text-align:left">Tables in MySQL match the ERD and support the requirements of the application</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr style = "background-color:green">
            <td style="text-align:left">3</td>
            <td style="text-align:left">The list of available appointments is pulled from MySQL using the API endpoint and displayed using the specified page design</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr style = "background-color:yellow">
            <td style="text-align:left">4</td>
            <td style="text-align:left">Available times with dates in the past do not show up in the Dashboard list</td>
            <td style="text-align:left">5</td>
            </tr>
            <tr style = "background-color:green">
            <td style="text-align:left">5</td>
            <td style="text-align:left">A user can add an available time slot to the MySQL using the API endpoint and displayed using the specified modal design</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr style = "background-color:green">
            <td style="text-align:left">6</td>
            <td style="text-align:left">A user can remove an available time slot from MySQL using the API endpoint</td>
            <td style="text-align:left">15</td>
            </tr>
            <tr style = "background-color:green">
            <td style="text-align:left">7</td>
            <td style="text-align:left">The user confirms the removal using the specified modal design</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left"></td>
            <td style="text-align:left">TOTAL</td>
            <td style="text-align:left">100</td>
            </tr>
            <tr>
            <td style="text-align:left"></td>
            <td style="text-align:left">This rubric is properly included AND UPDATED (BONUS)</td>
            <td style="text-align:left">2</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left">Login works with a User table and BCrypt</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr style = "background-color:green">
            <td style="text-align:left">BD</td>
            <td style="text-align:left">Add Google Signin for app login</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left">The app is deployed to Heroku</td>
            <td style="text-align:left">15</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left">A banner file can be uploaded and displayed</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left">The user can add multiple available time slots as specified</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left">You correctly implement booking of the appointement, including all side effects</td>
            <td style="text-align:left">30</td>
            </tr>
            </tbody>
        </table>
        </div>
         
    </body>
    
    <div class="g-signin2" style = "visibility:hidden;"></div>
</html>