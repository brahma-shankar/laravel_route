<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('hello');
// });



Route::get('/', function(){
    return 'This is home page';
});  

Route::get('/about', function(){
    return 'This is about us page';
});

Route::get('/gallery', function(){
    return 'This is gallery page';
});

Route::get('/contact', function(){
    return 'This is contact us page';
});

Route::get('/post/{id}', function($id){   //$id will be any name
    return 'post id is '.$id;
});

//Example with multiple route parameters.

Route::get('post1/{id}/{name}', function($id, $name=''){
    return 'hello '.$id.' '.$name;
});

//Optional parameter

Route::get('user/{name?}', function($name=''){
    return 'hello '.$name. ' this optional parameter';
});

//Default value parameter



Route::get('user1/{name?}', function($name = 'brahma'){
    if($name == 'brahma'){
        return 'Default name is :- '.$name;
    }
    else{
        return 'User define name is :-  '.$name;
    }
});


// Regular Expression Constraints, suppose we want to pass only alphabatic characters than
Route::get('user2/{name?}', function($name =''){
    return $name;
})->where('name', '[a-zA_Z]+');


// Regular Expression Constraints, accepts only numeric value
Route::get('user3/{id?}', function($id = ''){
        return $id;
    
})->where('id', '[0-9]+');

//Alphanumeric characters

Route::get('user4/{id?}/{name?}', function($id='', $name=''){
    return 'Id is:- '.$id. ', Name is:- '.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA_Z]+']);


// Named Parameter


Route::get('home_page', function(){
    return view('home');
})->name('home');

Route::get('about_page', function(){
    return view('about');
})->name('about');

Route::get('contact_us_page', function(){
    return view('contact');
})->name('contact_us')->middleware('age');

Route::get('check_age/{age?}', function($age=""){
    return view('check_age');
})->name('check_age')->middleware('age');


// Group Route

Route::group([], function(){
    Route::get('a', function(){
        echo "a";
    });
    Route::get('b', function(){
        echo "b";
    });
    Route::get('c', function(){
        echo "c";
    });
});

// Group Route with prefix

Route::group(['prefix' => 'tutorial'], function(){
    Route::get('php', function(){
        echo "php tutorial";
    });
    Route::get('java', function(){
        echo "Java tutorial";
    });
    Route::get('full_stack', function(){
        echo "Full stack tutorial";
    });
});
