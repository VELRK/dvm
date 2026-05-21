<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redirects extends CI_Controller {

    public function property($slug = '')
    {
        redirect(base_url('plots-in-coimbatore/'.$slug), 'location', 301);
    }
      public function blog($slug = '')
    {
        redirect(base_url('blog/'.$slug), 'location', 301);
    }
}