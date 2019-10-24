<?php

namespace App\Http\Report;


class Utils
{
    public static $fields_map = [
        'pv',
        'uv',
        'visit',
        'visittime',
        'bounce_rate',
        'n_uv',
        'item_clk_pv',
        'item_show_pv',
        'item_clk_uv',
        'item_ctr',
        'item_count',
        'item_show_uv',
    ];

    /**
     * 根据类型获取Y轴单位
     * @param pv uv 等
     * @return 单位
     */
    public static function getYaxisName($field)
    {
        switch ($field) {
            // 今日分时数据
            case 'pv':
                $name = '(浏览量)';
                break;
            case 'uv':
                $name = '(访客数)';
                break;
            case 'visit':
                $name = '(访问次数)';
                break;
            case 'visittime':
                $name = '(秒)';
                break;
            case 'bounce_rate':
                $name = '(跳出率)';
                break;
            case 'n_uv':
                $name = '(用户数)';
                break;
            case 'item_clk_pv':
                $name = '(点击次数)';
                break;
            case 'item_show_pv':
                $name = '(展现次数)';
                break;
            case  'item_clk_uv':
                $name = '(点击用户数)';
                break;
            case 'item_ctr':
                $name = '(点击率:%)';
                break;
            case 'item_count':
                $name = '(推荐内容数)';
                break;
            case 'item_show_uv':
                $name = '(展现用户数)';
                break;
            case 'calltimes':
                $name = '(调用量)';
                break;
            default:
                $name = '';
                break;
        }
        return $name;
    }

    /**
     * 根据类型获取Y轴单位
     * @param $field
     * @return $name
     */
    public static function getAppYaxisName($field)
    {
        switch ($field) {
            // 今日分时数据
            case 'uv':
                $name = '活跃用户数';
                break;
            case 'n_uv':
            case 'new_user':
                $name = '新增用户';
                break;
            case 'visit':
                $name = '启动次数';
                break;
            case 'activity_user':
                $name = '月活跃用户';
                break;
            case  'pv':
                $name = '浏览量';
                break;
            case  'activity_rate':
                $name = '活跃率:%';
                break;
            case  'visittime':
                $name = '平均访问时长';
                break;
            case  'n_user':
                $name = '新增用户数';
                break;
            case  'hour':
                $name = '(时)';
                break;
            case  'day':
                $name = '(天)';
                break;
            default:
                $name = '';
                break;
                break;
        }
        return $name;
    }

    /**
     * 根据类型获取Y轴单位
     * @param pv uv 等
     * @return $name
     */
    public static function getXaxisName($type)
    {
        switch ($type) {
            // 今日分时数据
            case 'minute':
                $name = '(分)';
                break;
            // 今日分时数据
            case 'hour':
                $name = '(时)';
                break;
            case 'day':
                $name = '(天)';
                break;
            // 最近半小时数据
            case 'date':
                $name = '(日期)';
                break;
            case 'area':
                $name = '(省份)';
                break;
            case 'prov':
                $name = '(省份)';
                break;
            case 'china':
                $name = '(省份)';
                break;
            case 'world':
                $name = '(国家)';
                break;
            case 'country':
                $name = '(国家)';
                break;
            case 'operator':
                $name = '(运营商)';
                break;
            case 'version':
                $name = '(版本)';
                break;
            case 'device':
                $name = '(设备)';
                break;
            case 'network':
                $name = '(网络)';
                break;
            case 'channel':
                $name = '(渠道)';
                break;
            case 'column':
                $name = '(频道)';
                break;
            case 'browser':
                $name = '(浏览器)';
                break;
            case 'source':
                $name = '(来源)';
                break;
            case 'search_e':
                $name = '(搜素引擎)';
                break;
            case 'col_media':
                $name = '(合作媒体)';
                break;
            case 'label':
                $name = '(标签)';
                break;
            case 'app':
                $name = '应用';
                break;
            case 'period':
                $name = '时段';
                break;
            default:
                $name = '';
                break;
        }
        return $name;
    }

