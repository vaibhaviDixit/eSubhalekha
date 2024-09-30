<?php
// errors(1);
locked(['user', 'host', 'manager', 'admin']);

require('views/partials/dashboard/head.php');
require('views/partials/dashboard/sidebar.php');


controller("Wedding");
$wedding = new Wedding();

// define array to track progress
$hostsMissing=array();
$additionalMissing=array();
$ourstoryMissing=array();
$basicDeatilsMissing=array();
$eventsMissing=array();
$themeMissing=array();
$paymentMissing=array();

array_push($hostsMissing,array("path"=>"hosts"));
array_push($additionalMissing,array("path"=>"additional-details"));
array_push($ourstoryMissing,array("path"=>"our-story"));

array_push($basicDeatilsMissing,array("path"=>"basic-details"));
array_push($eventsMissing,array("path"=>"timeline"));
array_push($themeMissing,array("path"=>"theme"));
array_push($paymentMissing, array("path"=>"checkout"));


$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);
$hosts = json_decode($weddingData['hosts'], true);
$story = json_decode($weddingData['story'], true);
$timeline = [];
$timeline = json_decode($weddingData['timeline'], true);


if($weddingData['groomName']==''){
    array_push($basicDeatilsMissing,"Groom name");
}
if($weddingData['brideName']==''){
    array_push($basicDeatilsMissing,"Bride name");
}
if($weddingData['fromRole']==''){
    array_push($basicDeatilsMissing,"From role");
}
if($weddingData['lang']==''){
    array_push($basicDeatilsMissing,"Language");
}
if($weddingData['weddingName']==''){
    array_push($basicDeatilsMissing,"Wedding Name");
}

if($weddingData['template']==''){
    array_push($themeMissing, "Theme not selected!");
}

if($hosts['brideFather']['name']==''){
    array_push($hostsMissing,"Bride Father");
}
if($hosts['groomFather']['name']==''){
    array_push($hostsMissing,"Groom Father");
}
if($hosts['brideMother']['name']==''){
    array_push($hostsMissing,"Bride Mother");
}
if($hosts['groomMother']['name']==''){
    array_push($hostsMissing,"Groom Mother");
}
if($hosts['brideTagline']==''){
    array_push($hostsMissing,"Bride Tagline");
}
if($hosts['groomTagline']==''){
    array_push($hostsMissing,"Groom Tagline");
}


if($weddingData['groomQualifications']==''){
    array_push($additionalMissing,"Groom Qualifications");
}
if($weddingData['brideQualifications']==''){
    array_push($additionalMissing,"Bride Qualifications");
}
if($weddingData['groomBio']==''){
    array_push($additionalMissing,"Groom Bio");
}
if($weddingData['brideBio']==''){
    array_push($additionalMissing,"Bride Bio");
}
if($weddingData['music']==''){
    array_push($additionalMissing,"Music Track");
}
if($weddingData['youtube']==''){
    array_push($additionalMissing,"Youtube Live");
}
if($weddingData['accommodation']==''){
    array_push($additionalMissing,"Accommodation details");
}
if($weddingData['travel']==''){
    array_push($additionalMissing,"Travel details");
}


if($story['howWeMet']==''){
    array_push($ourstoryMissing,"How We Met");
}
if($story['whenWeMet']==''){
    array_push($ourstoryMissing,"When We Met");
}
if($story['engagement']==''){
    array_push($ourstoryMissing,"Engagement");
}
if($story['engagementYear']==''){
    array_push($ourstoryMissing,"Engagement Year");
}
if($story['memorableMoments']==''){
    array_push($ourstoryMissing,"Memorable Moments");
}


foreach ($timeline as $key => $value) {
    $eventArray = array(); // Initialize as an associative array
    foreach ($timeline[$key] as $name => $val) {
        if ($val == '' && ($name != 'endTime' && $name != 'event')) {
            // Initialize the array for the specific type if not already done
            if (!isset($eventArray[$timeline[$key]['type']]) ) {
                $eventArray[$timeline[$key]['type']] = array();
               
            }
            // Push the missing name under the specific type
            array_push($eventArray[$timeline[$key]['type']], $name);
        }
    }
    // Push the associative array to $eventsMissing
     $eventsMissing[$timeline[$key]['type']]=array();
    array_push($eventsMissing[$timeline[$key]['type']], $eventArray[$timeline[$key]['type']]);

}


