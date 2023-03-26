<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('email', 'database', 'session', 'cart', 'table', 'upload', 'user_agent', 'form_validation', 'encryption');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'common_helper', 'form', 'html', 'date', 'product_helper', 'mail_helper');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Login_model', 'Dashboard_model', 'CommonModal');