    /**
     * 生成一段时间的默认数据
     * @param int $intStartDay 20160421
     * @param int $intEndDay 20160421
     */
    public static function getTimeRange($intStartDay, $intEndDay, $format = 'Ymd')
    {
        $startTimeStamp = strtotime($intStartDay);
        $endTimeStamp = strtotime($intEndDay) - 86400;
        $curTime = $startTimeStamp;
        $timeRange = array();
        for ($curTime; $curTime <= $endTimeStamp; $curTime += 86400) {
            $curDate = date($format, $curTime);
            $timeRange[$curDate] = 0;
        }
        return $timeRange;
    }

    /**
     * 生成小时时段的默认数据（00:00-24:00）
     */
    public static function getHourTimeRange()
    {
        $timeRange = array('00:00' => 0, '01:00' => 0, '02:00' => 0,
            '03:00' => 0, '04:00' => 0, '05:00' => 0,
            '06:00' => 0, '07:00' => 0, '08:00' => 0,
            '09:00' => 0, '10:00' => 0, '11:00' => 0,
            '12:00' => 0, '13:00' => 0, '14:00' => 0,
            '15:00' => 0, '16:00' => 0, '17:00' => 0,
            '18:00' => 0, '19:00' => 0, '20:00' => 0,
            '21:00' => 0, '22:00' => 0, '23:00' => 0);
        return $timeRange;
    }

    /**
     * 获得小时的默认数据
     * @return multitype:number
     */
    public static function getHourRange()
    {
        $timeRange = array('0' => 0, '1' => 0, '2' => 0,
            '3' => 0, '4' => 0, '5' => 0,
            '6' => 0, '7' => 0, '8' => 0,
            '9' => 0, '10' => 0, '11' => 0,
            '12' => 0, '13' => 0, '14' => 0,
            '15' => 0, '16' => 0, '17' => 0,
            '18' => 0, '19' => 0, '20' => 0,
            '21' => 0, '22' => 0, '23' => 0);
        return $timeRange;
    }

    /**
     * 格式化小时数据
     * @param unknown $data
     * @return multitype:unknown
     */
    public static function formatHourData($data)
    {

        $hourData = array();
        foreach ($data as $key => $val) {
            if ($key < 10) {
                $key = '0' . $key . ':00';
            } else {
                $key .= ':00';
            }
            $hourData[$key] = $val;
        }
        return $hourData;
    }

    /**
     * 格式化分钟数据
     * @param array $data
     */
    public static function formatMinuteData($data)
    {
        $mData = array();
        foreach ($data as $key => $val) {
            $key = substr($key, 8, 2) . ':' . substr($key, 10, 2);
            $mData[$key] = $val;
        }
        return $mData;
    }

    /**
     * 大于100000的数目改写为 n万
     * @param $data
     * @return mixed
     */
    public static function getUnitData($data)
    {
        $rs = array('num' => intval($data), 'unit' => '');
        //TODO:考虑多语言
        if (intval($data) > 10000) {
            $rs['num'] = round(($rs['num'] / 10000), 2);
            $rs['unit'] = '万';
        }
        return $rs;
    }


    public static function getWorldMapper()
    {

        return collect(array_flip(json_decode(config('map.json'), true)));
    }

    public static function DeviceVersionMap($dev = null)
    {
        if ($dev !== null) {
            return collect(config('deviceMap'))->get($dev, $dev);
        }
        return collect(config('deviceMap'));
    }

    public static function getHourRangeNew($days, $hours)
    {
        $default = [];
        foreach ($days as $day => $k1) {
            foreach ($hours as $hour => $k2) {
                $time = static::formatHour($day, $hour);
                $default[$time] = $k1;
            }
        }
        return $default;
    }

    public static function formatHour($day, $hour)
    {
        $time = '';
        if (strlen($hour) < 2) {
            $time = $day . ' ' . '0' . $hour;
        } else {
            $time = $day . ' ' . $hour;
        }
        return $time;
    }

    public static function formatBarRes($timeRange, $data, $org)
    {
        $res = [];
        $xAxis = [];
        $series = [];
        $xAxis['data'][] = array_keys($timeRange);
        foreach ($timeRange as $key => $value) {
            if (isset($data[$key])) {
                $series['data'][] = floor($data[$key][$org] * 100) / 100;
            } else {
                $series['data'][] = 0;
            }

        }
        $res['xAxis'] = $xAxis;
        $res['series'][] = $series;
        return $res;
    }

}
