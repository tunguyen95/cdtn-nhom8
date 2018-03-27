<?php 
    function sanitizeTitle($string) {
   //php composer.phar dump-autoload
        if(!$string) return false;
        $utf8 = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd'=>'đ|Đ',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                );
        foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
        $string = utf8Url($string);
        return $string;
    }
 
    function utf8Url($string){        
        $string = strtolower($string);
        $string = str_replace( "ß", "ss", $string);
        $string = str_replace( "%", "", $string);
        $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
        $string = str_replace(array('%20', ' '), '-', $string);
        $string = str_replace("----","-",$string);
        $string = str_replace("---","-",$string);
        $string = str_replace("--","-",$string);
        return $string;
    } 


    function showCategories($categories, $parent_id = 0, $char = '', $select = 0) {
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id) {
                if ($select == $item['id']) {
                    echo '<option selected="selected" value="'.$item['id'].'">';
                        echo $char ." ". $item['name']." ".$char;
                    echo '</option>';
                } else {
                    echo '<option value="'.$item['id'].'">';
                        echo $char ." ". $item['name']." ".$char;
                    echo '</option>';
                }
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item['id'], $char.'--', $select);
            }
        }
    }
    function showCategoriesUpdate($categories, $parent_id = 0, $char = '', $select = 0, $idSelect) {
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id && $idSelect != $item['id']) {
                if ($select == $item['id']) {
                    echo '<option selected="selected " value="'.$item['id'].'">';
                        echo $char ." ". $item['name']." ".$char;
                    echo '</option>';
                } else {
                    echo '<option value="'.$item['id'].'">';
                        echo $char." ".$item['name']." ".$char;
                    echo '</option>';
                }
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategoriesUpdate($categories, $item['id'], $char.'--', $select, $idSelect);
            }
        }
    }
 ?>