<!-- <div class="page-content"> -->

<!-- Start Container Fluid -->
<!-- <div class="container-fluid"> -->

<!-- Start here.... -->

<div class="row">
	<div class="col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="avatar-md bg-light bg-opacity-50 rounded">
							<iconify-icon icon="solar:leaf-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
						</div>
					</div> <!-- end col -->
					<div class="col-6 text-end">
						<p class="text-muted mb-0 text-truncate fw-semibold">Daily Visitors</p>
						<h3 class="text-dark mt-1 mb-0"><?php echo HotelDashboard::findColumn('total_customers'); ?></h3>
					</div> <!-- end col -->
				</div> <!-- end row-->
			</div> <!-- end card body -->
			<div class="card-footer border-0 py-2 bg-light bg-opacity-50">
				<div class="d-flex align-items-center justify-content-between">
					<div>
						<span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i> 2.3%</span>
						<span class="text-muted ms-1 fs-12">Last Month</span>
					</div>
					<a href="<?php echo $base_url ?>customer" class="text-reset fw-semibold fs-12">View More</a>
				</div>
			</div> <!-- end card body -->
		</div> <!-- end card -->
	</div> <!-- end col -->
	<div class="col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="avatar-md bg-light bg-opacity-50 rounded">
							<iconify-icon icon="solar:cpu-bolt-line-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
						</div>
					</div> <!-- end col -->
					<div class="col-6 text-end">
						<p class="text-muted mb-0 text-truncate fw-semibold">Check Ins </p>
						<h3 class="text-dark mt-1 mb-0"><?php echo HotelDashboard::findColumn('total_check_ins'); ?></h3>
					</div> <!-- end col -->
				</div> <!-- end row-->
			</div> <!-- end card body -->
			<div class="card-footer border-0 py-2 bg-light bg-opacity-50">
				<div class="d-flex align-items-center justify-content-between">
					<div>
						<span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i> 8.1%</span>
						<span class="text-muted ms-1 fs-12">Last Month</span>
					</div>
					<a href="<?php echo $base_url ?>checkincheckout" class="text-reset fw-semibold fs-12">View More</a>
				</div>
			</div> <!-- end card body -->
		</div> <!-- end card -->
	</div> <!-- end col -->
	<div class="col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="avatar-md bg-light bg-opacity-50 rounded">
							<iconify-icon icon="solar:layers-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
						</div>
					</div> <!-- end col -->
					<div class="col-6 text-end">
						<p class="text-muted mb-0 text-truncate fw-semibold">Check Out</p>
						<h3 class="text-dark mt-1 mb-0"><?php echo HotelDashboard::findColumn('total_check_outs'); ?></h3>
					</div> <!-- end col -->
				</div> <!-- end row-->
			</div> <!-- end card body -->
			<div class="card-footer border-0 py-2 bg-light bg-opacity-50">
				<div class="d-flex align-items-center justify-content-between">
					<div>
						<span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i> 0.3%</span>
						<span class="text-muted ms-1 fs-12">Last Month</span>
					</div>
					<a href="<?php echo $base_url ?>checkincheckout" class="text-reset fw-semibold fs-12">View More</a>
				</div>
			</div> <!-- end card body -->
		</div> <!-- end card -->
	</div> <!-- end col -->
	<div class="col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="avatar-md bg-light bg-opacity-50 rounded">
							<iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
						</div>
					</div> <!-- end col -->
					<div class="col-6 text-end">
						<p class="text-muted mb-0 text-truncate">Total Revenue</p>
						<h3 class="text-dark mt-1 mb-0 " style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">$<?php echo HotelDashboard::findColumn('total_revenue'); ?></h3>
					</div> <!-- end col -->
				</div> <!-- end row-->
			</div> <!-- end card body -->
			<div class="card-footer border-0 py-2 bg-light bg-opacity-50">
				<div class="d-flex align-items-center justify-content-between">
					<div>
						<span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i> 10.6%</span>
						<span class="text-muted ms-1 fs-12">Last Month</span>
					</div>
					<a href="<?php echo $base_url ?>invoice" class="text-reset fw-semibold fs-12">View More</a>
				</div>
			</div> <!-- end card body -->
		</div> <!-- end card -->
	</div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body p-0">
				<div class="row g-0">
					<div class="col-lg-3">
						<div class="p-3">
							<h5 class="card-title">Available Rooms Today</h5>
							<!-- <div id="conversions" class="apex-charts mb-2 mt-n2"></div> -->
							<div class="room-statistics mt-3 ">
								<ul class="list-unstyled">
									<!-- Standard Room -->
									<li class="d-flex align-items-center mb-3">
										<div class="room-info flex-grow-1 d-flex justify-content-between">
											<h3 class="room-type text-muted mb-0">Standard</h3>
											<h3 class="room-count text-dark mb-0"><?php echo HotelDashboard::findColumn('standard_rooms_total'); ?></h3>
										</div>
									</li>
									<!-- Deluxe Room -->
									<li class="d-flex align-items-center mb-3">
										<div class="room-info flex-grow-1 d-flex justify-content-between">
											<h3 class="room-type text-muted mb-0">Deluxe</h3>
											<h3 class="room-count text-dark mb-0"><?php echo HotelDashboard::findColumn('deluxe_rooms_total'); ?></h3>
										</div>
									</li>
									<!-- Suite Room -->
									<li class="d-flex align-items-center mb-3">
										<div class="room-info flex-grow-1 d-flex justify-content-between">
											<h3 class="room-type text-muted mb-0">Suite</h3>
											<h3 class="room-count text-dark mb-0"><?php echo HotelDashboard::findColumn('suite_rooms_total'); ?></h3>
										</div>
									</li>
									<!-- Penthouse Room -->
									<li class="d-flex align-items-center">
										<div class="room-info flex-grow-1 d-flex justify-content-between">
											<h3 class="room-type text-muted mb-0">Penthouse</h3>
											<h3 class="room-count text-dark mb-0"><?php echo HotelDashboard::findColumn('penthouse_rooms_total'); ?></h3>
										</div>
									</li>
								</ul>
							</div>

							<div class="row text-center mt-3">
								<div class="col-6 bg-danger bg-opacity-10 rounded-3">
									<h3 class="text-green mb-3">Booked Rooms</h3>
									<h3 class="text-green mb-3"><?php echo HotelDashboard::findColumn('booked_rooms'); ?></h3>
								</div> <!-- end col -->
								<div class="col-6 bg-success bg-opacity-50 rounded-3">
									<h3 class="text-danger mb-3 ">Available Rooms</h3>
									<h3 class="text-danger mb-3"><?php echo HotelDashboard::findColumn('available_rooms'); ?></h3>
								</div> <!-- end col -->
							</div> <!-- end row -->
							<div class="text-center mt-3">
								<button type="button" class="btn btn-success shadow-none w-100"><a href="<?php echo $base_url ?>booking/create" class="text-white fw-semibold">Book Now</a></button>
							</div> <!-- end row -->
						</div>
					</div> <!-- end left chart card -->
					<div class="col-lg-6 border-start border-end">
						<div class="p-3">
							<div class="alert alert-warning shadow text text-truncate mb-0 text-center fs-20" role="alert">
								Total Booked Rooms: <span class="fw-semibold text-green "> <?php echo HotelDashboard::findColumn('total_bookings'); ?> </span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
								<h4 class="card-title">Revenue by Month</h4>
								<div>
									<button type="button" class="btn btn-sm btn-outline-light">ALL</button>
									<button type="button" class="btn btn-sm btn-outline-light">1M</button>
									<button type="button" class="btn btn-sm btn-outline-light">6M</button>
									<button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
								</div>
							</div> <!-- end card-title-->


							<div dir="ltr">
								<div id="dash-performance-chart" class="apex-charts"></div>
							</div>
						</div>
					</div> <!-- end right chart card -->

					<div class="col-lg-3">
						<h5 class="card-title p-3">Customers Details</h5>
						<div class="px-3" data-simplebar style="max-height: 310px;">
							<div class="d-flex justify-content-between align-items-center p-2">
								<span class="align-middle fw-medium">Name</span>
								<span class="fw-semibold text-muted">Phone</span>
								<span class="fw-semibold text-muted">Room No</span>
							</div>
							<?php
							$customers = Customer::all_name_phone();
							if ($customers && count($customers) > 0) {
								foreach ($customers as $customer) { ?>
									<div class="d-flex justify-content-between align-items-center p-2">
										<span class="align-middle fw-medium"><?php echo $customer->first_name; ?></span>
										<span class="fw-semibold text-muted"><?php echo $customer->customer_phone; ?></span>
										<span class="fw-semibold text-muted"><?php echo $customer->booked_room_number; ?></span>
									</div>
								<?php }
							} else { ?>
								<p class="text-muted">No customers found.</p>
							<?php } ?>

						</div>
						<div class="text-center p-3">
							<button type="button" class="btn btn-light shadow-none w-100"><a href="<?php echo $base_url ?>customer" class="text-dark fw-semibold">View Customers</a></button>
						</div> <!-- end row -->
					</div>
				</div> <!-- end chart card -->
			</div> <!-- end card body -->
		</div> <!-- end card -->
	</div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
	<div class="col-lg-4">
		<div class="card card-height-100">
			<div class="d-flex card-header justify-content-between align-items-center border-bottom border-dashed">
				<h4 class="card-title">Sessions by Country</h4>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
						View Data
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item">Download</a>
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item">Export</a>
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item">Import</a>
					</div>
				</div>
			</div>

			<div class="card-body pt-0">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<div id="world-map-markers" class="mt-3" style="height: 220px">
						</div>
					</div>
					<div class="col-lg-5" dir="ltr">
						<div class="p-3 pb-0">
							<!-- Country Data -->
							<div class="d-flex justify-content-between align-items-center">
								<p class="mb-1">
									<iconify-icon icon="circle-flags:ru" class="fs-16 align-middle me-1"></iconify-icon> <span class="align-middle">Russia</span>
								</p>
							</div>
							<div class="row align-items-center mb-3">
								<div class="col">
									<div class="progress progress-soft progress-sm">
										<div class="progress-bar bg-secondary" role="progressbar" style="width: 82.05%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-auto">
									<p class="mb-0 fs-13 fw-semibold">659k</p>
								</div>
							</div>

							<!-- Country Data -->
							<div class="d-flex justify-content-between align-items-center">
								<p class="mb-1">
									<iconify-icon icon="circle-flags:bd" class="fs-16 align-middle me-1"></iconify-icon> <span class="align-middle">Bangladesh</span>
								</p>
							</div>
							<div class="row align-items-center mb-3">
								<div class="col">
									<div class="progress progress-soft progress-sm">
										<div class="progress-bar bg-info" role="progressbar" style="width: 70.5%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-auto">
									<p class="mb-0 fs-13 fw-semibold">485k</p>
								</div>
							</div>

							<!-- Country Data -->
							<div class="d-flex justify-content-between align-items-center">
								<p class="mb-1">
									<iconify-icon icon="circle-flags:bd" class="fs-16 align-middle me-1"></iconify-icon> <span class="align-middle">Bangladesh</span>
								</p>
							</div>
							<div class="row align-items-center mb-3">
								<div class="col">
									<div class="progress progress-soft progress-sm">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 65.8%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-auto">
									<p class="mb-0 fs-13 fw-semibold">355k</p>
								</div>
							</div>

							<!-- Country Data -->
							<!-- <div class="d-flex justify-content-between align-items-center">
								<p class="mb-1">
									<iconify-icon icon="circle-flags:ca" class="fs-16 align-middle me-1"></iconify-icon> <span class="align-middle">Canada</span>
								</p>
							</div>
							<div class="row align-items-center">
								<div class="col">
									<div class="progress progress-soft progress-sm">
										<div class="progress-bar bg-success" role="progressbar" style="width: 55.8%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-auto">
									<p class="mb-0 fs-13 fw-semibold">204k</p>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div> <!-- end card-body-->
		</div> <!-- end card-->
	</div> <!-- end col-->

	<div class="col-lg-8">
		<div class="card card-height-100">
			<div class="card-header d-flex align-items-center justify-content-between gap-2">
				<h4 class="card-title flex-grow-1">Check In/Out Sessions</h4>
				<div>
					<a href="<?php echo $base_url; ?>checkincheckout" class="btn btn-sm btn-soft-primary">View All</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-nowrap table-centered m-0">
					<thead class="bg-light bg-opacity-50">
						<tr>
							<th class="text-muted py-1">Rooms Type</th>
							<th class="text-muted py-1">Room Number</th>
							<th class="text-muted py-1">Check In</th>
							<th class="text-muted py-1">Check Out</th>
							<th class="text-muted py-1">Customer Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$checkincheckout = HotelDashboard::checkin_checkout_statistics();
						if ($checkincheckout && count($checkincheckout) > 0) {
							foreach ($checkincheckout as $checkincheckouts) {
						?>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="flex-shrink-0">
											<div class="avatar-sm">
												<span class="avatar-title bg-primary-subtle text-primary rounded-3">
													<i class="ri-hotel-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1 ms-2">
											<h6 class="fs-13 mb-0"> <?php echo $checkincheckouts->room_type; ?></h6>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-center">
										<div class="flex-shrink-0">
											<div class="avatar-sm">
												<span class="avatar-title bg-primary-subtle text-primary rounded-3">
													<i class="ri-hotel-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1 ms-2">
											<h6 class="fs-13 mb-0"><?php echo $checkincheckouts->room_number; ?></h6>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-center">
										<div class="flex-shrink-0">
											<div class="avatar-sm">
												<span class="avatar-title bg-primary-subtle text-primary rounded-3">
													<i class="ri-time-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1 ms-2">
											<h6 class="fs-13 mb-0"><?php echo date('d-m-Y', strtotime($checkincheckouts->check_in_time)); ?></h6>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-center">
										<div class="flex-shrink-0">
											<div class="avatar-sm">
												<span class="avatar-title bg-primary-subtle text-primary rounded-3">
													<i class="ri-time-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1 ms-2">
											<h6 class="fs-13 mb-0"><?php echo date('d-m-Y', strtotime($checkincheckouts->check_out_time)); ?></h6>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-center">
										<div class="flex-shrink-0">
											<div class="avatar-sm">
												<span class="avatar-title bg-primary-subtle text-primary rounded-3">
													<i class="ri-user-3-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1 ms-2">
											<h6 class="fs-13 mb-0"><?php echo $checkincheckouts->customer_name; ?></h6>
										</div>
									</div>
								</td>
							</tr>
						<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- </div> end row -->

	<!-- </div> -->