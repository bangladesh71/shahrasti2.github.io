
<?php

App::uses ( 'AppHelper', 'View/Helper' );

class MenuHelper extends AppHelper {
	
	public $helpers = array ('Html' );
	
	//public menu generator
	public function menuGenerator($threaded, $level = 0, $styleUlclass = null, $styleLiclass = null, $link = 1, $sortable = 1,$reservation=null) {
		
		
	
		$html = '<ul id="menuid" class="sf-menu' . $styleUlclass . '" >';
		foreach ( $threaded as $key => $node ) {
			if ($sortable == 1) {
				$html .= '<div><li>' . '<input type="hidden" value="' . $node ['Menu'] ['id'] . '" name="order[]">';
			} else {
				$html .= '<li >';
			}
			
			foreach ( $node as $type => $threaded ) {
					if ($type !== 'children') {
						if ($link == 1) {
							if($threaded['type']== '2'){
								$html .= $this->Html->link ( $threaded ['name'], "{$threaded ['url']}" );
							}else{
								$html .= $this->Html->link ( $threaded ['name'], array ('controller' => 'pages', 'action' => 'content', $threaded ['slug'] ) );
							}
						} else {
							$html .= $threaded ['name'];
						}
					
					} else {
						if (! empty ( $threaded )) {
							$html .= $this->menuGenerator1 ( $threaded, $level + 2, 'subs', $styleLiclass = null, $link, $sortable );
						}
					}
				}
			$html .= '</li>';
			
				
		}
	
		if($reservation){
			$html .= "<li>".$this->Html->link('My Reservation', array ('controller' => 'bookings', 'action' => 'myreservation' ) )."</li>";
		}
		
		
		$html .= '</ul>';
		return $html;
	}
	//public menu footer generator
	public function menuGenerator3($threaded, $level = 0, $styleUlclass = null, $styleLiclass = null, $link = 1, $sortable = 1,$reservation=null) {
			
			
		
			$html = '<div id="menuid" class="menufooter' . $styleUlclass . '" >';
			foreach ( $threaded as $key => $node ) {
				if ($sortable == 1) {
					$html .= '<div><a>' . '<input type="hidden" value="' . $node ['Menu'] ['id'] . '" name="order[]">';
				} 
				
				foreach ( $node as $type => $threaded ) {
						if ($type !== 'children') {
							if ($link == 1) {
								if($threaded['type']== '2'){
									$html .= $this->Html->link ( $threaded ['name'], "{$threaded ['url']}" );
								}else{
									$html .= $this->Html->link ( $threaded ['name'], array ('controller' => 'pages', 'action' => 'content', $threaded ['slug'] ) );
								}
							} else {
								$html .= $threaded ['name'];
							}
						
						} else {
							if (! empty ( $threaded )) {
								//$html .= $this->menuGenerator1 ( $threaded, $level + 2, 'subs', $styleLiclass = null, $link, $sortable );
							}
						}
					}

				
					
			}
		
			if($reservation){
				$html .= "<a>".$this->Html->link('My Reservation', array ('controller' => 'bookings', 'action' => 'myreservation' ) )."</a>";
			}
			
			
			$html .= '</div>';
			return $html;
		}
	public function menuGenerator1($threaded, $level = 0, $styleUlclass = null, $styleLiclass = null, $link = 1, $sortable = 1,$lang=null) {
		
		
	
		$html = '<ul >';
		foreach ( $threaded as $key => $node ) {
			if ($sortable == 1) {
				$html .= '<div><li>' . '<input type="hidden" value="' . $node ['Menu'] ['id'] . '" name="order[]">';
			} else {
				$html .= '<li >';
			}
			
			foreach ( $node as $type => $threaded ) {
					if ($type !== 'children') {
						if ($link == 1) {
							if($threaded['type']== '2'){
								$html .= $this->Html->link ( $threaded ['name'], "{$threaded ['url']}" );
							}else{
								$html .= $this->Html->link ( $threaded ['name'], array ('controller' => 'pages', 'action' => 'content', $threaded ['slug'] ) );
							}
						} else {
							$html .= $threaded ['name'];
						}
					
					} else {
						if (! empty ( $threaded )) {
							$html .= $this->menuGenerator ( $threaded, $level + 2, 'subs', $styleLiclass = null, $link, $sortable );
						}
					}
				}
			$html .= '</li>';
		}
		$html .= '</ul>';
		return $html;
	}

}
	