
$(function(){
    var link = "https://"+localStorage.userId+".com";
    $.ajax({
        url:"api/addUsers.php",
        type:"POST",
        dateType: "text",
        data:{
            "userId":localStorage.userId,
            "userName": localStorage.userName,
            "userLink":link
        },
        success: function(data,status){
            console.log(data);
        }
        
    });
    
    $.ajax({
        url:"api/getTimeSlot.php",
        type: "POST",
        dataType:"json",
        data:{
            "user":localStorage.userId
        },
        success:function(data,status){
            console.log(data);
            for(var i= 0; i<data.length; i++){
                $("#timeSlotTable").append("<tr><td id='date"+i+"'>"+data[i]['date']+"</td> <td id= 'startTime"+i+"'>"+data[i]['start_time']+"</td><td id='duration"+i+"'>"+data[i]['duration']+"</td><td id = 'booked"+i+"'>Not Booked</td><td><button id = 'detailbutton"+i+"' onclick = details("+i+") style= 'width:100px; height:30px;'>Details</button><button onclick='deleteSlot("+i+")' id = 'deletebutton"+i+"'style= 'width:100px; height:30px;'>Delete</button></tr>");
            }
        },
        error: function(error){
            console.log(error);
        }
        
    });

});
function deleteSlot(Num){
    var d = "date"+String(Num);
    var st = "startTime"+String(Num);
    var dur ="duration"+String(Num);
    
    var dateText = document.getElementById(d).innerText;
    var start = document.getElementById(st).innerText;
    var duration = document.getElementById(dur).innerText;
    
    var splithour = start.split(":");
    var theHour = parseInt(splithour[0]);
    var splitMin = splithour[1].split(" ");
    var theMin = parseInt(splitMin[0]);
    console.log(theHour);
    console.log(theMin);

    if(duration.length <9){
        var time = duration.split(' ');
        time = parseInt(time[0]);
        theHour = theHour+time;
        if(theHour>12){
            theHour = theHour%2;
            if(theMin<10) theMin = "0"+String(theMin);
            var end_time = String(theHour)+":"+String(theMin) + "PM";
        }
        else{
            if(theMin<10) theMin = "0"+String(theMin);
            var end_time = String(theHour)+":"+String(theMin) + "AM";
        }
        $("#delStartTime").html("Start Time: "+dateText + " " +start );
        $("#delEndTime").html("End Time: "+dateText+" "+end_time);
    }
    else if(duration.length < 11 && duration.length >8){
        var time = duration.split(' ');
        time = parseInt(time[0]);
        theMin = theMin + time;
        if(theMin >59){
            theHour = theHour +1;
            theMin = theMin % 60;
        }
        if(theHour>12){
            theHour = theHour%2;
            if(theMin<10) theMin = "0"+String(theMin);
            var end_time = String(theHour)+":"+String(theMin) + "PM";
        }
        else{
            if(theMin<10) theMin = "0"+String(theMin);
            var end_time = String(theHour)+":"+String(theMin) + "AM";
        }
        $("#delStartTime").html("Start Time: "+dateText + " " +start );
        $("#delEndTime").html("End Time: "+dateText+" "+end_time);
        
    }
    else{
        var time = duration.split(' ');
        var timehour = parseInt(time[0]);
        var timemin  = parseInt(time[2]);
        theHour = theHour + timehour;
        theMin = theMin + timemin;
        if(theMin >59){
            theHour = theHour +1;
            theMin = theMin % 60;
        }
        if(theHour>12){
            theHour = theHour%2
            if(theMin<10) theMin = "0"+String(theMin);
            var end_time = String(theHour)+":"+theMin + "PM";
        }
        else{
            if(theMin<10) theMin = "0"+String(theMin);
            var end_time = String(theHour)+":"+String(theMin) + "AM";
        }
        console.log(end_time);
        $("#delStartTime").html("Start Time: "+dateText + " " +start );
        $("#delEndTime").html("End Time: "+dateText+" "+end_time);
    }
    $('#deleteModal').modal('show');
    
    document.getElementById('confirmDelete').onclick = function() {
        $.ajax({
            url:"api/deleteTimeSlot.php",
            type:"POST",
            dataType: "text",
            data:{
                "user":localStorage.userId,
                "date":dateText,
                "start":start,
                "duration":duration
            },
            success:function(data,status){
                console.log(data);
            }
            
        });
        window.location.reload();
    };
}

function printLink(){
    $.ajax({
        url:"api/getLink.php",
        type: "POST",
        dataType:"json",
        data:{
            "user":localStorage.userId
        },
        success:function(data,status){
            console.log(data);
            $("#invitationLink").val(data[0]['user_link']);
        },
        error:function(error){
            console.log(error)
        }
        
    });
    
}

