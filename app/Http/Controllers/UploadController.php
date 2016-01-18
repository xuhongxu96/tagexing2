<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
	public function upload(Request $request)
	{
		$data = $request->input('photo');
		if ($data)
		{
			list($type, $data) = explode(';', $data);
			list (, $data) = explode(',', $data);
			$data = base64_decode($data);
			$meta = $request->input('meta');
			$extension = explode('/', $meta['type'])[1];
			$file = md5(microtime(true)).'.'.$extension;
			$crop = $request->input('crop');
			$src = imagecreatefromstring($data);
			if ($src = imagecrop($src, array(
				'x' => $crop['x'],
				'y' => $crop['y'],
				'width' => $crop['width'],
				'height' => $crop['height'],
			)))
			{
				switch ($extension)
				{
				case 'jpg':
				case 'jpeg':
					imagejpeg($src, './uploads/' . $file);
					break;
				case 'gif':
					imagegif($src, './uploads/' . $file);
					break;
				case 'png':
					imagepng($src, './uploads/' . $file);
					break;
				}
				return json_encode(['file' => $file, 'url' => "http://$_SERVER[HTTP_HOST]/uploads/$file"]);;
			}
		}
		return '上传失败';
	}
}
