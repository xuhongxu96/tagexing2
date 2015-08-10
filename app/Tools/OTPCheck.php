<?php 
namespace App\Tools;
use Cache;
class OTPCheck {

	const OTP_SUCCESS = 0x00000000;
	const OTP_ERR_INVALID_PARAMETER = 0x00000003;
	const OTP_ERR_CHECK_PWD = 0x00000002;
	const OTP_ERR_SYN_PWD = 0x00000003;
	const OTP_ERR_REPLAY = 0x00000004;

	public static function check($authkey, $code)
	{
		if (WX_DEBUG == 2) return true;
		if (function_exists('et_checkpwdz201'))
		{
			$t = time();
			$t0 = 0;
			$x = 60;
			$drift = intval(Cache::get($authkey, 0));
			$authwnd = 10;  //认证窗口
			$lastsucc = 0;
			$otp = $code;
			$otplen = 6;    //otp长度，6位或8位
			$currsucc = 0;
			$currdft = 0;
			$ret = OTP_ERR_CHECK_PWD;
			$ret = et_checkpwdz201($authkey, $t, $t0, $x,
				$drift, $authwnd, $lastsucc,
				$otp, $otplen,
				$currsucc, $currdft);

			if ($ret == OTP_SUCCESS) {
				Cache::forever($authkey, $currdft);
				return true;
			}
		}
		return false;
	}

}
