<!DOCTYPE html>
<html>
<head>
	<title>Replace Textareas by Class Name &mdash; CKEditor Sample</title>
	<meta charset="utf-8">
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<form action="sample_posteddata.php" method="post">
			<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"></textarea>
	</form>
    <script language="javascript" type="text/javascript">
		CKEDITOR.replace('editor1',{
			filebrowserBrowseUrl: '/editor/browser/browse.php',
			filebrowserImageBrowseUrl: '/editor/browser/browse.php?type=Images',
			filebrowserUploadUrl: '/editor/uploader/upload.php',
			filebrowserImageUploadUrl: '/editor/uploader/upload.php?type=Images',
			filebrowserWindowWidth: '900',
			filebrowserWindowHeight: '400',
			filebrowserBrowseUrl: '/editor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: '/editor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl: '/editor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl: '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl: '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		});
    </script>
</body>
</html>