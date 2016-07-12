<?php

    require("config.php");
    $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
    $result = mysql_query("set name utf8", $link);
    mysql_selectdb ( $dbname, $link );
    $cmd = "SELECT * FROM products";
    $result = mysql_query($cmd, $link);
    mysql_close($link);
   
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>編輯</title>
</head>
	<body>
		<table width="600px" align="center" border="1" bgcolor="#CCFF99">
				<tr>
				    <th>編號</th>
					<th>Picture</th>
					<th>Item</th>
					<th>Price</th>
					<th colspan="2">Comtroll</th>
						
				</tr>
				<?php while ($row = mysql_fetch_assoc($result)) : ?>
				<tr>
                  	
                    <td><?php echo $row["id"] ?></td>
					<td><img src=<?php echo picture."/".$row["picture"]?>></td>
					<td><?php echo $row["item"] ?></td>
					<td>＄<?php echo $row["price"] ?></td>
					<td>
						<form action="updatepage.php", method="post">
						<input name="update" type="hidden" value="<?php echo $row["id"] ?>">
						<button>修改</button>
						</form>				
					<td>
						<form action="Delete.php", method="post">
						<input name="delete" type="hidden" value="<?php echo $row["id"] ?>">
						<button>刪除</button>
						</form>
					</td>
				</tr>
				<?php endwhile; ?>

		</table>	

				<div style="text-align: center;">	
					<form action="editpage.php", method="get">
						<button>新增</button>
				    </form>
				    <br>
				    <form method="post" action=loginpage.php>
						<input type="submit" name="logout" id="btnHome" value="登出" />
					</form>
				</div>    
		
	</body>
</html>

<!--<!DOCTYPE html>-->
<!-- saved from url=(0045)https://blueimp.github.io/jQuery-File-Upload/ -->
<!--<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
<!--<![endif]-->

<!--<title>jQuery File Upload Demo</title>-->
<!--<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!-- Bootstrap styles -->
<!--<link rel="stylesheet" href="../public/jQuery File Upload/bootstrap.min.css">-->
<!-- Generic page styles -->
<!--<link rel="stylesheet" href="../public/jQuery File Upload/style.css">-->
<!-- blueimp Gallery styles -->
<!--<link rel="stylesheet" href="../public/jQuery File Upload/blueimp-gallery.min.css">-->
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<!--<link rel="stylesheet" href="../public/jQuery File Upload/jquery.fileupload.css">-->
<!--<link rel="stylesheet" href="../public/jQuery File Upload/jquery.fileupload-ui.css">-->
<!-- CSS adjustments for browsers with JavaScript disabled -->
<!--<noscript>&lt;link rel="stylesheet" href="css/jquery.fileupload-noscript.css"&gt;</noscript>-->
<!--<noscript>&lt;link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"&gt;</noscript>-->
<!--<link type="text/css" rel="stylesheet" charset="UTF-8" href="../public/jQuery File Upload/translateelement.css"></head>-->
<!--<body>-->
<!--<div class="navbar navbar-default navbar-fixed-top">-->
<!--    <div class="container">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a class="navbar-brand" href="https://github.com/blueimp/jQuery-File-Upload">jQuery File Upload</a>-->
<!--        </div>-->
<!--        <div class="navbar-collapse collapse">-->
<!--            <ul class="nav navbar-nav">-->
<!--                <li><a href="https://github.com/blueimp/jQuery-File-Upload/tags">Download</a></li>-->
<!--                <li><a href="https://github.com/blueimp/jQuery-File-Upload">Source Code</a></li>-->
<!--                <li><a href="https://github.com/blueimp/jQuery-File-Upload/wiki">Documentation</a></li>-->
<!--                <li><a href="https://blueimp.net/">© Sebastian Tschan</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="container">-->
<!--    <div class="clearfix">-->
<!--        <div class="pull-left">-->
<!--            <h1>jQuery File Upload Demo</h1>-->
<!--            <h2 class="lead">Basic Plus UI version</h2>-->
<!--        </div>-->
<!--        <p class="pull-right">-->
            <!--<script async="" src="../public/jQuery File Upload/analytics.js"></script><script src="../public/jQuery File Upload/ca-pub-4004031949998028.js"></script><script async="" src="../public/jQuery File Upload/adsbygoogle.js"></script>-->
            <!--<ins class="adsbygoogle" style="display:inline-block;width:320px;height:100px" data-ad-client="ca-pub-4004031949998028" data-ad-slot="8543690390" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:100px;margin:0;padding:0;position:relative;visibility:visible;width:320px;background-color:transparent">-->
            <!--	<ins id="aswift_0_anchor" style="display:block;border:none;height:100px;margin:0;padding:0;position:relative;visibility:visible;width:320px;background-color:transparent"><iframe width="320" height="100" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;" src="../public/jQuery File Upload/saved_resource.html"></iframe></ins></ins></ins>-->
