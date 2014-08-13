<?php
$allowedExts = array("docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")&& in_array($extension, $allowedExts)))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	//system('cd C:\\Program Files (x86)\\LibreOffice 3\\program\\');
	//echo "after change directory";
	 exec('cd C:\Program Files (x86)\LibreOffice 3\program\ & soffice --headless -convert-to pdf:writer_pdf_Export -outdir C:\wamp\www\download C:\wamp\www\upload\test.docx');
	/*echo system(
    'soffice --headless -convert-to pdf:writer_pdf_Export -outdir C:\\test C:\\wamp\\www\upload\\MS Word Accessibility Testing Document.docx'
    );*/
	//echo "after system call";
	echo "<a href='/download/test.pdf' target='_blank'>Download</a>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
     // echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
     // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>
