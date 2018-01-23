<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];


use think\Route;

Route::rule('dz','index/index/dz');
Route::rule('kc','index/index/kc');
Route::rule('fh','index/index/fh');

Route::rule('kca','index/index/kca');
Route::rule('kcb','index/index/kcb');

//// Route::rule('article/:id','index/index/article');
//// Route::rule('article/[:id]','index/index/article',['ext'=>'html']);
// Route::get('article-<id>','index/index/article',['ext'=>'html']);