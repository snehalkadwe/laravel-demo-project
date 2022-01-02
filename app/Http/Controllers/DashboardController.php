<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }
    public function store()
    {
        // https://realrashid.github.io/sweet-alert/

        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('success', 'Success Message');
        // Alert::info('Info Title', 'Info Message');
        // Alert::warning('Warning Title', 'Warning Message');
        // Alert::error('Error Title', 'Error Message');
        // Alert::question('Question Title', 'Question Message');
        // Alert::html('Enter your email address', '<input class="border rounded-md shadow-lg" type="text" value="example input" />', 'Type');

        // Using the helper function - Alert
        // alert('Title', 'Lorem Lorem Lorem', 'success');
        // alert()->success('Title', 'Lorem Lorem Lorem');
        // alert()->info('Title', 'Lorem Lorem Lorem');
        // alert()->warning('Title', 'Lorem Lorem Lorem');
        // alert()->error('Title', 'Lorem Lorem Lorem');
        // alert()->question('Title', 'Lorem Lorem Lorem');
        // alert()->image('Image Title!', 'Image Description', 'Image URL', 'Image Width', 'Image Height');
        // alert()->html('<i>HTML</i> <u>example</u>', " You can use <b>bold text</b>, <a href='//github.com'>links</a> and other HTML tags ", 'success');


        // or using Toast
        // to assign a position of toast go to config/sweetalert.php file -> assign position to
        // 'toast_position' => env('SWEET_ALERT_TOAST_POSITION', 'center'), by-default it is in top-end or add position function
        // Alert::toast('Toast Message', 'Toast Type');
        toast('Your Post as been submited!', 'success')->position('center');



        return redirect(route('dashboard'));
    }
}
