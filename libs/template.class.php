<?php

class template
{
    private $css = [
            'bootstrap.min.css',
            'bootstrap-responsive.min.css',
            'flexslider.css',
            'prettyPhoto.css',
            'style.css',
    ];
    private $js = [
            'jquery-1.8.3.min.js',
            'bootstrap.min.js',
            'jquery.easing.js',
            'jquery.flexslider-min.js',
            'jflickrfeed.min.js',
            'jquery.fitvids.min.js',
            'jquery.lazyload.mini.js',
            'jquery.prettyPhoto.js',
            'jquery.placeholder.min.js',
            'jquery.jticker.js',
            'jquery.mobilemenu.js',
            'jquery.isotope.min.js',
            'jquery.hoverdir.js',
            'modernizr.custom.js',
            'main.js',
    ];
    private $cdn = [
            'http://fonts.googleapis.com/css?family=Oswald',
            'http://fonts.googleapis.com/css?family=Bitter',
            'http://fonts.googleapis.com/css?family=Open+Sans',
    ];
    private $no_js = [
            'no-js.css',
    ];
    private $template = [
            'header.tpl',

            // 'slider.tpl',
            'content.tpl',

            // 'sidebar.tpl',
            'footer.tpl',
    ];

    protected function page_start()
    {
        return '<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>';
    }

    protected function set_title($title)
    {
        return '<title>'.$title.'</title>';
    }

    protected function set_httpmeta($type, $content)
    {
        return '<meta http-equiv="'.$type.'" content="'.$content.'" />';
    }

    protected function set_meta($name, $content)
    {
        return '<meta name="'.$type.'" content="'.$content.'" />';
    }

    private function call_css()
    {
        $array = [];
        foreach ($this->css as $css) {
            $array[] = '<link rel="stylesheet" href="'.WEB_CSS_DIR.$css.'">';
        }

        return implode('', $array);
    }

    private function call_js()
    {
        $array = [];
        foreach ($this->js as $js) {
            $array[] = '<script type="text/javascript" src="'.WEB_JS_DIR.$js.'"></script>';
        }

        return implode('', $array);
    }

    private function set_base()
    {
        return '<base href="'.HOST_NAME.'" />';
    }

    protected function call_cdn()
    {
        $array = [];
        foreach ($this->cdn as $cdn) {
            $array[] = '<link rel="stylesheet" href="'.$cdn.'">';
        }

        return implode('', $array);
    }

    protected function call_noscript()
    {
        $array = [];
        foreach ($this->no_js as $css) {
            $array[] = '<noscript><link rel="stylesheet" href="'.WEB_CSS_DIR.$css.'"></noscript>';
        }

        return implode('', $array);
    }

    private function Favicons()
    {
        return '<link rel="shortcut icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    ';
    }

    private function call_template()
    {
        foreach ($this->template as $template) {
            if (file_exists(WEB_TEMPLATE_PATH.$template)) {
                require_once WEB_TEMPLATE_PATH.$template;
            }
        }
    }

    public function __construct()
    {
        $this->guard();
        $output = $this->page_start();
        $output .= $this->set_title('^_^');
        $output .= $this->set_httpmeta('content-type', 'text/html;charset=utf-8');
        $output .= $this->set_meta('description', 'Enews is a news or magazine site template that built with very cool responsive template with clean design, fast load, seo friendly, beauty color and a slew of features.');
        $output .= $this->set_meta('keywords', 'Site Template, News, Magazine, Portofolio, HTML, CSS, jQuery, Newsletter, PHP Contact, Subscription, Responsive, Marketing, Clean, SEO');
        $output .= $this->set_meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1');
        $output .= $this->set_base();
        $output .= $this->call_css();
        $output .= $this->call_cdn();
        $output .= $this->call_noscript();
        $output .= $this->Favicons();
        $output .= $this->call_js();
        $output .= '</head><body>';
        echo $output;
        $this->call_template();
        echo '</body></html>';
    }

    public static function get_view()
    {
        //($_GET ['view']=='')?$_GET ['view']='index':null;
        return (isset($_GET['view'])) ? $_GET['view'] : 'index';
    }

    private function render_view()
    {
        $view = self::get_view();
        $required = WEB_VIEWS.$view.'.view.php';
        if (file_exists($required)) {
            require_once $required;

            return true;
        } else {
            require_once WEB_VIEWS.'404.view.php';

            return false;
        }
    }

    private function guard()
    {
        $pages = [
                'login',
                'register',
                'activation',
        ];
        if (user::logedin() && in_array(self::get_view(), $pages)) {
            header('location:'.HOST_NAME);
        }
    }
}
