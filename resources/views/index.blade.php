
<!DOCTYPE html>


<html>
<head>
	<title>
		RNRC Company Calendar
	</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<meta charset="utf-16" />
<style>

      .centerCol{float: none; margin: 0 auto;  }
      .form_sec{ background-color: rgba(0,0,0,0.2);
            padding: 5% 0;}

        .form_head h1 {
            box-sizing: border-box;
            font-family: "Google Sans",Roboto,Arial,sans-serif;
            font-size: 32px;
            font-weight: 400;
            line-height: 40px;
            color: #202124;
            line-height: 135%;
            max-width: 100%;
            min-width: 0%;
            text-align: left;

        }

        .form_head{
            margin-top: 12px;
            background-color: #fff;
            border: 1px solid #dadce0;
            border-radius: 8px;
            margin-bottom: 12px;
            padding: 24px;
            padding-top: 22px;
            position: relative;
        }

        .form_head {
              border-top:10px solid rgb(0, 188, 212);
              color: rgba(0, 0, 0, 1);
          }
         .form_head h4 {
            font-family: 'Poppins', Sans-Serif;
            font-size: 15px;
            line-height: 29px;
            font-weight: 500;
            margin: 0 0 13px;
            color: #5f6368;
        }

        .form_head h4 span {
            display: inline-block;
            float: right;
        }


        .form_head h4 a {
            color: #0c3df3;
            font-weight: 500;
            font-size: 16px;
        }

        .form_head h5 {
              font-family: 'Poppins', Sans-Serif;
              font-size: 15px;
              line-height: 25px;
              font-weight: 500;
              margin: 0 0 0px;
              color: #d93025;
          }




          .input_div {
            margin-top: 12px;
            background-color: #fff;
            border: 1px solid #dadce0;
            border-radius: 8px;
            margin-bottom: 12px;
            padding: 24px;
            padding-top: 22px;
            position: relative;
            label


          }

          .input_div label span{    color: #d93025;  }
          .input_div label {
              font-size: 16px;
              letter-spacing: .1px;
              line-height: 24px;
              color: #202124;
              font-weight: 400;
              width: 100%;
              word-break: break-word;
              margin: 0 0 30px;
              display: inline-block;
              text-align: left;
          }

          .input_div  input[type="text"],
          .input_div  input[type="password"],
          .input_div select,
          .input_div  input[type="email"],
          .input_div  input[type="url"],
          .input_div  input[type="number"],
          .input_div  textarea,
          .input_div  input[type="password"],
          .input_div  input[type="date"],
          .input_div  input[type="time"]
             {
              border: 0px solid #ececec;
    background-color: #fff;
    font-size: 14px;
    line-height: 20px;
    color: #575757;
    height: 40px;
    margin-bottom: 20px;
    width: 100%;
    padding: 0px 15px;
    border-radius: 0;
    border-bottom: 2px solid #cbcbcb;
              }

            .form_sec  input[type="submit"] {
                  color: #fff;
                  height: 45px;
                  padding: 0px 35px;
                  font-size: 12px;
                  line-height: 20px;
                  border: 2px solid #1a73e8;
                  border-radius: 6px;
                  text-transform: uppercase;
                  margin-bottom: 20px;
                  font-weight: 600;
                  background: #1a73e8;
              }

               .form_sec input[type="submit"]:hover {
                  transition: all 0.5s ease;
                  -webkit-transition: all 0.5s ease;
                  -moz-transition: all 0.5s ease;
                  background-color:transparent;
                  color: #1a73e8;
                  border-color: #1a73e8;
              }
              button.btn.btn-primary {
    float: left;
}

.main {
    padding: 40px;
}
.form_sec .nav-tabs {
    border-bottom: 0 ;
}
.nav {
    margin: 0 auto;
    align-items: center;
    justify-content: center;
}
       </style>
</head>

<body>
@include('flash-message')


<header class="header">

</header>

<div class="calendar">
    <!-- <iframe src="https://www.google.com/calendar/embed?title=RNRC%20Event%20Calendar&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=0k77stia9g2ipnmfh4s9s1cl4k%40group.calendar.google.com&amp;color=%232952A3&amp;src=rse65v7s51441rss142rocdgg0%40group.calendar.google.com&amp;color=%2342104A&amp;src=lc5hb0mr4gf0r4vu65forgifuk%40group.calendar.google.com&amp;color=%23A32929&amp;ctz=America%2FNew_York" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe> -->

      <!-- previous used calendar -->
      <!-- <iframe src="https://calendar.google.com/calendar/embed?src=haris.dev55%40gmail.com&ctz=Asia%2FKarachi" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe> -->
    <!-- Customized Calendar -->
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FNorth_Dakota%2FCenter&showTz=0&showTitle=0&showCalendars=0&src=aGFyaXMuZGV2NTVAZ21haWwuY29t&color=%23039BE5" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
</div>

<div class="main">
  <h3><span style="text-decoration: underline;">RNRC CONFLICT REQUEST
      PROCEDURE AND GUIDELINES</span></h3>

      <p>1) Please complete all required fields below. Your REQUEST will not submit unless all required fields are filled in correctly.</p>
      <p>2) Create a folder in your own email account where you can store all your CONFLICT REQUEST receipts/replies so you have your own &lsquo;paper trail&rsquo; of CONFLICT REQUESTs.</p>
      <p>3) Upon submitting your request you will either immediately be emailed an APPROVAL or you will immediately be emailed a DENIAL. If you do not immediately receive the APPROVAL/DENIAL, please email Uncle Gary at gweiss@rocknrollchorus.com to let him know. You must do this immediately. Only the time stamp of a successfully submitted REQUEST will be considered recording of APPROVAL/DENIAL.</p>
      <p>4) Double-check all your APPROVALS to make sure that the DATE and TIMES are correct.</p>
      <p>5) You must enter ONE CONFLICT REQUEST DATE per submission, unless it is a recurring conflict at the exact same times of day. If a recurring CONFLICT REQUEST is not at the same times of day as others, you must enter it separately. You may submit CONFLICT REQUESTS as many times as you choose. (Read all below policies.)</p>
      <p>6) You should only submit CONFLICT REQUESTs for dates/times when you truly cannot attend an RNRC event. If your REQUEST is something that can be moved or avoided then you should not submit a CONFLICT REQUEST.</p>
      <p>7) Please check the RNRC Company Calendar at www.RNRCCompanyCalendar.com before you submit this REQUEST. If your REQUEST is a date for which RNRC has nothing scheduled or pending (for your cast) you will be approved. If your REQUEST is for a date that RNRC has already color-coded on the Company Calendar as PENDING, REHEARSAL, RECORDING, SHOW, or EVENT then your REQUEST will be denied.  Approving CONFLCIT REQUESTS for dates where we already have events at the time of submission will be extremely rare and will be at the discretion of Mr. Cantaffa.</p>
      <p>8) If you miss the last rehearsal prior to an RNRC event, you must attend that next event for support and general help for the show but you may not perform in that event. If, at the discretion of RNRC, it is decided that you are needed to perform at that next event, then you will attend the following event but not perform. Also, if at the discretion of RNRC, it is determined that you have not attended enough rehearsal time to be ‘ready’ to perform in a particular event or song due to missed events/rehearsals, then you will not perform, but still must attend</p>
      <p>9) You must submit CONFLICT REQUESTS for ANY dates and times throughout the entirety of this season. You do not have to submit REQUESTS for school days DURING SCHOOL HOURS. You must submit REQUESTS for school days for after school hours. ALL OTHER dates and times that you are not available to be with RNRC (INCLUDING MAJOR HOLIDAYS) must be submitted as CONFLICT REQUESTS. Please do not take any date/time ‘for granted’ by assuming that we will not accept an event invitation for that time.</p>
      <p>10) Please remember that you should only be submitting CONFLICT REQUESTS for the dates that we have nothing currently scheduled on the RNRC Company Calendar. If we already have something scheduled and/or color-coded on the Calendar then it is too late to submit a CONFLICT REQUEST.</p>
      <p>11) Please understand that if you do not have an approved CONFLICT on a date/time already approved on the calendar for you, then you are committing that you ARE AVAILABLE for that date/time in the event that RNRC is invited to perform, appear, record, or is in need of rehearsal.</p>
      <p>12)  If your plans change and you become available for a date where you already have an APPROVED CONFLICT you may email Uncle Gary directly to remove your conflict ONLY IF RNRC has nothing currently scheduled and/or color-coded on the Calendar for that date. If RNRC already has something on the Calendar for the date of your retraction, then you will not attend that event – we took the event knowing that you were not available. (Clarification: You can not put in a CONFLICT REQUEST, then see that a ‘cool’ show comes up, and then retract your CONFLICT. If your REQUEST was something that could have been changed or avoided, then it should not have been submitted in the first place. Further, many of our shows take place at professional venues where Security Clearance Lists are necessary. If you have a CONFLICT for that day your name will not be on the Clearance List and you will not be able to get into the venue without causing trouble for RNRC.)</p>
      <p>13) Please remember that RNRC wants you at everything. However, we understand that life needs balance. This procedure is designed to allow for balance without sacrificing the integrity of what we can build together. Whatever you commit to first on a given date is what’s most important. Accepting a role in RNRC means knowing that you can have a balanced life, but that RNRC is important enough to you that you will make yourself available enough that it can be one of your priorities. “Family/health first, advanced academic planning/grades second, and then RNRC tied for third with one or two other true passions you have in life (i.e. – work, your HS musical, college auditions, an SAT class, a sport, etc. - remember: one or two of these), and then all your other activities (i.e. – other extra-curricular clubs and activities, outside classes/lessons) and social commitments. If we all follow these guidelines, make time to practice at home between rehearsals, and arrive at RNRC events and rehearsals focused and prepared, it will be amazing what we can accomplish!</p>

    </span>
