<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/index', $data);
    }
    public function about()
    {
        return view('pages/about');
    }
    public function accordion()
    {
        return view('pages/accordion');
    }
    public function add_product()
    {
        return view('pages/add-product');
    }
    public function advanced_forms()
    {
        return view('pages/advanced-forms');
    }
    public function alerts()
    {
        return view('pages/alerts');
    }
    public function apex_charts()
    {
        return view('pages/apex-charts');
    }
    public function avatars()
    {
        return view('pages/avatars');
    }
    public function badges()
    {
        return view('pages/badges');
    }
    public function blockquotes()
    {
        return view('pages/blockquotes');
    }
    public function blog_details()
    {
        return view('pages/blog-details');
    }
    public function blog_edit()
    {
        return view('pages/blog-edit');
    }
    public function blog()
    {
        return view('pages/blog');
    }
    public function breadcrumb()
    {
        return view('pages/breadcrumb');
    }
    public function buttons()
    {
        return view('pages/buttons');
    }
    public function calendar()
    {
        return view('pages/calendar');
    }
    public function cards()
    {
        return view('pages/cards');
    }
    public function carousel()
    {
        return view('pages/carousel');
    }
    public function cart()
    {
        return view('pages/cart');
    }
    public function chartjs()
    {
        return view('pages/chartjs');
    }
    public function chat()
    {
        return view('pages/chat');
    }

    public function checkout()
    {
        return view('pages/checkout');
    }
    public function collapse()
    {
        return view('pages/collapse');
    }
    public function columns()
    {
        return view('pages/columns');
    }
    public function comingsoon()
    {
        return view('pages/comingsoon');
    }
    public function construction()
    {
        return view('pages/construction');
    }
    public function contacts()
    {
        return view('pages/contacts');
    }
    public function contactus()
    {
        return view('pages/contactus');
    }
    public function createpassword_cover()
    {
        return view('pages/createpassword-cover');
    }
    public function createpassword_cover2()
    {
        return view('pages/createpassword-cover2');
    }
    public function createpassword()
    {
        return view('pages/createpassword');
    }
    public function datatables()
    {
        return view('pages/datatables');
    }
    public function draggable()
    {
        return view('pages/draggable');
    }
    public function dropdown()
    {
        return view('pages/dropdown');
    }
    public function echartjs()
    {
        return view('pages/echartjs');
    }
    public function edit_product()
    {
        return view('pages/edit-product');
    }
    public function edittable()
    {
        return view('pages/edittable');
    }
    public function emptypage()
    {
        return view('pages/emptypage');
    }
    public function error404()
    {
        return view('pages/error404');
    }
    public function error500()
    {
        return view('pages/error500');
    }
    public function faqs()
    {
        return view('pages/faqs');
    }
    public function file_details()
    {
        return view('pages/file-details');
    }
    public function file_upload()
    {
        return view('pages/file-upload');
    }
    public function filemanager_list()
    {
        return view('pages/filemanager-list');
    }
    public function filemanager()
    {
        return view('pages/filemanager');
    }
    public function forgot_cover()
    {
        return view('pages/forgot-cover');
    }
    public function forgot_cover2()
    {
        return view('pages/forgot-cover2');
    }
    public function forgot()
    {
        return view('pages/forgot');
    }
    public function form_checkbox()
    {
        return view('pages/form-checkbox');
    }
    public function form_elements()
    {
        return view('pages/form-elements');
    }
    public function form_input_group()
    {
        return view('pages/form-input-group');
    }
    public function form_layouts()
    {
        return view('pages/form-layouts');
    }
    public function form_radio()
    {
        return view('pages/form-radio');
    }
    public function form_select()
    {
        return view('pages/form-select');
    }
    public function form_switch()
    {
        return view('pages/form-switch');
    }
    public function form_validations()
    {
        return view('pages/form-validations');
    }
    public function gallery()
    {
        return view('pages/gallery');
    }
    public function google_maps()
    {
        return view('pages/google-maps');
    }
    public function grid()
    {
        return view('pages/grid');
    }
    public function index2()
    {
        return view('pages/index2');
    }
    public function index3()
    {
        return view('pages/index3');
    }
    public function index4()
    {
        return view('pages/index4');
    }
    public function index5()
    {
        return view('pages/index5');
    }
    public function index6()
    {
        return view('pages/index6');
    }
    public function index7()
    {
        return view('pages/index7');
    }
    public function index8()
    {
        return view('pages/index8');
    }
    public function index9()
    {
        return view('pages/index9');
    }
    public function index10()
    {
        return view('pages/index10');
    }
    public function index11()
    {
        return view('pages/index11');
    }
    public function index12()
    {
        return view('pages/index12');
    }
    public function indicators()
    {
        return view('pages/indicators');
    }
    public function invoice_list()
    {
        return view('pages/invoice-list');
    }
    public function invoice()
    {
        return view('pages/invoice');
    }
    public function landing()
    {
        return view('pages/landing');
    }
    public function leaflet_maps()
    {
        return view('pages/leaflet-maps');
    }
    public function list_group()
    {
        return view('pages/list-group');
    }
    public function list()
    {
        return view('pages/list');
    }
    public function lockscreen_cover()
    {
        return view('pages/lockscreen-cover');
    }
    public function lockscreen_cover2()
    {
        return view('pages/lockscreen-cover2');
    }
    public function lockscreen()
    {
        return view('pages/lockscreen');
    }
    public function mail_inbox()
    {
        return view('pages/mail-inbox');
    }
    public function mail_settings()
    {
        return view('pages/mail-settings');
    }
    public function maintanace()
    {
        return view('pages/maintanace');
    }
    public function mega_menu()
    {
        return view('pages/mega-menu');
    }
    public function modal()
    {
        return view('pages/modal');
    }
    public function navbar()
    {
        return view('pages/navbar');
    }
    public function notifications()
    {
        return view('pages/notifications');
    }
    public function offcanvas()
    {
        return view('pages/offcanvas');
    }
    public function order_details()
    {
        return view('pages/order-details');
    }
    public function orders()
    {
        return view('pages/orders');
    }
    public function pagination()
    {
        return view('pages/pagination');
    }
    public function pricing()
    {
        return view('pages/pricing');
    }
    public function product_list()
    {
        return view('pages/product-list');
    }
    public function products_details()
    {
        return view('pages/products-details');
    }
    public function products()
    {
        return view('pages/products');
    }
    public function profile_settings()
    {
        return view('pages/profile-settings');
    }
    public function profile()
    {
        return view('pages/profile');
    }
    public function progress()
    {
        return view('pages/progress');
    }
    public function quil_editor()
    {
        return view('pages/quil-editor');
    }
    public function rangeslider()
    {
        return view('pages/rangeslider');
    }
    public function ratings()
    {
        return view('pages/ratings');
    }
    public function remix_icons()
    {
        return view('pages/remix-icons');
    }
    public function reset_cover()
    {
        return view('pages/reset-cover');
    }
    public function reset_cover2()
    {
        return view('pages/reset-cover2');
    }
    public function reset()
    {
        return view('pages/reset');
    }
    public function reviews()
    {
        return view('pages/reviews');
    }
    public function scrollspy()
    {
        return view('pages/scrollspy');
    }
    public function signin_cover()
    {
        return view('pages/signin-cover');
    }
    public function signin_cover2()
    {
        return view('pages/signin-cover2');
    }
    public function signin()
    {
        return view('pages/signin');
    }
    public function signup_cover()
    {
        return view('pages/signup-cover');
    }
    public function signup_cover2()
    {
        return view('pages/signup-cover2');
    }
    public function signup()
    {
        return view('pages/signup');
    }
    public function skeleton()
    {
        return view('pages/skeleton');
    }
    public function spinners()
    {
        return view('pages/spinners');
    }
    public function sweetalert()
    {
        return view('pages/sweetalert');
    }
    public function tabler_icons()
    {
        return view('pages/tabler-icons');
    }
    public function tables()
    {
        return view('pages/tables');
    }
    public function tabs()
    {
        return view('pages/tabs');
    }
    public function tasks()
    {
        return view('pages/tasks');
    }
    public function team()
    {
        return view('pages/team');
    }
    public function terms()
    {
        return view('pages/terms');
    }
    public function timeline()
    {
        return view('pages/timeline');
    }
    public function toast()
    {
        return view('pages/toast');
    }
    public function todo()
    {
        return view('pages/todo');
    }
    public function tooltip_popovers()
    {
        return view('pages/tooltip-popovers');
    }
    public function treeview()
    {
        return view('pages/treeview');
    }
    public function vector_maps()
    {
        return view('pages/vector-maps');
    }
    public function verfication_cover()
    {
        return view('pages/verfication-cover');
    }
    public function verfication_cover2()
    {
        return view('pages/verfication-cover2');
    }
    public function verfication()
    {
        return view('pages/verfication');
    }
    public function widgets()
    {
        return view('pages/widgets');
    }
    public function wishlist()
    {
        return view('pages/wishlist');
    }

}