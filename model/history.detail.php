<?php if(!defined('In_System')) exit("Access Denied");


Class DetailHistory{

    public function historyDetail($type, $serviceToken){
        global $mysqli;
        echo "<script type=\"text/javascript\">alert('$type, $serviceToken');</script>";
        $user_id =  $_COOKIE['uid'];
        if($serviceToken == ""){
            echo "<script type=\"text/javascript\">alert('您选择的详细信息不存在! ');window.history.back();</script>"; 
        }
        if($type == "采购服务"){
            $detail_query="SELECT * FROM purchase_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0){
                $detail_result = $detail_retrieve->fetch_assoc();
                if($detail_result['origin_address'] == 4){
                    $address = $detail_result['option_address'];
                }else{
                    $address = $detail_result['origin_address'];
                }
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>公寓类型</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>地址</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>土豆</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>番茄</td>
                            <td>%d</td>
                        </tr>
                            <tr>
                            <td>大米</td>
                            <td>%d</td>
                        </tr>
                    </table>
                ", $detail_result['property'], $address, $detail_result['potato'], $detail_result['tomato'], $detail_result['rice'] );
            }
        }elseif($type == "订餐服务"){
            $detail_query="SELECT * FROM food_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0){
                $detail_result = $detail_retrieve->fetch_assoc();
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>月子餐</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>代产餐</td>
                            <td>%d</td>
                        </tr>
                    </table>
                ", $detail_result['time'] . " " .$detail_result['dateToDeliver'], $detail_result['service1'], $detail_result['service2'] );
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "医疗接送"){
            $detail_query="SELECT * FROM medical_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>医疗服务</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $detail_result['medicalServiceType'], $detail_result['additional']);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "住房维修"){
            $detail_query="SELECT * FROM repair_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                $services="";
                if ($detail_result['water']  == 1){
                    $services .= " 水, ";
                }
                if($detail_result['gas']  == 1){
                    $services .= " 煤气, ";
                }
                if($detail_result['electric']  == 1){
                    $services .= " 电, ";
                }
                if($detail_result['other']  == 1){
                    $services .= " 其他 ";
                }
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>服务事项</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $services, $detail_result['additionalNote']);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "孕产服务"){
            $detail_query="SELECT * FROM housekeeping_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                $services="";
                if ($detail_result['accompany']  == 1){
                    $services .= " 陪产, ";
                }
                if($detail_result['lactagogue']  == 1){
                    $services .= " 催乳, ";
                }
                if($detail_result['maid']  == 1){
                    $services .= " 月嫂, ";
                }
                if($detail_result['placenta']  == 1){
                    $services .= " 胎盘, ";
                }
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>服务事项</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $services, $detail_result['additionalNote']);
            }else{
                echo "您要的信息不存在！";
            }
        }
    }
}

?>