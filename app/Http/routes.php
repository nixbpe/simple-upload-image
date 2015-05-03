<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/image.download', function() use ($app){

    try {
        $imagePath = $app->basePath('public/image.png');
        if(file_exists($imagePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=image.png');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($imagePath));
            readfile($imagePath);
            exit;
        }
    } catch (Exception $ex) {

    }

});

$app->get('/images', function() use ($app) {

    $image = false;

    try {
        file_get_contents( $app->basePath('public/image.png') );
        $image = true;
    } catch (Exception $ex) {

    }

    return view('images', [ 'image' => $image ]);
});

$app->post('/images',function(Request $request) use ($app) {

    $image = $request->file('image');

    if( $image->isValid() && $image->getMimeType() == 'image/png' ) {
        $image->move( $app->basePath('public/'), 'image.png' );
    }

    return redirect('/images');

});

