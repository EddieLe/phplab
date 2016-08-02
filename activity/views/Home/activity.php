<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Basic Form</title>

	<link rel="stylesheet" href="/eddie/activity/views/Home/assets/demo.css">
	<link rel="stylesheet" href="/eddie/activity/views/Home/assets/form-basic.css">

</head>


	<header>
		<h1>Freebie: 7 Clean and Responsive Forms</h1>
        <a href="http://tutorialzine.com/2015/07/freebie-7-clean-and-responsive-forms/">Download</a>
        <script type="text/javascript" src="jquery.date_input.js"></script>
    </header>

    <!--<ul>-->
    <!--    <li><a href="index.html" class="active">Basic</a></li>-->
    <!--    <li><a href="form-register.html">Register</a></li>-->
    <!--    <li><a href="form-login.html">Login</a></li>-->
    <!--    <li><a href="form-mini.html">Mini</a></li>-->
    <!--    <li><a href="form-labels-on-top.html">Labels on Top</a></li>-->
    <!--    <li><a href="form-validation.html">Validation</a></li>-->
    <!--    <li><a href="form-search.html">Search</a></li>-->
    <!--</ul>-->
    <div class="main-content">
        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>新增活動表</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Title Name</span>
                    <input type="text" name="name">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Count</span>
                    <input type="email" name="email">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Start Time</span>
                    <input type="date" name="name">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>End Time</span>
                    <input type="date" name="name">
                </label>
            </div>
            
            <!--<div class="form-row">-->
            <!--    <label>-->
            <!--        <span>Number or Name</span>-->
            <!--        <input type="text" name="name">-->
            <!--    </label>-->
                <!--<label>-->
            <!--        <span>Checkbox</span>-->
            <!--        <input type="checkbox" name="checkbox" checked>-->
                <!--</label>-->
            <!--</div>-->

            <!--<div class="form-row">-->
            <!--    <label>-->
            <!--        <span>Dropdown</span>-->
            <!--        <select name="dropdown">-->
            <!--            <option>Option One</option>-->
            <!--            <option>Option Two</option>-->
            <!--            <option>Option Three</option>-->
            <!--            <option>Option Four</option>-->
            <!--        </select>-->
            <!--    </label>-->
            <!--</div>-->

            <div class="form-row">
                <label>
                    <span>Info</span>
                    <textarea name="textarea"></textarea>
                </label>
            </div>

            <div class="form-row">
                <label><span>Radio</span></label>
                <div class="form-radio-buttons">

                    <div>
                        <label>
                            <input type="radio" name="radio">
                            <span>可攜伴</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="radio">
                            <span>不可攜伴</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <button type="submit">Submit Form</button>
            </div>

        </form>

    </div>

</body>

</html>
