<li class="nav-item">
	<a class="nav-link menu-arrow" href="#sidebarInvoice" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoice">
		<span class="nav-icon">
			<iconify-icon icon="solar:bill-list-broken"></iconify-icon>
		</span>
		<span class="nav-text"> Hotel Billing </span>
	</a>
	<div class="collapse" id="sidebarInvoice">
		<ul class="nav sub-navbar-nav">
			<li class="sub-nav-item">
				<a class="sub-nav-link" href="<?php echo $base_url ?>invoice">Hotel Invoice</a>
			</li>
			<li class="sub-nav-item">
				<a class="sub-nav-link" href="<?php echo $base_url ?>payment">Payment List</a>
			</li>
			<li class="sub-nav-item">
				<a class="sub-nav-link" href="<?php echo $base_url ?>paymentmethod">Payment Method List</a>
			</li>
			<li class="sub-nav-item">
				<a class="sub-nav-link" href="<?php echo $base_url ?>paymentstatuse"> Payment Status </a>
			</li>
		</ul>
	</div>
</li>