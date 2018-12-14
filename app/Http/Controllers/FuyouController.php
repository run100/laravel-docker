<?php

namespace App\Http\Controllers;

use App\Lib\A2Xml;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FuyouController extends Controller
{
    const CONST_NO = '1265';
    //
    public function scanCode(Request $request)
    {
        // echo time();
        $req = "%3C%3Fxml+version%3D%221.0%22+encoding%3D%22GBK%22+standalone%3D%22yes%22%3F%3E%3Cxml%3E%3Ccurr_type%3ECNY%3C%2Fcurr_type%3E%3Cins_cd%3E08A9999999%3C%2Fins_cd%3E%3Cmchnt_cd%3E0002900F0370542%3C%2Fmchnt_cd%3E%3Cmchnt_order_no%3E1544774100%3C%2Fmchnt_order_no%3E%3Corder_amt%3E1%3C%2Forder_amt%3E%3Corder_type%3EWECHAT%3C%2Forder_type%3E%3Crandom_str%3E8LTI8MOT9XKWK9Y3M6KV5JLJ10TILBY3%3C%2Frandom_str%3E%3Creserved_addn_inf%3E%3C%2Freserved_addn_inf%3E%3Creserved_bank_type%3ECFT%3C%2Freserved_bank_type%3E%3Creserved_buyer_logon_id%3E%3C%2Freserved_buyer_logon_id%3E%3Creserved_channel_order_id%3E1544774100%3C%2Freserved_channel_order_id%3E%3Creserved_coupon_fee%3E0%3C%2Freserved_coupon_fee%3E%3Creserved_fund_bill_list%3E%3C%2Freserved_fund_bill_list%3E%3Creserved_fy_settle_dt%3E20181214%3C%2Freserved_fy_settle_dt%3E%3Creserved_fy_trace_no%3E910000048547%3C%2Freserved_fy_trace_no%3E%3Creserved_is_credit%3E0%3C%2Freserved_is_credit%3E%3Creserved_settlement_amt%3E1%3C%2Freserved_settlement_amt%3E%3Cresult_code%3E000000%3C%2Fresult_code%3E%3Cresult_msg%3ESUCCESS%3C%2Fresult_msg%3E%3Csettle_order_amt%3E1%3C%2Fsettle_order_amt%3E%3Csign%3EI2Ps10fGy6ldpa2nj%2Bas5FqsaIoSvpHJA5ursYovQH8n5v4SqHiLz8OmpMhf1Qqjg4ctxQqorxe9fRpbG7ccmLVhYndIVNm9T5dS%2F5UCfKF8by568JLQgslI9U7sLjfWvay6LyelIubMtjyjZmRu9FpNbFae4wCSuUFC3KnSs%2Bk%3D%3C%2Fsign%3E%3Cterm_id%3E%3C%2Fterm_id%3E%3Ctransaction_id%3E4200000227201812141670952612%3C%2Ftransaction_id%3E%3Ctxn_fin_ts%3E20181214155924%3C%2Ftxn_fin_ts%3E%3Cuser_id%3EoUpF8uA4nHbRAOZ65ws5kftzK5fI%3C%2Fuser_id%3E%3C%2Fxml%3E";

        $arr = simplexml_load_string(urldecode($req));
        dd($arr);
        return Response::HTTP_FOUND;
    }

    public function order2()
    {
        $xml = new A2Xml();

        $data = [];
        $data['ins_cd'] = "08A9999999";
        $data['mchnt_cd'] = "0002900F0370542";
        $data['goods_des'] = "描述";
        $data['order_amt'] = "1";
        $data['notify_url'] = "http://requestbin.fullcontact.com/yp0k7vyp";
        $data['addn_inf'] = "";
        $data['curr_type'] = "CNY";
        $data['term_id'] = "88888888";
        $data['goods_detail'] = "";
        $data['goods_tag'] = "";
        $data['version'] = "1";
        $data['random_str'] = time();
        $data['mchnt_order_no'] = self::CONST_NO.time();
        $data['term_ip'] = "117.29.110.187";
        $data['txn_begin_ts'] = date('YmdHis', time());
        $data['product_id'] = "test";
        $data['limit_pay'] = 'no_credit';
        $data['trade_type'] = 'JSAPI';
        $data['openid'] = "oMbrt0LuH6uRfAvDldgFiJDD07b4";
        $data['sub_openid'] = "";
        $data['sub_appid'] = "";


        ksort($data);
        $sign = urldecode(http_build_query($data));
        // dd($sign);

        //RSAwithMD5+base64加密后得到的sign
        $data['sign'] = $xml->sign($sign);

        //完整的xml格式
        $a = "<?xml version=\"1.0\" encoding=\"GBK\" standalone=\"yes\"?><xml>" . $xml->toXml($data) . "</xml>";

        //经过两次urlencode()之后的字符串
        $b = "req=" . urlencode(urlencode($a));

        $url = 'https://fundwx.fuiou.com/wxPreCreate';

        //返回的xml字符串
        $resultXml = URLdecode($xml->SendDataByCurl($url, $b));
        // dd($resultXml);

        //将xml转化成对象
        $ob = simplexml_load_string($resultXml);

        //输出结果
        dd($ob);

        return Response::HTTP_FOUND;
    }

    public function order1()
    {
        $xml = new A2Xml();
        $data = [];
        $data['ins_cd'] = "08A9999999";
        $data['mchnt_cd'] = "0002900F0370542";
        $data['goods_des'] = "描述";
        $data['order_type'] = "WECHAT";
        $data['order_amt'] = "1";
        $data['notify_url'] = "http://requestbin.fullcontact.com/yp0k7vyp";
        $data['addn_inf'] = "";
        $data['curr_type'] = "CNY";
        $data['term_id'] = "88888888";
        $data['goods_detail'] = "";
        $data['goods_tag'] = "";
        $data['version'] = "1";
        $data['random_str'] = time();
        $data['mchnt_order_no'] = self::CONST_NO.time();
        $data['term_ip'] = "117.29.110.187";
        $data['txn_begin_ts'] = date('YmdHis', time());
        // $data['trade_type'] = "LETPAY";

        //拼装过的需要签名的字符串串
        // $sign = "addn_inf=" . $data['addn_inf'] . "&curr_type=" . $data['curr_type'] . "&goods_des=" . $data['goods_des'] . "&goods_detail=" . $data['goods_detail'] . "&goods_tag=" . $data['goods_tag'] . "&ins_cd=" . $data['ins_cd'] . "&mchnt_cd=" . $data['mchnt_cd'] . "&mchnt_order_no=" . $data['mchnt_order_no'] . "&notify_url=" . $data['notify_url'] . "&order_amt=" . $data['order_amt'] . "&order_type=" . $data['order_type'] . "&random_str=" . $data['random_str'] . "&term_id=" . $data['term_id'] . "&term_ip=" . $data['term_ip'] . "&txn_begin_ts=" . $data['txn_begin_ts'] . "&version=" . $data['version'];

        ksort($data);
        $sign = urldecode(http_build_query($data));
        //dd($sign);

        //RSAwithMD5+base64加密后得到的sign
        $data['sign'] = $xml->sign($sign);



        //完整的xml格式
        $a = "<?xml version=\"1.0\" encoding=\"GBK\" standalone=\"yes\"?><xml>" . $xml->toXml($data) . "</xml>";

        //经过两次urlencode()之后的字符串
        $b = "req=" . urlencode(urlencode($a));

        //通过curl的post方式发送接口请求
        $url = "https://fundwx.fuiou.com/preCreate";

        //返回的xml字符串
        $resultXml = URLdecode($xml->SendDataByCurl($url, $b));

        //将xml转化成对象
        $ob = simplexml_load_string($resultXml);

        //输出结果
        dd($ob);
        return Response::HTTP_MOVED_PERMANENTLY;
    }
}
