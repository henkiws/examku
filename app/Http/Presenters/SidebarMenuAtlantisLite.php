<?php

namespace App\Http\Presenters;

use Nwidart\Menus\Presenters\Presenter;
use Illuminate\Support\Str;

class SidebarMenuAtlantisLite extends Presenter
{
	/**
	 * {@inheritdoc }
	 */
	public function getOpenTagWrapper()
	{
		return  PHP_EOL . '<ul class="nav nav-primary">' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getCloseTagWrapper()
	{
		return  PHP_EOL . '</ul>' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getMenuWithoutDropdownWrapper($item)
	{
		// return '<li'.$this->getActiveState($item).'><a href="'. $item->getUrl() .'">'.$item->getIcon().' '.$item->title.'</a></li>';
		return '<li '.$this->getActiveState($item).'>
					<a href="'. $item->getUrl() .'">
						'.$item->getIcon().'
						<span class="sub-item">'.$item->title.'</span>
					</a>
				</li>';
	}

	/**
	 * {@inheritdoc }
	 */
	public function getActiveState($item)
	{
		return \Request::is($item->getRequest()) ? ' class="nav-item active"' : 'nav-item';
	}

	/**
	 * {@inheritdoc }
	 */
	public function getDividerWrapper()
	{
		// return '<li class="divider"></li>';
		return '<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Components</h4>
				</li>';
	}

	/**
	 * {@inheritdoc }
	 */
	public function getMenuWithDropDownWrapper($item)
	{
		// .(\Request::url() == $item->getUrl() ?
		return '<li class="'.$this->getActiveState($item).'">
					<a data-toggle="collapse" href="#'.Str::slug($item->title, '-').'" class="collapsed" aria-expanded="false">
						'.$item->getIcon().'
						<p>'.$item->title.'</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="'.Str::slug($item->title, '-').'">
						<ul class="nav nav-collapse">
							'.$this->getChildMenuItems($item).'
						</ul>
					</div>
				</li>'. PHP_EOL;
		// return '<li class="has-dropdown">
		//         <a href="#">
		//          '.$item->getIcon().' '.$item->title.'
		//         </a>
		//         <ul class="dropdown">
		//           '.$this->getChildMenuItems($item).'
		//         </ul>
		//       </li>' . PHP_EOL;
		;
	}
}
?>