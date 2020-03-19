<?php
require '../db/init.php';
$id = 0;
$offset = Sanitize($_POST['offset']);
$limit  = Sanitize($_POST['limit']);
if ($id == 2) {
    $data = Sanitize($_POST['data']);
    $data = explode(',', $data);
    $size = count($data);
    //loc ids 
    if ($size > 0) {
        for ($i = 0; $i < $size; $i++) {
            $locid = substr($data[$i], 13);
            
            $checkpre = mysqli_query($GLOBALS["conn2"], "SELECT hitId FROM hitlist WHERE localityId = '$locid'");
            $numpre   = mysqli_num_rows($checkpre);
            if ($numpre > 0) {
                while ($rows = mysqli_fetch_assoc($checkpre)) {
                    $hitId = $rows['hitId'];
                    print_hit($hitId);
                }
            }
        }
    }
} else {
    $checkpre = mysqli_query($GLOBALS["conn2"], "SELECT hitId FROM hitlist WHERE (freeze=0 AND detail IS not NULL) ORDER BY hitId LIMIT $limit OFFSET $offset");
    $numpre   = mysqli_num_rows($checkpre);
    if ($numpre > 0) {
        $more = $numpre;
        while ($rows = mysqli_fetch_assoc($checkpre)) {
            $hitId = $rows['hitId'];
            print_blog($hitId);
            $more--;
        }
        
        $prev = 0;
        if ($its >= 8) {
            $prev = $its - 8;
        }
        if ($more == 0 && $its > 0) {
            
            echo '  
    <div id="bottom-line">
    <button id="bottom-line-more" onclick="loadMore(' . $prev . ',\'null\',1);">Prev</button> <button id="bottom-line-more" onclick="loadMore(' . $hitId . ',\'null\',1);">More</button>
    </div>';
            
        } else {
            echo ' 
    <div id="bottom-line">
    <button id="bottom-line-more" onclick="loadMore(' . $hitId . ',\'null\',1);">More</button>
    </div>';
        }
    } else {
        echo '<br><p style="margin-bottom:170px;
    font-size: 16px;margin-top:170px; padding:15px;color:#333">Could not Find More Results<p> <br><br><br>';
        
        echo ' 
    <div id="bottom-line">
    <button id="bottom-line-more" onclick="loadMore(0,\'null\',1);">Back</button>
    </div>';
    }
}


?>