<li class="nav-item">
    <a class="nav-link menu-arrow" href="#sidebarMultiLevelDemo" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
        <span class="nav-icon">
            <iconify-icon icon="solar:share-broken"></iconify-icon>
        </span>
        <span class="nav-text">Amenities & Orders </span>
    </a>
    <div class="collapse" id="sidebarMultiLevelDemo">
        <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
                <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarItemDemoSubItem">
                    <span> Room Aminity Request</span>
                </a>
                <div class="collapse" id="sidebarItemDemoSubItem">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="<?php echo $base_url ?>amenity">Amenities</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="<?php echo $base_url ?>roomamenity">Room Amenities request</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="sub-nav-item">
                <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarItemDemoSubItem">
                    <span> Room Service Orders</span>
                </a>
                <div class="collapse" id="sidebarItemDemoSubItem">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="<?php echo $base_url ?>item">Items</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="<?php echo $base_url ?>order">Orders by Guest</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="<?php echo $base_url ?>orderitem">Guest Order Details </a>
                        </li>

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="<?php echo $base_url ?>inventory">Hotel Inventory</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>