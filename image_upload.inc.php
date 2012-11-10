<?php
//define a maxim size for the uploaded images in bytes
 define ("MAX_SIZE","1000"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,"."); //find the last occurence of "." in the string(filename)
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l); //extract the extension
         return $ext;
 }

//The count variable is used to know when all the picture files have been uploaded
  $cname = $advert['main_category_name'];
  $count=1;
//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors1_1=0;
 $errors1_2=0;
 $errors1_3=0;
 
 //checks if the file has been submitted by
//reading the name of the file the user submitted for uploading
while ($count < 3):

				if ($count == 1): $image = 'image1';  endif;
				if ($count == 2): $image = 'image2'; endif;

 	$name=$_FILES[$image]['name'];
 	//if it is not empty
 	if ($name): 
 	
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES[$image]['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")):
 		
		//print error message
 			
			$errors1_1=1;
 		
 		else:
 		
				//get the size of the image in bytes
				 //$_FILES['image']['tmp_name'] is the temporary filename of the file
				 //in which the uploaded file was stored on the server
				 $size=filesize($_FILES[$image]['tmp_name']);
				
				//compare the size with the maxim size we defined and print error if bigger
					if ($size > MAX_SIZE*1024):
					
						
						$errors1_2=1;
						else:

							//we will give an unique name, for example the time in unix time format
							$image_name=date('j, M Y').$filename;
							//the new name will be containing the full path where will be stored (images folder)
							$newname='images/ad-image/'.$cname.'/'.$image_name;
							//we verify if the image has been uploaded, and print error instead
							$copied = move_uploaded_file($_FILES[$image]['tmp_name'], $newname);
									if (!$copied):
									
										
										$errors1_3=1;
										endif;
						 
					//If no errors registred, print the success message
						 if(!$errors1_1 && !$errors1_2 && !$errors1_3):
						 
						 if ($count == 1): $newname1 = $newname;  endif;
						if ($count == 2): $newname2 = $newname; endif;
 
 	echo '<strong style="color:#00CC00;">Picture'.$count.' Uploaded Successfully!</strong><br/>';
 
endif;
endif;
endif;
endif;

$count = ++$count;
endwhile;


 ?>