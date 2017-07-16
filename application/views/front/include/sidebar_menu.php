<body>

	<div class="wrapper">
		<div class="sidebar" data-background-color="white"
		data-active-color="danger">
		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					<?php
					if (isset($site)) {
						echo $site->site_name;
					}
					?>
				</a>
			</div>

			<ul class="nav">
				<?php
				if (isset($menu)) {
					foreach ($menu as $data) {
						if ($active_page == $data ['page_name']) {
							?>
							<li class="active"><a
								href="<?= $data['link'] ?>"> <i class="<?= $data['icon'] ?>"></i>
								<p><?= $data['label'] ?></p>
							</a></li>
							<?php

						} else {
							?>
							<li><a href="<?= $data['link'] ?>"> <i
								class="<?= $data['icon'] ?>"></i>
								<p><?= $data['label'] ?></p>
							</a></li>
							<?php

						}
					}
				}
				?>

			</ul>
		</div>
	</div>
