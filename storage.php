<?php
  require_once 'vendor/autoload.php';

  use MicrosoftAzure\Storage\Blob\BlobRestProxy;
  use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
  use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
  use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
  use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

  function generateRandomString($length = 6) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  $connection_string = "DefaultEndpointsProtocol=https;AccountName=dicodingstoragesub;AccountKey=lsB1BeBQIsstoH0x/a5Licesj6zLNaR8mPplOi7AQ+qnrloySfzgL73K3EMQsLJ/LhCKgOZbY5dblsBWmErpQg==";
  $blobClient = BlobRestProxy::createBlobService($connectionString);
  // $fileToUpload = "HelloWorld.txt";
  // if (!isset($_GET["Cleanup"])) {
  //   $createContainerOptions = new CreateContainerOptions();
  //   $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
  //   $containerName = "blockblobs".generateRandomString();
  //   try {
  //     $blobClient->createContainer($containerName, $createContainerOptions);
  //     $myfile = fopen($fileToUpload, "w") or die("Unable to open file!");
  //     fclose($myfile);
      
  //     echo "Uploading BlockBlob: ".PHP_EOL;
  //     echo $fileToUpload;
  //     echo "<br />";
      
  //     $content = fopen($fileToUpload, "r");
  //     $blobClient->createBlockBlob($containerName, $fileToUpload, $content);
  //     $listBlobsOptions = new ListBlobsOptions();
  //     $listBlobsOptions->setPrefix("HelloWorld");
  //     echo "These are the blobs present in the container: ";
  //     do {
  //       $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
  //       foreach ($result->getBlobs() as $blob) {
  //         echo $blob->getName().": ".$blob->getUrl()."<br />";
  //       }
    
  //       $listBlobsOptions->setContinuationToken($result->getContinuationToken());
  //     } while($result->getContinuationToken());
  //     echo "<br />";
  //     echo "This is the content of the blob uploaded: ";
  //     $blob = $blobClient->getBlob($containerName, $fileToUpload);
  //     fpassthru($blob->getContentStream());
  //     echo "<br />";
  //   } catch(ServiceException $e){
  //     $code = $e->getCode();
  //     $error_message = $e->getMessage();
  //     echo $code.": ".$error_message."<br />";
  //   } catch(InvalidArgumentTypeException $e){
  //     $code = $e->getCode();
  //     $error_message = $e->getMessage();
  //     echo $code.": ".$error_message."<br />";
  //   }
  // } else {
  //     try {
  //       echo "Deleting Container".PHP_EOL;
  //       echo $_GET["containerName"].PHP_EOL;
  //       echo "<br />";
  //       $blobClient->deleteContainer($_GET["containerName"]);
  //     } catch(ServiceException $e){
  //       $code = $e->getCode();
  //       $error_message = $e->getMessage();
  //       echo $code.": ".$error_message."<br />";
  //     }
  // }
?>

<form method="post" action="/dicoding_azure/storage.php?Cleanup&containerName=<?php echo $containerName; ?>">
    <button type="submit">Press to clean up all resources created by this sample</button>
</form>