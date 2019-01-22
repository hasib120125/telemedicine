<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Crescent E-Health Service</title>
        <meta charset="UTF-8" />
        <style>
        /*basic reset*/
        * {margin: 0; padding: 0;}

        html {
            height: 100%;
            /*Image only BG fallback*/
            
            /*background = gradient + image pattern combo*/
            background: 
                linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));
        }

        body {
            font-family: montserrat, arial, verdana;
        }
        /*form styles*/
        #msform {
            width: 800px;
            margin: 50px auto;
            text-align: center;
            position: relative;
        }
        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 7%;
            
            /*stacking fieldsets above each other*/
            position: relative;
        }
        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }
        /*inputs*/
        #msform input, #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }
        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #27AE60;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }
        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }
        /*headings*/
        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }
        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }
        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }
        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 24.33%;
            float: left;
            position: relative;
        }
        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 10px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }
        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none; 
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,  #progressbar li.active:after{
            background: #27AE60;
            color: white;
        }

        select {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        appearance: none;
        outline: 0;
        box-shadow: none;
        border: 0 !important;
        background: #ffffff;
        background-image: none;
        }
        /* Custom Select */
        .select {
        position: relative;
        display: block;
        width: 20em;
        height: 3em;
        line-height: 3;
        background: #2c3e50;
        overflow: hidden;
        border-radius: .25em;
        left: 140px;
        bottom: 10px;
        border: 1px solid #ddd;
        }
        select {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0 0 0 .5em;
        cursor: pointer;
        }
        select::-ms-expand {
        display: none;
        }
        /* Arrow */
        .select::after {
        content: '\25BC';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        padding: 0 1em;
        background: #ffffff;
        pointer-events: none;
        }
        /* Transition */
        .select:hover::after {
        color: #f39c12;
        }
        .select::after {
        -webkit-transition: .25s all ease;
        -o-transition: .25s all ease;
        transition: .25s all ease;
        }
        .option-hidden {
            display:none;   
        }

        .alert {
            padding: 11px;
            background-color: #f44336;
            color: white;
            width: 500px;
            margin-bottom: 10px;
            text-align: left;
            margin-left: 56px;
            }
        
        .alert ul li{
            list-style: none;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
            }
        </style>
    </head>

    <body>
        <!-- multistep form -->
        {!! Form::open(['route' => 'user-registration-save','method'=>'POST', 'id' => 'msform', 'enctype' => 'multipart/form-data']) !!}
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Personal Information</li>
                <li>Login Information</li>
                <li>Configure Services</li>
                <li>Upload Photo</li>
            </ul>

            @if ($errors->any())
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
                    </span> 
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif     

            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Please Give Your Personal Information</h2>
                <h3 class="fs-subtitle">This is step 1</h3>
                <span style="display: flex;">
                    <input type="text" name="fname" placeholder="First Name" /> &nbsp;
                    <input type="text" name="lname" placeholder="Last Name" />
                </span>

                <span style="display: flex;">
                    <input type="text" name="phone" placeholder="Phone" /> &nbsp;
                    <input type="text" name="country" placeholder="Country" />
                </span>

                <span style="display: flex;">
                    <input type="text" name="area" placeholder="Area" /> &nbsp;
                    <input type="text" name="thana" placeholder="Thana" />
                </span>

                <span style="display: flex;">
                    <input type="text" name="district" placeholder="District" /> &nbsp;
                    <input type="text" name="postal_code" placeholder="Postal Code" />
                </span>

                <div class="select" style="left: 1px;width: 284px;bottom: 1px;">
                    <select name="gender" id="slct select_box1" class="select_box" data-select="select1">
                        <option>Choose an option</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="common">Common</option>
                    </select>
                </div>
                <a href="{{url('/user-login')}}"><input type="button" class="action-button" name="Login" value="Login" /></a>
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Login Information</h2>
                <h3 class="fs-subtitle">This is step 2</h3>
                <input type="text" name="username" placeholder="Username" />
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="pass" placeholder="Password" />
                <input type="password" name="cpass" placeholder="Confirm Password" />
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Configure Services</h2>
                <h3 class="fs-subtitle">This is step 3</h3>
                <div class="select">
                    <select name="user_type" id="slct select_box1" class="select_box" data-select="select1">
                        <option>Choose an option</option>
                        <option value="user">User</option>
                        <option value="doctor">Doctor</option>
                    </select>
                </div>
                <div class="option-hidden" data-select="select1user">
                </div>
                    
                <div class="option-hidden" data-select="select1doctor">
                    <span style="display: flex;">
                        <input type="text" id="inputdoctor" name="doctor_type" placeholder="Doctor Type" /> &nbsp;
                        <input type="text" name="specialization" placeholder="specialization" />
                    </span>

                    <span style="display: flex;">
                        <input type="text" name="fee" placeholder="Fee" /> &nbsp;
                        <input type="text" name="visiting_hour" placeholder="Visiting Hour" />
                    </span>

                    <span style="display: flex;">
                        <input type="text" name="degree" placeholder="Degree" /> &nbsp;
                        <input type="text" name="chamber" placeholder="Chamber" />
                    </span>

                    <span style="display: flex;">
                        <input type="text" name="skype" placeholder="Skype" /> &nbsp;
                        <input type="text" name="whatsapp" placeholder="Whatsapp" />
                    </span>
                    <span style="display: flex;">
                        <input type="text" name="viber" placeholder="Viber" /> &nbsp;
                        <input type="text" name="imo" placeholder="Imo" />
                    </span>
                </div>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Configure Services</h2>
                <h3 class="fs-subtitle">This is step 3</h3>
                <input type="file" name="profile_picture">
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <button type="submit" style="width: 87px;height: 34px;background: #4faf61;color: #fff;">Submit</button>
            </fieldset>
            <input type="hidden" name="status" value="0">
        {!! Form::close() !!}
    </body>
    <script src="{{asset('js/frontend_js/jquery2.1.3.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.easing.min.js')}}"></script>
    <script>
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function(){
            if(animating) return false;
            animating = true;
            
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            
            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            
            //show the next fieldset
            next_fs.show(); 
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50)+"%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                'transform': 'scale('+scale+')',
                'position': 'absolute'
            });
                    next_fs.css({'left': left, 'opacity': opacity});
                }, 
                duration: 800, 
                complete: function(){
                    current_fs.hide();
                    animating = false;
                }, 
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function(){
            if(animating) return false;
            animating = true;
            
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            
            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            
            //show the previous fieldset
            previous_fs.show(); 
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1-now) * 50)+"%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                }, 
                duration: 800, 
                complete: function(){
                    current_fs.hide();
                    animating = false;
                }, 
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function(){
            return false;
        })
    </script>

    <script>
        $(function(){
            $('.select_box').change(function() {
                var selectData = $(this).attr("data-select");
                var selectValue = $(this).val();
                if($("div[data-select='" + selectData + selectValue +"']").css("display") == "none"){
                    $("div[data-select^='" + selectData + "']").hide();
                    $("div[data-select='" + selectData + selectValue +"']").show();
                }
            });
        });
    </script>
</html>