</div>

<div class="main">
    <!-- <a style="float:right;border:1px; background-color:yellow;padding:5px 2px 5px 2px;margin-top:10px;" href="{{ route('U_admin_panel') }}">Admin Panel</a> -->
    <section class="form_sec">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="tab-container-one">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active"><a class="nav-link active" href="#home" role="tab" aria-controls="home" data-bs-toggle="tab">Partial Day Conflict Request</a></li>
                        <li class="nav-item"><a class="nav-link" href="#profile" role="tab" aria-controls="profile" data-bs-toggle="tab">Full Day Conflict Request</a></li>
                        <li class="nav-item"><a class="nav-link" href="#messages" role="tab" aria-controls="messages" data-bs-toggle="tab">Recurring Conflict Request</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-xs-12 col-sm-7 col-md-7 centerCol">
                                <form action="{{ route('U_appointment_schedule') }}" method="post">
                                @csrf
                                <input type="hidden" name="form_type" value="1">
                                <div class="form_head">
                                <h1>RNRC Partial Day Conflict Form</h1>
                                <hr>
                                <!-- <h4><i class="fa-solid fa-eye"></i> ecosunny1324@gmail.com (not shared)<a href="javascript:void(0)"> Switch account</a> <span><i class="fa-solid fa-cloud-arrow-down"></i></span></h4> -->
                                <!-- <h5>*Required</h5> -->
                                </div>

                                <div class="input_div">
                                <div class="form-group">
                                <label for="exampleInputPassword1">First Name <span>*</span></label>
                                <input type="text" name="first_name" class="requirements" placeholder="First Name" required id="exampleInputPassword1">
                                </div>
                                </div>

                                <div class="input_div">
                                <div class="form-group">
                                <label for="exampleInputPassword1">Last Name  <span>*</span></label>
                                <input type="text" name="last_name" placeholder="Last Name"required id="exampleInputPassword1">
                                </div>
                                </div>
                                <div class="input_div">
                                <div class="form-group">
                                <label for="">Email Address  <span>*</span></label>
                                <input type="email" placeholder="Your Email" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                </div>
                                <div class="input_div">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Date  <span>*</span></label>
                                <input type="date" name="date" min="{{now()->toDateString('Y-m-d')}}" class="form-control" required id="exampleInputEmail1" >
                                </div>
                                </div>
                                <div class="input_div">
                                <div class="form-group">
                                <label for="">Start Time   <span>*</span></label>
                                <select name="start_time" id="">
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">01:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="17:00">05:00 PM</option>
                                </select>
                                </div>
                                </div>
                                <div class="input_div">
                                <div class="form-group">
                                <label for="">End Time   <span>*</span></label>
                                <select name="end_time" id="">
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">01:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="17:00">05:00 PM</option>
                                <option value="18:00">06:00 PM</option>
                                </select>
                                </div>
                                </div>

                                <div class="input_div">
                                <div class="form-group">
                                <label for="exampleInputPassword1">Reason For Conflict   <span>*</span></label>
                                <input type="text" name="reason" required id="exampleInputPassword1">
                                </div>
                                </div>
                                <!-- <div class="input_div">
                                <div class="form-group">
                                <label for="exampleInputPassword0">Password<span>*</span></label>
                                <input type="password" name="password" required id="exampleInputPassword0">
                                </div>
                                </div> -->
                                <!-- <div class="">
                                <div class="form-group">
                                <input type="submit" placeholder="" >
                                </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-xs-12 col-sm-7 col-md-7 centerCol">
                            <form action="{{ route('U_full_day_appointment') }}" method="post">
                            @csrf
                            <input type="hidden" name="form_type" value="2">
                            <div class="form_head">
                            <h1>RNRC Full Day Conflict Form</h1>
                            <hr>
                            <!-- <h4><i class="fa-solid fa-eye"></i> ecosunny1324@gmail.com (not shared)<a href="javascript:void(0)"> Switch account</a> <span><i class="fa-solid fa-cloud-arrow-down"></i></span></h4> -->
                            <!-- <h5>*Required</h5> -->
                            </div>

                            <div class="input_div">
                            <div class="form-group">
                            <label for="exampleInputPassword1">First Name <span>*</span></label>
                            <input type="text" name="first_name" class="requirements" placeholder="First Name" required id="exampleInputPassword1">
                            </div>
                            </div>

                            <div class="input_div">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Last Name  <span>*</span></label>
                            <input type="text" name="last_name" placeholder="Last Name"required id="exampleInputPassword1">
                            </div>
                            </div>
                            <div class="input_div">
                            <div class="form-group">
                            <label for="">Email Address  <span>*</span></label>
                            <input type="email" placeholder="Your Email" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            </div>
                            <div class="input_div">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Date  of Conflict<span>*</span></label>
                            <input type="date" name="date" min="{{now()->toDateString('Y-m-d')}}" class="form-control" required id="exampleInputEmail1" >
                            </div>
                            </div>
                            <div class="input_div">
                            <div class="form-group">
                            <label for="exampleInputreason1">Reason For Conflict   <span>*</span></label>
                            <input type="text" name="reason" required id="exampleInputreason1">
                            </div>
                            </div>
                            <!-- <div class="input_div">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Password<span>*</span></label>
                            <input type="password" name="password" required id="exampleInputPassword1">
                            </div>
                            </div> -->
                            <!-- <div class="">
                            <div class="form-group">
                            <input type="submit" placeholder="" >
                            </div>
                            </div> -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="col-xs-12 col-sm-7 col-md-7 centerCol">
            <form action="{{ route('U_recur_day_appointment') }}" method="post">
            @csrf
            <input type="hidden" name="form_type" value="3">
            <div class="form_head">
              <h1>RNRC Recurring Conflict Request Form</h1>
              <hr>
              <!-- <h4><i class="fa-solid fa-eye"></i> ecosunny1324@gmail.com (not shared)<a href="javascript:void(0)"> Switch account</a> <span><i class="fa-solid fa-cloud-arrow-down"></i></span></h4> -->
              <!-- <h5>*Required</h5> -->
            </div>

            <div class="input_div">
                 <div class="form-group">
                   <label for="exampleInputPassword1">First Name <span>*</span></label>
                    <input type="text" name="first_name" class="requirements" placeholder="First Name" required id="exampleInputPassword1">
                 </div>
              </div>

            <div class="input_div">
                 <div class="form-group">
                   <label for="exampleInputPassword1">Last Name  <span>*</span></label>
                    <input type="text" name="last_name" placeholder="Last Name"required id="exampleInputPassword1">
                 </div>
              </div>
            <div class="input_div">
                 <div class="form-group">
                   <label for="">Email Address  <span>*</span></label>
                   <input type="email" placeholder="Your Email" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp">
                 </div>
              </div>
              <div class="input_div">
                  <label for="">Dose the event occur on Weekly or Daily basis  <span>*</span></label>
                <<div class="form-check">

                    <input class="form-check-input" type="radio" value="weekly" name="event_occur" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Weekly
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="daily" name="event_occur" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Daily
                    </label>
                </div>
              </div>
                <div class="input_div">
                 <div class="form-group">
                   <label for="exampleInputEmail1"> Start Date  <span>*</span></label>
                   <input type="date" name="start_date" min="{{now()->toDateString('Y-m-d')}}" class="form-control" required id="exampleInputEmail1" >
                 </div>
                </div>
                <div class="input_div">
                 <div class="form-group">
                   <label for="exampleInputEmail1">End Date  <span>*</span></label>
                   <input type="date" name="end_date" min="{{now()->toDateString('Y-m-d')}}" class="form-control" required id="exampleInputEmail1" >
                 </div>
                </div>
            <div class="input_div">
                 <div class="form-group">
                   <label for="">Start Time   <span>*</span></label>
                   <select name="start_time" id="">
                    <option value="09:00">09:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">01:00 PM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="17:00">05:00 PM</option>
                   </select>
                 </div>
              </div>
              <div class="input_div">
                 <div class="form-group">
                   <label for="">End Time   <span>*</span></label>
                   <select name="end_time" id="">
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">01:00 PM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="17:00">05:00 PM</option>
                    <option value="18:00">06:00 PM</option>
                   </select>
                 </div>
              </div>

              <div class="input_div">
                 <div class="form-group">
                   <label for="exampleInputPassword1">Reason For Conflict   <span>*</span></label>
                   <input type="text" name="reason" required id="exampleInputPassword1">
                 </div>
              </div>
              <!-- <div class="">
                 <div class="form-group">
                   <input type="submit" placeholder="" >
                 </div>
              </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
      </div>
    </section>