<!--            <script>-->
<!--            (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--            </script>-->
<!--        </p>-->
<!--    </div>-->
<!--    <ul class="nav nav-tabs">-->
        <!--<li><a href="https://blueimp.github.io/jQuery-File-Upload/basic.html">Basic</a></li>-->
        <!--<li><a href="https://blueimp.github.io/jQuery-File-Upload/basic-plus.html">Basic Plus</a></li>-->
        <!--<li class="active"><a href="https://blueimp.github.io/jQuery-File-Upload/index.html">Basic Plus UI</a></li>-->
<!--        <li class="active"><a>編輯</a></li>-->
        <!--<li><a href="https://blueimp.github.io/jQuery-File-Upload/angularjs.html">AngularJS</a></li>-->
        <!--<li><a href="https://blueimp.github.io/jQuery-File-Upload/jquery-ui.html">jQuery UI</a></li>-->
<!--    </ul>-->
<!--    <br>-->
    <!--<blockquote>-->
    <!--    <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery.<br>-->
    <!--    Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>-->
    <!--    Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>-->
    <!--</blockquote>-->
<!--    <br>-->
    <!-- The file upload form used as target for the file upload widget -->
<!--    <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">-->
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
<!--        <noscript>&lt;input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"&gt;</noscript>-->
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
<!--        <div class="row fileupload-buttonbar">-->
<!--            <div class="col-lg-7">-->
                <!-- The fileinput-button span is used to style the file input field as button -->
<!--                <span class="btn btn-success fileinput-button">-->
<!--                    <i class="glyphicon glyphicon-plus"></i>-->
<!--                    <span>Add files...</span>-->
<!--                    <input type="file" name="files[]" multiple="">-->
<!--                </span>-->
<!--                <button type="submit" class="btn btn-primary start">-->
<!--                    <i class="glyphicon glyphicon-upload"></i>-->
<!--                    <span>Start upload</span>-->
<!--                </button>-->
<!--                <button type="reset" class="btn btn-warning cancel">-->
<!--                    <i class="glyphicon glyphicon-ban-circle"></i>-->
<!--                    <span>Cancel upload</span>-->
<!--                </button>-->
<!--                <button type="button" class="btn btn-danger delete">-->
<!--                    <i class="glyphicon glyphicon-trash"></i>-->
<!--                    <span>Delete</span>-->
<!--                </button>-->
<!--                <input type="checkbox" class="toggle">-->
                <!-- The global file processing state -->
<!--                <span class="fileupload-process"></span>-->
<!--            </div>-->
            <!-- The global progress state -->
<!--            <div class="col-lg-5 fileupload-progress fade">-->
                <!-- The global progress bar -->
<!--                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">-->
<!--                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>-->
<!--                </div>-->
                <!-- The extended global progress state -->
<!--                <div class="progress-extended">&nbsp;</div>-->
<!--            </div>-->
<!--        </div>-->
        <!-- The table listing the files available for upload/download -->
<!--        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>-->
<!--    </form>-->
<!--    <br>-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-heading">-->
<!--            <h3 class="panel-title">Demo Notes</h3>-->
<!--        </div>-->
<!--        <div class="panel-body">-->
<!--            <ul>-->
            <!--    <li>The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>-->
            <!--    <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>-->
            <!--    <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>-->
            <!--    <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>-->
            <!--    <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>-->
            <!--    <li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- The blueimp Gallery widget -->
<!--<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">-->
<!--    <div class="slides"></div>-->
<!--    <h3 class="title"></h3>-->
<!--    <a class="prev">‹</a>-->
<!--    <a class="next">›</a>-->
<!--    <a class="close">×</a>-->
<!--    <a class="play-pause"></a>-->
<!--    <ol class="indicator"></ol>-->
<!--</div>-->
<!-- The template to display files available for upload -->
<!--<script id="template-upload" type="text/x-tmpl">-->
<!--{% for (var i=0, file; file=o.files[i]; i++) { %}-->
<!--    <tr class="template-upload fade">-->
<!--        <td>-->
<!--            <span class="preview"></span>-->
<!--        </td>-->
<!--        <td>-->
<!--            <p class="name">{%=file.name%}</p>-->
<!--            <strong class="error text-danger"></strong>-->
<!--        </td>-->
<!--        <td>-->
<!--            <p class="size">Processing...</p>-->
<!--            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>-->
<!--        </td>-->
<!--        <td>-->
<!--            {% if (!i && !o.options.autoUpload) { %}-->
<!--                <button class="btn btn-primary start" disabled>-->
<!--                    <i class="glyphicon glyphicon-upload"></i>-->
<!--                    <span>Start</span>-->
<!--                </button>-->
<!--            {% } %}-->
<!--            {% if (!i) { %}-->
<!--                <button class="btn btn-warning cancel">-->
<!--                    <i class="glyphicon glyphicon-ban-circle"></i>-->
<!--                    <span>Cancel</span>-->
<!--                </button>-->
<!--            {% } %}-->
<!--        </td>-->
<!--    </tr>-->
<!--{% } %}-->
<!--</script>-->
<!-- The template to display files available for download -->
<!--<script id="template-download" type="text/x-tmpl">-->
<!--{% for (var i=0, file; file=o.files[i]; i++) { %}-->
<!--    <tr class="template-download fade">-->
<!--        <td>-->
<!--            <span class="preview">-->
<!--                {% if (file.thumbnailUrl) { %}-->
<!--                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>-->
<!--                {% } %}-->
<!--            </span>-->
<!--        </td>-->
<!--        <td>-->
<!--            <p class="name">-->
<!--                {% if (file.url) { %}-->
<!--                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>-->
<!--                {% } else { %}-->
<!--                    <span>{%=file.name%}</span>-->
<!--                {% } %}-->
<!--            </p>-->
<!--            {% if (file.error) { %}-->
<!--                <div><span class="label label-danger">Error</span> {%=file.error%}</div>-->
<!--            {% } %}-->
<!--        </td>-->
<!--        <td>-->
<!--            <span class="size">{%=o.formatFileSize(file.size)%}</span>-->
<!--        </td>-->
<!--        <td>-->
<!--            {% if (file.deleteUrl) { %}-->
<!--                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>-->
<!--                    <i class="glyphicon glyphicon-trash"></i>-->
<!--                    <span>Delete</span>-->
<!--                </button>-->
<!--                <input type="checkbox" name="delete" value="1" class="toggle">-->
<!--            {% } else { %}-->
<!--                <button class="btn btn-warning cancel">-->
<!--                    <i class="glyphicon glyphicon-ban-circle"></i>-->
<!--                    <span>Cancel</span>-->
<!--                </button>-->
<!--            {% } %}-->
<!--        </td>-->
<!--    </tr>-->
<!--{% } %}-->
<!--</script>-->
<!--<script src="../public/jQuery File Upload/jquery.min.js"></script>-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<!--<script src="../public/jQuery File Upload/jquery.ui.widget.js"></script>-->
<!-- The Templates plugin is included to render the upload/download listings -->
<!--<script src="../public/jQuery File Upload/tmpl.min.js"></script>-->
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<!--<script src="../public/jQuery File Upload/load-image.all.min.js"></script>-->
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<!--<script src="../public/jQuery File Upload/canvas-to-blob.min.js"></script>-->
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!--<script src="../public/jQuery File Upload/bootstrap.min.js"></script>-->
<!-- blueimp Gallery script -->
<!--<script src="../public/jQuery File Upload/jquery.blueimp-gallery.min.js"></script>-->
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<!--<script src="../public/jQuery File Upload/jquery.iframe-transport.js"></script>-->
<!-- The basic File Upload plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload.js"></script>-->
<!-- The File Upload processing plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload-process.js"></script>-->
<!-- The File Upload image preview & resize plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload-image.js"></script>-->
<!-- The File Upload audio preview plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload-audio.js"></script>-->
<!-- The File Upload video preview plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload-video.js"></script>-->
<!-- The File Upload validation plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload-validate.js"></script>-->
<!-- The File Upload user interface plugin -->
<!--<script src="../public/jQuery File Upload/jquery.fileupload-ui.js"></script>-->
<!-- The main application script -->
<!--<script src="../public/jQuery File Upload/main.js"></script>-->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<!--<script src="js/cors/jquery.xdr-transport.js"></script>-->
<!--<![endif]-->
<!--<script>-->
<!--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
<!--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
<!--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
<!--})(window,document,'script','//www.google-analytics.com/analytics.js','ga');-->
<!--ga('create', 'UA-41071247-1', 'blueimp.github.io');-->
<!--ga('send', 'pageview');-->
<!--</script>-->
<!--<script>window.cookieconsent_options={"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"light-bottom"};</script>-->
<!--<script async="" src="../public/jQuery File Upload/cookieconsent.latest.min.js"></script>-->
<!--<div id="goog-gt-tt" class="skiptranslate" dir="ltr"><div style="padding: 8px;"><div><div class="logo">-->
<!--	<img src="../public/jQuery File Upload/translate_24dp.png" width="20" height="20">-->
<!--	</div></div></div>-->
<!--	<div class="top" style="padding: 8px; float: left; width: 100%;">-->
<!--		<h1 class="title gray">原文</h1></div><div class="middle" style="padding: 8px;">-->
<!--			<div class="original-text"></div></div>-->
<!--			<div class="bottom" style="padding: 8px;">-->
<!--				<div class="activity-links">-->
<!--					<span class="activity-link">建議更好的譯法</span>-->
<!--					<span class="activity-link"></span></div>-->
<!--					<div class="started-activity-container">-->
<!--						<hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;">-->
<!--						<div class="activity-root"></div></div></div><div class="status-message" style="display: none;">-->
<!--						</div></div>-->