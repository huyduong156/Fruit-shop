<?php

// use Spatie\Backtrace\File;
use Illuminate\Support\Facades\File;

function writeFileText($content = null, $path = null)
{
    $result = [];
    try {
        $location = '/uploads/filetext/other_txt';
        $name = $location . '/' . time() . '.txt';
        if (isset($path)) {
            $name = $path;
        }
        $filePath = public_path($name);
        // dd($filePath);
        File::put($filePath, $content);
        $result['status'] = true;
        $result['name'] = $name;
    } catch (\Exception $th) {
        $result['status'] = false;
        $result['name'] = '';
    }
    return $result;
}
function readFileText($url)
{
    $result = [];
    try {
        if (empty($url)) {
            $result['content'] = ''; // Sử dụng hàm "get" để đọc nội dung của file
            $result['status'] = false;
            return $result;
        }
        $filePath = public_path($url);
        if (File::exists($filePath)) { // Kiểm tra xem file có tồn tại hay không
            $result['content'] = File::get($filePath); // Sử dụng hàm "get" để đọc nội dung của file
            $result['status'] = true;
        } else {
            $result['content'] = 'Ko tìm thấy file'; // Sử dụng hàm "get" để đọc nội dung của file
            $result['status'] = false;
        }
    } catch (\Throwable $th) {
        $result['content'] =  'Xảy ra lỗi !!!!'; // Sử dụng hàm "get" để đọc nội dung của file
        $result['status'] = false;
    }
    return $result;
}
function deleteFileText($url)
{
    $result = [];
    $filePath = public_path($url);
    if (File::exists($filePath)) { // Kiểm tra xem file có tồn tại hay không
        File::delete($filePath); // Sử dụng hàm "delete" để xóa file
        $result['content'] = 'Xóa thành công'; // Sử dụng hàm "get" để đọc nội dung của file
        $result['status'] = true;
    } else {
        $result['content'] = 'File không tồn tại'; // Sử dụng hàm "get" để đọc nội dung của file
        $result['status'] = false;
    }

    return $result;
}







// ---------------------helper lọc ngôn từ tục tĩu------------------------------
function filterText($text)
{
    $filteredWords =  ['chó', 'cmm', 'ngu', 'súc vật', 'dm', 'đm', 'cc', 'cl', 'đỉ', 'clmm', 'mẹ', 'má'];
    // Sử dụng str_replace để thay thế từng từ cần lọc
    foreach ($filteredWords as $word) {
        $text = str_replace($word, '***', $text);
    }

    return $text;
}




function readDataText($path)
{
    try {
        $res = readFileText($path);
        if ($res['status']) {
            return json_decode($res['content'], true);
        } else {
            return null;
        }
    } catch (\Throwable $th) {
        return null;
    }
}
