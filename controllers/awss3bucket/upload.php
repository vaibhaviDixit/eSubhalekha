<?php
 
	require 'aws-autoloader.php';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	
function uploadToAWS($filearr){

    // AWS Info
	// $bucketName = 'esubhalekha';
	// $IAM_KEY = 'AKIA4X3FUWUEORJBSKUT';
	// $IAM_SECRET = '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';

	// AWS Info
	$bucketName = 'esubhalekha';
	$IAM_KEY = 'AKIA4X3FUWUEORJBSKUT';
	$IAM_SECRET = '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';

	$objects="";

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation. us-east-2 is Ohio, us-east-1 is North Virgina
		// echo 1;
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'ap-south-1',
				'use_accelerate_endpoint' => true,
			)
		);
		
	} catch (Exception $e) {
		
	die("Error: " . $e->getMessage());
	}

	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = 'test_example/'.time() . basename($filearr['fileToUpload']['name']);  
	$pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;

	// Add it to S3
	try {
		
		if (!file_exists('/tmp/tmpfile')) {
			mkdir('/tmp/tmpfile',0777,true);
		}
			
		$tempFilePath = '/tmp/tmpfile/' . basename($filearr['fileToUpload']['name']);
	 
		$tempFile = fopen($tempFilePath, "w") or die("Error: Unable to open file.");

		$fileContents = file_get_contents($filearr['fileToUpload']['tmp_name']);
		$tempFile = file_put_contents($tempFilePath, $fileContents);

		$result =$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $tempFilePath,
				'StorageClass' => 'REDUCED_REDUNDANCY',
				'ACL'   => 'public-read'
			)
		);

		// Get the URL of the uploaded file
        $uploadedFileUrl = $result['ObjectURL'];

        return [
                'error' => false,
                'url' => $uploadedFileUrl
            ];
            

	} catch (S3Exception $e) {
		return [
                'error' => true,
                'errorMsg' => $e->getMessage()
            ];
	} catch (Exception $e) {
		return [
                'error' => true,
                'errorMsg' => $e->getMessage()
            ];
	}

}


	
?>
