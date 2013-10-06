<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->helper('url');
$template_path=base_url().'application/views/art_template/';

require_once('header.php');
?>
				<section id="content">
					<div class="wrapper">
						<h2><span><?php echo "121314"; ?></span> <?php echo $title; ?></h2>
						<div class="wrapper">	
							<figure class="left marg_right1"><img src="images/page5_img1.jpg" alt=""></figure>
							<?php echo $content; ?>
						</div>
						<div class="pad">
							Linventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione <a href="#">voluptatem sequi nesciunt</a>. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="body4">
	<div class="main">
		<section id="content2">
			<div class="wrapper">
				<h2>News Archive</h2>						
				<div class="pad">
					<p class="pad_bot2">
						<strong>
							<span class="color1">09.05.2011.</span>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
						</strong>
					</p>
					<p>
						Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem
						<a href="#" class="link2">[...]</a>
					</p>
					<p class="pad_bot2">
						<strong>
							<span class="color1">04.05.2011.</span>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
						</strong>
					</p>
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio
						<a href="#" class="link2">[...]</a>
					</p>
					<p class="pad_bot2">
						<strong>	
							<span class="color1">02.05.2011.</span>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
						</strong>
					</p>
					<p>
						Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae
						<a href="#" class="link2">[...]</a>
					</p>
					<p class="pad_bot2">
						<strong>
							<span class="color1">31.04.2011.</span>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
						</strong>
					</p>
					Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem
					<a href="#" class="link2">[...]</a>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- / content -->

<?php
require_once('footer.php');
?>