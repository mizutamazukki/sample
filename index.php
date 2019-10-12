<?php

//スラッシュで区切られたurlを取得します
$analysis = explode('/', $_SERVER['QUERY_STRING']);
$call;
foreach ($analysis as $value) {
    if ($value !== "") {
        preg_match('/url=(.*)\&/', $value,$match);
        $call = str_replace('url=', '', $match[1]);
        break;
    }
}
// //modelをインクルードします
if (file_exists('./Models/'.$call.'.php')) {
    include('./Models/'.$call.'.php');
    //callを使用してインスタンス化するクラス名を作成し、使用する
    $className = "Models\\".$call;
    $class = new $className();
    $ret = $class->index($analysis);
    //配列キーが設定されている配列なら展開します
    if (!is_null($ret)) {
        if (is_array($ret)) {
            extract($ret);
        }
    }
}
// //viewをインクルードします
if (file_exists('./views/'.$call.'.php')) {
    include('./views/'.$call.'.php');
} else {
    include('./views/Error.php');
}
