<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/planet/{course}', 'HomeController@planets')->name('home.planets');
Route::get('/descriptions/{planet}', 'HomeController@descriptions')->name('home.planets.descriptions');
Route::get('sub-planet/descriptions/{sub_planet}', 'HomeController@subdescriptions')->name('home.planets.sub-descriptions');
Route::get('/sub-planets/{planet}', 'HomeController@subplanets')->name('home.planets.sub-planets');

Route::get('/content_add/{planet}/{edit?}', 'HomeController@content_add')->name('home.planets.contentAdd');
Route::post('/content_add/{planet}', 'HomeController@content_add_save')->name('home.planets.contentAddSave');
Route::post('/content_update/{planet}', 'HomeController@content_update')->name('home.planets.contentUpdate');
Route::get('/content_delete/{planet_content}', 'HomeController@content_delete')->name('home.planets.contentDelete');


Route::get('/sub_content_add/{sub_planet}/{edit?}', 'HomeController@sub_content_add')->name('home.planets.subContentAdd');
Route::post('/sub_content_add/{sub_planet}', 'HomeController@sub_content_add_save')->name('home.planets.subContentAddSave');
Route::post('/sub_content_update/{sub_planet}', 'HomeController@sub_content_update')->name('home.planets.subContentUpdate');
Route::get('/sub_content_delete/{sub_planet_content}', 'HomeController@sub_content_delete')->name('home.planets.subContentDelete');

Route::get('/export/{course}', 'HomeController@export')->name('home.export');

Route::get("certificate/{type}/{name}/{id}", function ($type, $name, $id) {

    $img = Image::make("fonts/$type.png");

    if ($type == 1) {
        $img->text(ucwords($name), 1150, 1100, function ($font) {
            $font->file('fonts/GreatVibes-Regular.ttf');
            // $font->file(base_path('public/fonts/greatvibes.ttf'));
            $font->size(170);
//        $font->color('#fdf6e3');
//        $font->align('center');
//        $font->valign('top');
//        $font->angle(45);
        });
    } else if ($type == 2) {
        $img->text(ucwords($name), 1050, 1170, function ($font) {
            $font->file('fonts/greatvibes.ttf');
            $font->size(130);
//        $font->color('#fdf6e3');
//        $font->align('center');
//        $font->valign('top');
//        $font->angle(45);
        });
    } else if ($type == 3) {
        $img->text(ucwords($name), 820, 770, function ($font) {
            $font->file('fonts/greatvibes.ttf');
            // $font->file(base_path('public/fonts/greatvibes.ttf'));
            $font->size(130);
//        $font->color('#fdf6e3');
//        $font->align('center');
//        $font->valign('top');
//        $font->angle(45);
        });
    }

    if (file_exists(public_path("/certs/") . "$type-$id.png")) {
        unlink(public_path("/certs/") . "$type-$id.png");
    }

    $img->save('certs/' . "$type-$id.png");
    return response()->json(["cert" => "https://courses.programming-hero.com/certs/$type-$id.png"]);
});

Route::get('quiz/{unit_id}/{user_id}/{user_name}/{reset?}', function ($unit_id, $user_id, $user_name, $reset = false) {
    //get unit
    $unit = \App\Unit::find($unit_id);
    $marks = $unit->marks()->where('user_id', $user_id)->get();

    if ($marks->count()) {
        $marks = $marks->first();
        return view('quiz.result', compact('unit', 'marks', 'reset', 'user_name'));
    }

    return view('quiz.index', compact('unit'));
});

Route::get('reset-quiz/{unit_id}/{user_id}', function ($unit_id, $user_id) {
    //get unit
    $unit = \App\Unit::find($unit_id);
    $marks = $unit->marks()->where('user_id', $user_id)->get();

    if ($marks->count()) {
        $marks = $marks->first();
        $marks->delete();
    }

    return redirect()->back();
})->name('quiz.reset');

Route::post('quiz/{unit_id}/{user_id}/{user_name}/{reset?}', function (Request $request, $unit_id, $user_id, $user_name, $reset = false) {
    //get unit id
    $unit = \App\Unit::find($unit_id);

    $total = $unit->questions->count();

    $questions = $request->except('_token');

    $correct = 0;

    foreach ($questions as $key => $value) {
        if (is_array($value)) {
            $question = \App\Question::find(intval($key));

            foreach ($value as $key => $val) {
                $value[$key] = trim($val);
            }

            if (in_array($question->answer, $value)) {
//                echo 'correct ans ';
                $correct++;
            } else if (strpos($question->answer, "|") !== false) {
                //check multiple answers
                $answers = explode("|", $question->answer);

                foreach ($value as $key => $val) {
                    if (in_array($val, $answers)) {
                        $correct++;
                        break;
                    };
                }

            } else {
//                echo "ca $question->answer ";
            }
//            echo $key . ' ' . $value[0] . '<br>';
        } else {
            $question = \App\Question::find(intval($key));

            if ($question->answer == $value) {
//                echo 'correct ans ';
                $correct++;
            } else {
//                echo "ca $question->answer ";
            }
//            echo $key . ' ' . $value . '<br>';
        }
    }

    $marks = new \App\Marks;
    $marks->user_id = $user_id;
    $marks->marks = $correct * 1;
    $marks->correct = $correct;
    $marks->wrong = $total - $correct;
    $marks->unit_id = $unit->id;
    $marks->save();

    return view('quiz.result', compact('unit', 'marks', 'reset', 'user_name'));
})->name('quiz.post');

Route::get('/generate-post', function () {
    return view('generate.post');
});

Route::post('/generate-post', function (Request $request) {
    if ($request->has('pic')) {
        $img = Image::make('post/template.png');

        //remove image background
        $image = $request->file('pic');
        $fileName = time() . '.' . $image->extension();
        $image->move(public_path("/post/"), $fileName);

        $client = new GuzzleHttp\Client();
        $res = $client->post('https://api.remove.bg/v1.0/removebg', [
            'multipart' => [
                [
                    'name' => 'image_file',
                    'contents' => fopen(public_path("/post/") . $fileName, 'r')
                ],
                [
                    'name' => 'size',
                    'contents' => 'auto'
                ]
            ],
            'headers' => [
                'X-Api-Key' => 'YD8UAAGFTiqzfSokt5dfLnDS'
            ]
        ]);

        $pic = Image::make($res->getBody());

        unlink(public_path("/post/") . $fileName);

        $pic->resize(1200, 1200);
        $img->insert($pic, 'top-left', 250, 200);

        return $img->response();
    }
})->name('post.generate');