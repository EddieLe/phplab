<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Basic Form</title>

	<link rel="stylesheet" href="/eddie/activity/views/Back/assets/demo.css">
	<link rel="stylesheet" href="/eddie/activity/views/Back/assets/form-basic.css">

</head>


	<header>
		<h1>Freebie: 7 Clean and Responsive Forms</h1>
        <a href="table">活動明細</a>
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
<?php var_dump($_POST)?>
        <form class="form-basic" method="post" action="create">

            <div class="form-title-row">
                <h1>新增活動表</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Title Name</span>
                    <input type="text" name="title" value="">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Limit</span>
                    <input type="text" name="limit" value="">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Start Time</span>
                    <input type="date" name="start" value="">
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>End Time</span>
                    <input type="date" name="end" value="">
                </label>
            </div>

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
                            <input type="radio" name="flag" value="可攜伴">
                            <span>可攜伴</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="flag" value="不可攜伴">
                            <span>不可攜伴</span>
                        </label>
                    </div>
                </div>
            </div>
            <script>
                function add_new_data() {
                 //先取得目前的row數
                 var num = document.getElementById("mytable").rows.length;
                 //建立新的tr 因為是從0開始算 所以目前的row數剛好為目前要增加的第幾個tr
                 var Tr = document.getElementById("mytable").insertRow(num);
                 //建立新的td 而Tr.cells.length就是這個tr目前的td數
                 Td = Tr.insertCell(Tr.cells.length);
                 //而這個就是要填入td中的innerHTML
                 Td.innerHTML='<input name="name[]" type="text" size="12">';
                 //這裡也可以用不同的變數來辨別不同的td (我是用同一個比較省事XD)
                 Td = Tr.insertCell(Tr.cells.length);
                 Td.innerHTML='<input name="content[]" type="text" size="12">';
                 //這樣就好囉 記得td數目要一樣 不然會亂掉~
                }
                
                function remove_data() {
                 //先取得目前的row數
                 var num = document.getElementById("mytable").rows.length;
                 //防止把標題跟原本的第一個刪除XD
                 if(num >2)
                 {
                  //刪除最後一個
                  document.getElementById("mytable").deleteRow(-1);
                 }
                }
            </script>
            <div>
                <table id="mytable" width="580">
                    <tr>
                        <td width="150" class="td01">員工名稱</td>
                        <td width="200" class="td01">員工編號</td>
                    </tr>
                    <tr>
                        <td>
                        <input type="button" value="新增" onclick="add_new_data()"/>
                        </td>
                        <td>
                        <input type="button" value="刪除" onclick="remove_data()"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input name="name[]" type="text" size="12">
                        </td>
                        <td>
                        <input name="content[]" type="text" size="12">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-row">
                <button type="submit">Submit Form</button>
            </div>

        </form>

    </div>

</body>

</html>
