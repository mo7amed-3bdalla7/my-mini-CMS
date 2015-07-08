<?php
class adminTemplate extends template {
	private $css = array (
			'assets/css/bootstrap.css',
			'assets/font-awesome/css/font-awesome.css',
			'assets/css/zabuto_calendar.css',
			'assets/js/gritter/css/jquery.gritter.css',
			'assets/lineicons/style.css',
			'assets/css/style.css',
			'assets/css/style-responsive.css' 
	);
	private $top_js = array (
			'assets/js/chart-master/Chart.js',
			
	);
	private $template = array (
			'header.tpl',
			'sidebar.tpl',
			'content.tpl',
			'footer.tpl' 
	);
	private $bottom_js = array (
			'assets/js/jquery.js',
			'assets/js/jquery-1.8.3.min.js',
			'assets/js/bootstrap.min.js',
			'assets/js/jquery.dcjqaccordion.2.7.js',
			'assets/js/jquery.scrollTo.min.js',
			'assets/js/jquery.nicescroll.js',
			'assets/js/jquery.sparkline.js',
			'assets/js/common-scripts.js',
			'assets/js/gritter/js/jquery.gritter.js',
			'assets/js/gritter-conf.js',
			'assets/js/sparkline-chart.js',
			'assets/js/zabuto_calendar.js',
			'assets/js/jquery-ui-1.9.2.custom.min.js',
			'assets/js/bootstrap-switch.js',
			'assets/js/jquery.tagsinput.js',
			//'assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js',
			//'assets/js/bootstrap-daterangepicker/date.js',
			//'assets/js/bootstrap-daterangepicker/daterangepicker.js',
			//'assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js',
			'assets/js/form-component.js',
	);
	private $cdn = array ();
	private $no_js = array (
			'no-js.css' 
	);
	
	private function call_css() {
		$array = [ ];
		foreach ( $this->css as $css ) {
			$array [] = '<link rel="stylesheet" href="' . CPANEL_DIR . $css . '">';
		}
		return implode ( '', $array );
	}
	private function call_top_js() {
		$array = [ ];
		foreach ( $this->top_js as $js ) {
			$array [] = '<script type="text/javascript" src="' . CPANEL_DIR . $js . '"></script>';
		}
		return implode ( '', $array );
	}
	private function call_bottom_js() {
		$array = [ ];
		foreach ( $this->bottom_js as $js ) {
			$array [] = '<script type="text/javascript" src="' . CPANEL_DIR . $js . '"></script>';
		}
		return implode ( '', $array );
	}
	private function set_base() {
		return '<base href="' . HOST_NAME . '" />';
	}
	private function comments() {
		return '<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->';
	}
	private function call_template() {
		foreach ( $this->template as $template ) {
			if (file_exists ( CPANEL_TEMPLATE_PATH . $template )) {
				require_once CPANEL_TEMPLATE_PATH . $template;
			}
		}
	}
	private function inline_script() {
		return <<<MA
		<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
		 <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
MA;
	}
	public function __construct() {
		$output = $this->page_start ();
		$output .= $this->set_title ( 'Admin^_^' );
		$output .= $this->set_httpmeta ( 'content-type', 'text/html;charset=utf-8' );
		$output .= $this->set_meta ( 'description', 'Enews is a news or magazine site template that built with very cool responsive template with clean design, fast load, seo friendly, beauty color and a slew of features.' );
		$output .= $this->set_meta ( 'keywords', 'Site Template, News, Magazine, Portofolio, HTML, CSS, jQuery, Newsletter, PHP Contact, Subscription, Responsive, Marketing, Clean, SEO' );
		$output .= $this->set_meta ( 'viewport', 'width=device-width, initial-scale=1, maximum-scale=1' );
		$output .= $this->set_base ();
		$output .= $this->call_css ();
		// $output .= $this->call_cdn ();
		$output .= $this->call_noscript ();
		$output .= $this->call_top_js ();
		$output .= $this->comments ();
		$output .= '</head><body>';
		echo $output;
		if (self::get_view () == 'login') {
			if(!user::logedin())
			require_once CPANEL_VIEWS . 'login.view.php';
			else 
				header('location:'.HOST_NAME.'cpanel');
		} else {
			$this->call_template ();
			echo $this->call_bottom_js ();
			echo $this->inline_script ();
			
		}
		echo '</body></html>';
	}
	private function render_view() {
		if (user::logedin () && user::current_user ()->is_admin ()) {
			$view = (isset ( $_GET ['view'] )) ? $_GET ['view'] : 'index';
			$required = CPANEL_VIEWS . $view . '.view.php';
			if (file_exists ( $required )) {
				require_once $required;
			} else {
				require_once CPANEL_VIEWS . '404.view.php';
			}
		} else {
			header('location:'.HOST_NAME.'cpanel?view=login');
		}
	}
	private function highlight_menu($s_view = 'Dashboard') {
		$view = isset ( $_GET ['view'] ) ? $_GET ['view'] : 'Dashboard';
		if ($s_view == $view) {
			echo ' class="active" ';
		}
	}
}