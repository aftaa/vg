<?php

namespace common\vg\helpers;

class ImportHelper
{
    /**
     * @param string $url
     * @return int|null
     */
    public static function getFileSize(string $url): ?int
    {
        @$fp = fopen($url, "r");
        if (!$fp) {
            return null;
        }
        $inf = stream_get_meta_data($fp);
        fclose($fp);
        foreach ($inf["wrapper_data"] as $v) {
            if (stristr($v, "content-length")) {
                $v = explode(":", $v);
                return trim($v[1]);
            }
        }
        return null;
    }
}
