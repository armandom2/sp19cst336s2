function addData(){
    var date = document.getElementById("dateInput").value;
    var startTime = document.getElementById("startTime").value;
    var endTime = document.getElementById("endTime").value;

    if(date===""){
        alert("Invalid Date");
    }
    else{
        //Check the date
        var splitDate = date.split("-");
        var year = splitDate[0];
        var month = splitDate[1];
        var day = splitDate[2];
        
        //Check the time
        var splitTime = startTime.split(":");
        var h1 = splitTime[0];
        var m1 = splitTime[1];
        var splitTime2 = endTime.split(":");
        var h2 = splitTime2[0];
        var m2 = splitTime2[1];
        
        //Final variables
        var finalDate = month+"/"+day+"/"+year;
        console.log(finalDate);
        var finalHour = h2-h1;
        var finalMinuet = m2-m1;
        if(h1>12){
            var finalStart = parseInt(h1)%12;
            finalStart = String(finalStart)+":"+String(m1)+" PM";
            console.log(finalStart);
        }
        else{
            var finalStart = String(h1) +":"+String(m1)+" AM";
        }
        if(h2>12){
            endTime = endTime + " PM";
        }
        else{
            endTime = endTime + " PM";
        }
        console.log(endTime);



        if(h2>h1){
            if(m2>m1){
                //HOURS AND MINUETS
                var hourMin = String(finalHour)+" Hours "+String(finalMinuet)+ " Minuets";
                console.log(hourMin);
                $.ajax({
                    url:"api/addTimeSlot.php",
                    type:"POST",
                    dateType: "text",
                    data: {
                        "duration": hourMin,
                        "start": finalStart,
                        "end": endTime,
                        "user": localStorage.userId,
                        "date":finalDate,
                    },
                    success: function(data, status) {
                        console.log("success");
                        console.log(data);
                    },
                    complete: function(data, status) {
                        console.log(data);
                    }
                });
                
            }
            else if(m1>m2){
                var finalHour = (parseInt(h2)-1)- parseInt(h1);
                var finalMinuet = (parseInt(m2)+60) - parseInt(m1);
                if(finalHour==0){
                    var hourMin = String(finalMinuet)+" Minuets"
                    $.ajax({
                        url:"api/addTimeSlot.php",
                        type:"POST",
                        dateType: "text",
                        data: {
                            "duration": hourMin,
                            "start": finalStart,
                            "end": endTime,
                            "user": localStorage.userId,
                            "date":finalDate,
                        },
                        success: function(data, status) {
                            console.log("success");
                            console.log(data);
                        },
                        complete: function(data, status) {
                            console.log(data);
                        }
                    });
                }
                else{
                    var hourMin = String(finalHour)+" Hours " + String(finalMinuet)+" Minuets" 
                    $.ajax({
                        url:"api/addTimeSlot.php",
                        type:"POST",
                        dateType: "text",
                        data: {
                            "duration": hourMin,
                            "start": finalStart,
                            "end": endTime,
                            "user": localStorage.userId,
                            "date":finalDate,
                        },
                        success: function(data, status) {
                            console.log("success");
                            console.log(data);
                        },
                        complete: function(data, status) {
                            console.log(data);
                        }
                    });
                }
            }
            else{
                //JUST HOURS
                var hourMin = String(finalHour)+" Hours";
                console.log(hourMin);
                $.ajax({
                    url:"api/addTimeSlot.php",
                    type:"POST",
                    dateType: "text",
                    data: {
                        "duration": hourMin,
                        "start": finalStart,
                        "end": endTime,
                        "user": localStorage.userId,
                        "date":finalDate,
                    },
                    success: function(data, status) {
                        console.log("success");
                        console.log(data);
                    },
                    complete: function(data, status) {
                        console.log(data);
                    }
                });
            }
        }
        else if(h2===h1){
            console.log("Equal");
            if(m2>m1){
                //JUST MINUETS
                var hourMin = String(finalMinuet)+ " Minuets";
                console.log(hourMin);
                $.ajax({
                    url:"api/addTimeSlot.php",
                    type:"POST",
                    dateType: "text",
                    data: {
                        "duration": hourMin,
                        "start": finalStart,
                        "end": endTime,
                        "user": localStorage.userId,
                        "date":finalDate,
                    },
                    success: function(data, status) {
                        console.log("success");
                        console.log(data);
                    },
                    complete: function(data, status) {
                        console.log(data);
                    }
                });
            }
            else{
                alert("Invalid Time");
            }
        }
        else{
            alert("Invalid Time");
        }
    }
    window.location.reload();
}