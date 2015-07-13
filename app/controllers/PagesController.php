<?php

/**
 * File Name: PagesController.php.
 * User: Prateek Singh
 * Date: 7/2/2015
 * Time: 12:09 PM
 */
class PagesController extends BaseController
{

    protected $layout;// = "layouts.login";
    private $_layout = null;

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));

    }

    private function _setupLayout()
    {
        if (!is_null($this->_layout)) {
            $this->layout = View::make($this->_layout);
        }
    }

    public function index()
    {

        $this->_layout = 'layouts.loginTemplate';
        $this->_setUpLayout();
        if(Auth::check())
             return Redirect::to('profile');             
        else
            $this->layout->content = View::make('pages.index');



    }

}

