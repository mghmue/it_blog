<?php define('BASE_URL', '/IT_BLOG/backend'); 



    //path အပေါ်ကဟာဘဲသုံးသုံး // အောက်ကဟာ URL အပေါ်ကဘဲသုံးသုံး


    // အောက်ကဟာ URL အပေါ်ကဘဲသုံးသုံး
    //<?php=route('index.php');? >

function route($file) {
    return BASE_URL . '/' . $file;
}
?>