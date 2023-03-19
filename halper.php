
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