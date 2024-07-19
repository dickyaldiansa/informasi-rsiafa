<?php 

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use carbon\Carbon;
use DateTime;

class Helpers
{
	public static function encryptId($string)
	{
		$id = Crypt::encryptString($string);
		return $id;
	}

	public static function decryptId($string)
	{
		$id = Crypt::decryptString($string);
		return $id;
	}

	public static function bpjsHeaders()
	{
		date_default_timezone_set('UTC');
		$tStamp    	= strval(time()-strtotime('1970-01-01 00:00:00'));
		$consId    	= env('BPJS_CONSID');
		$secretKey 	= env('BPJS_SECRETKEY');
		$userKey   	= env('BPJS_USERKEY');
		$signature 	= base64_encode(hash_hmac('sha256', $consId."&".$tStamp, $secretKey, true));
		$headers = array(
			"x-cons-id:".$consId,
			"x-timestamp:".$tStamp,
			"x-signature:".$signature,
			"user_key:".$userKey,
		);
		return $headers;
	}

	public static function bpjsDecrypt()
	{
		date_default_timezone_set('UTC');
		$tStamp    		= strval(time()-strtotime('1970-01-01 00:00:00'));
		$key 			= env('BPJS_CONSID').env('BPJS_SECRETKEY').$tStamp;
		$encrypt_method = 'AES-256-CBC';
		$key_hash 		= hex2bin(hash('sha256', $key));
		$iv 			= substr(hex2bin(hash('sha256', $key)), 0, 16);
		$output 		= openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
		return $output;
	}

	public static function decompress($string)
	{
		return \LZCompressor\LZString::decompressFromEncodedURIComponent($string);
	}

	public static function wsbpjsGet($endpoint)
	{
		$url = env('BPJS_ANTREANS').$endpoint;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, bpjsHeaders());
		$result = json_decode(curl_exec($ch), true);
		if (curl_errno($ch)) {
			echo curl_error($ch);
			exit();
		} 
		curl_close($ch);
		return $result;
	}

	public static function wsbpjsPost($endpoint, $dataJson)
	{
		$url = env('BPJS_ANTREANS').$endpoint;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, bpjsHeaders());
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
		$result = json_decode(curl_exec($ch), true);
		if (curl_errno($ch)) {
			echo curl_error($ch);
			exit();
		} 
		curl_close($ch);
		return $result;
	}

	public static function bulanromawi()
	{
		$bulan = date('m');
		$convert = [
			'01' => 'I',
			'02' => 'II',
			'03' => 'III',
			'04' => 'IV',
			'05' => 'V',
			'06' => 'VI',
			'07' => 'VII',
			'08' => 'VIII',
			'09' => 'IX',
			'10' => 'X',
			'11' => 'XI',
			'12' => 'XII',
		];
		return $convert[$bulan];
	}

	public static function age(DateTime $born, DateTime $reference = null)
	{
		$reference = $reference ?: new DateTime;
		if ($born > $reference) 
			throw new \InvalidArgumentException('Provided birthday cannot be in future compared to the reference date.');

		$diff = $reference->diff($born);
    // Not very readable, but all it does is joining age
    // parts using either ',' or 'and' appropriately
		$age = ($d = $diff->d) ? ', '.$d.' '.str_plural('day', $d) : '';
		$age = ($m = $diff->m) ? ($age ? ', ' : ', ').$m.' '.str_plural('month', $m).$age : $age;
		$age = ($y = $diff->y) ? $y.' '.str_plural('year', $y).$age  : $age;
    // trim redundant ',' or 'and' parts
		return ($s = trim(trim($age, ', '), ', ')) ? $s.'' : '';
	}

	public static function group_arr($array, $key)
	{
		$return = array();
		foreach($array as $val) {
			$return[$val[$key]][] = $val;
		}
		return $return;
	}

	public static function convert_hari($day)
	{
		switch ($day) {
			case "Sun":
			return "MINGGU";
			break;
			case "Mon":
			return "SENIN";
			break;
			case "Tue":
			return "SELASA";
			break;
			case "Wed":
			return "RABU";
			break;
			case "Thu":
			return "KAMIS";
			break;
			case "Fri":
			return "JUMAT";
			break;
			case "Sat":
			return "SABTU";
			break;
		}
	}

	public static function waktu($waktu)
	{
		if(($waktu>0) and ($waktu<60)){
			$lama=number_format($waktu,2)." detik";
			return $lama;
		} if(($waktu>60) and ($waktu<3600)){
			$detik=fmod($waktu,60);
			$menit=$waktu-$detik;
			$menit=$menit/60;
			$lama=$menit." Menit ".number_format($detik,2)." detik";
			return $lama;
		} elseif($waktu >3600){
			$detik=fmod($waktu,60);
			$tempmenit=($waktu-$detik)/60;
			$menit=fmod($tempmenit,60);
			$jam=($tempmenit-$menit)/60;    
			$lama=$jam." Jam ".$menit." Menit ".number_format($detik,2)." detik";
			return $lama;
		}
	}

}

?>