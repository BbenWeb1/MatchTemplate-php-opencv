
<?php
function getPoint($cols,$key,$value){
    $y = intdiv($key,$cols);
    $x =fmod($key,$cols);
    return ['x'=>$x,'y'=>$y,'value'=>$value];
}
function maxLoc($obj,$theard=null){

    if(is_object($obj)){
        if($theard==null){
            $theard = 0.98;
        }
        //arsort($obj->data());
        $result=[];
        foreach ($obj->data() as $key => $value) {
            if($value>$theard){
                array_push($result,getPoint($obj->cols,$key,$value));
            }
        }
        return $result;
    }
    return false;

}

function minMaxLoc($src){
    if(!is_object($src)){
        return false;
    }
    $minval = min($src->data());
    $maxval = max($src->data());

    $keymin = array_search($minval,$src->data());
    $keymax = array_search($maxval,$src->data());
    
    $minloc=[fmod($keymin,$src->cols),intdiv($keymin,$src->cols)];
    $maxloc=[fmod($keymax,$src->cols),intdiv($keymax,$src->cols)];

    return ['minval'=>$minval,'maxval'=>$maxval,'minloc'=>$minloc,'maxloc'=>$maxloc];

}