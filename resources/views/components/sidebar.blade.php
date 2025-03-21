<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                @php
                $menus = \App\Models\Menu::whereNull(['menu_id', 'parent_id'])->orderBy('list')->with('subMenus.subSubMenus')->get();
                @endphp
                @foreach ($menus as $menu)
                    <li>
                        <a href="{{ $menu->route }}" class="{{ $menu->subMenus->count() ? 'has-arrow' : '' }}">
                            <i data-feather="{{ $menu->icon }}"></i>
                            <span data-key="t-{{ Str::slug($menu->name) }}">{{ $menu->name }}</span>
                        </a>
                        @if ($menu->subMenus->count())
                            <ul class="sub-menu" aria-expanded="false">
                                @foreach ($menu->subMenus as $submenu)
                                    <li>
                                        <a href="{{ $submenu->route }}" class="{{ $submenu->subSubMenus->count() ? 'has-arrow' : '' }}">
                                            <span data-key="t-{{ Str::slug($submenu->name) }}">{{ $submenu->name }}</span>
                                        </a>
                                        @if ($submenu->subSubMenus->count())
                                            <ul class="sub-menu" aria-expanded="false">
                                                @foreach ($submenu->subSubMenus as $subsubmenu)
                                                    <li>
                                                        <a href="{{ $subsubmenu->route }}">
                                                            <span data-key="t-{{ Str::slug($subsubmenu->name) }}">{{ $subsubmenu->name }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        @if (auth()->user()->role_id == 1)
        <div class="dropdown" id="add-menu-button" >
            <button class="btn btn-primary dropdown-toggle" style="background-color: #023669 !important; border-color: #023669 !important;" type="button" id="menuOptions" data-bs-toggle="dropdown">
                Manage Menu
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0);" onclick="openChooseMenuModal()">Create Menu</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);" onclick="openChooseMenuEditModal()">Edit Menu</a></li>
                <li><a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteMenuModal()">Delete Menu</a></li>
            </ul>
        </div>
        @endif
    </div>
</div>
<x-manage-menu />