$tracks=array("Basic Details"=>$basicDeatilsMissing,"Hosts"=>$hostsMissing,"Events"=>$eventsMissing,
    "Additional Details"=>$additionalMissing,"Our Story"=>$ourstoryMissing,"Theme"=>$themeMissing);

$completed=0;

foreach ($tracks as $key => $value) {

    if(count($value)==1){
        $completed++;
    }
}

// if other six tasks has been completed then only enable payment 
if($completed<6){
    array_push($paymentMissing,"Complete necessary tracks to initiate payment!");
}


$tracks["Payment"]=$paymentMissing;

$trackPercent=($completed/sizeof($tracks))*100;

?>

<head>

</head>
<!--Main Start-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">

<h1><?=$_REQUEST['id']?></h1>



<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h4>Track Progress</h4>
        </div>
        <div class="card-body">
            <div class="progress mb-3">
                <div class="progress-bar p-2 bg-primary" role="progressbar" style="<?php echo "width:".$trackPercent."%;"; ?>" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5">
                    <?php echo $completed."/".sizeof($tracks); ?> tasks completed
                </div>
            </div>



            <div class="accordion" id="progressAccordion">

                <?php 

                    foreach ($tracks as $key => $value) {
                ?>
                <!-- Accordion 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo explode(" ", $key)[0]; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo explode(" ", $key)[0]; ?>" aria-expanded="true" aria-controls="<?php echo explode(" ", $key)[0]; ?>">


                            <?php 

                                if(count($value)==1){
                                    echo '<span class="tick-icon green-tick mx-2">&#10004;</span> ';
                                }
                                else{
                                    echo '<span class="tick-icon red-tick mx-2">&#10008;</span>';
                                } 
                            ?>

                             <?php   echo $key; 
                             ?>

                        </button>
                    </h2>
                    <div id="<?php echo explode(" ", $key)[0]; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo explode(" ", $key)[0]; ?>" data-bs-parent="#progressAccordion">
                        <div class="accordion-body">
                           
                                <?php 
                                   if(count($value)==1){
                                        echo '<p class="text-success">Done</p>';
                                   }else{
                                    ?>
                                     <span>Missing: </span>
                                        <ol>
                                    <?php
                                         $counter = 0;
                                        if($key=='Events'){

                                            foreach ($value as $key1 => $value1) {
                                                if ($counter == 0) {
                                                    $counter++;
                                                    continue; // Skip the first iteration which contains path
                                                }

                                                echo ucwords($key1).":";
                                                ?>
                                                <ol>
                                                <?php
                                                foreach ($value1 as $key2 => $val2) {
                                                    
                                                    foreach ($val2 as $key3 => $value3) {
                                                        echo "<li class='text-danger'>".ucwords($value3)."</li>";
                                                        $counter++;
                                                    }
                                                    
                                                }

                                                echo "</ol><br>";
                                            }

                                        }else{
                                            
                                            foreach ($value as $key1 => $value1) {
                                                if ($counter == 0) {
                                                    $counter++;
                                                    continue; // Skip the first iteration which contains path
                                                }
                                                echo "<li class='text-danger'>".$value1."</li>";
                                                $counter++;
                                            }
                                        }
                                    ?>
                                        </ol>

                                    <?php 

                                        if($key=="Payment" && count($value)>1){
                                    ?>
                                        <a class="btn btn-sm btn-primary disabled" >Continue</a>
                                    <?php
                                        }else{
                                    ?>

                                    <a class="btn btn-sm btn-primary" href="<?php echo route('wedding/' . $_REQUEST['id'] . '/' . $_REQUEST['lang'] .'/'. $value[0]['path']) . queryString(); ?>">Continue</a>


                                <?php
                                        }
                                   }    
                                ?>
                        
                        </div>
                    </div>
                </div>

                 <?php     }  ?>
                

            </div>



        </div>
    </div>
</div>




</main>



<!--Main End-->

<?php require('views/partials/dashboard/scripts.php') ?>