</div>





<!-- <div class="main">
		<input type="button" class="button"value="Partial Day Conflict Request" id="normalEventButton" onClick="normalEventButton.onclick">
		<input type="button" class="button"value="Full Day Conflict Request"id="fullDayEventButton" onClick="fullDayEventButton.onclick">
		<input type="button" class="button"value="Recurring Conflict Request" id="recurringEventButton" onClick="recurringEventButton.onclick">
	<br /><br />
   <iframe id="formIframe" src="https://docs.google.com/forms/d/1KVB5WIBn_NZjqZut83sKpz3bxkxC7fts_NX9TAaHhLg/viewform?embedded=true" width="800px" height="2200px"frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
</div>


      <script>
          normalEventButton.onclick=function(){
            document.getElementById("formIframe").src="https://docs.google.com/forms/d/1KVB5WIBn_NZjqZut83sKpz3bxkxC7fts_NX9TAaHhLg/viewform?embedded=true";
          }

          fullDayEventButton.onclick=function(){
              document.getElementById("formIframe").src="https://docs.google.com/forms/d/1hWkpKVKTpXbVqUqX0V7XRIMeqjxBW4NJL-DIgtJzquc/viewform?embedded=true";
          }

          recurringEventButton.onclick=function()
          {
              document.getElementById("formIframe").src="https://docs.google.com/forms/d/1Xs9fEJHte2_b6FiQM1ZT6WIVyElzSx31S6Q8cfqnDNQ/viewform?embedded=true";
          }
      </script> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
