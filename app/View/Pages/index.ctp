
			<section id="header" class="dark">
				<header>
					<h1>Islami Sangh Nepal</h1>
					<p>A Leading Organization of Dawah and Reformation</p>
				</header>
				<footer>
					<a href="#first" class="button scrolly">Brief Introduction</a>
				</footer>
			</section>
			
		<!-- First -->
			<section id="first" class="main">
				<header>
					<div class="container">
						<h2><?php echo $about['Page']['title'];?></h2>
						<p><?php echo $about['Page']['description'];?></p>
                        <?php
                        foreach($achild as $ac)
                        {
                            ?>
                            <h2><?php echo $ac['Page']['title'];?></h2>
						<p><?php echo $ac['Page']['description'];?></p>
                            <?php
                        }
                        ?>
					</div>
				</header>
				<div class="content dark style1 featured"  id="second">
                <h2 style="margin-bottom:70px;font-size:38px;"><?php echo $depart['Page']['title'];?></h2>
					<div class="container">
						
                            <?php
                            $i=0;
                            foreach($child as $c)
                            {
                                $i++;
                                if(($i-1)%3==0)
                                {
                                    
                                    ?>
                                    <div class="row">                                  
                                    <?php
                                                                    
                                }                                                                
                                ?>
                                <div class="4u">
								<section>
									<span class="feature-icon"><span class="fa"><?php echo $i;?></span></span>
									<header>
										<h3><?php echo $c['Page']['title'];?></h3>
									</header>
									<div class="div"><?php echo substr($c['Page']['description'],0,170);?><span class="hide<?php echo $i;?>">...</span><span style="display: none;" class="continue<?php echo $i?>"><?php echo substr($c['Page']['description'],200);?></span><br /><a href="javascript:void(0)" class="read" id="read<?php echo $i?>">Continue Reading</a></div>
								</section>
							     </div>
                                <?php
                                if($i%3==0)
                                    {
                                        ?>
                                        </div>
                                        <?php
                                    }
                            }
                            if($i%3!=0)
                            {
                                ?>
                                </div>
                                <?php
                            }
                            ?>
							
							
						</div>
						<div class="row">
							<div class="12u">
								<footer>
									<a href="#third" class="button scrolly">Activites Of ISN</a>
								</footer>
							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- Second -->
			<section id="third" class="main">
				<header>
					<div class="container">
						<h2><?php echo $act['Page']['title'];?></h2>
						<p>
                            <?php echo $act['Page']['description'];?>
                        </p>
                        <?php
                        if($actc)
                        {
                            foreach($actc as $atc)
                            {
                                ?>
                                <h2><?php echo $atc['Page']['title'];?></h2>
        						<p>
                                    <?php echo $atc['Page']['description'];?>
                                </p>
                                <?php                                
                            }
                        }
                        ?>
					</div>
				</header>
				<div class="content dark style2">
                <h2 style="margin-bottom:70px;font-size:38px;text-align: center;">Activites Gallery</h2>
					<div class="container">
						<div class="row">
							<div class="12u">
								<div class="row no-collapse">
									<div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic01.jpg" alt="" /></a></div>
									<div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic02.jpg" alt="" /></a></div>
                                    <div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic03.jpg" alt="" /></a></div>
								</div>
								<div class="row no-collapse">
									<div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic04.jpg" alt="" /></a></div>
									<div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic05.jpg" alt="" /></a></div>
                                    <div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic06.jpg" alt="" /></a></div>
								</div>
								<div class="row no-collapse">
									<div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic07.jpg" alt="" /></a></div>
									<div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic08.jpg" alt="" /></a></div>
                                    <div class="4u"><a href="javascript:void(0);" class="image full"><img src="images/pic09.jpg" alt="" /></a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		<!-- Third -->
			<section class="main" id="fourth">
				<header>
					<div class="container">
						<h2>ISN Media</h2>
						<p>We are pleased to introduce all of our media including print, publication and audio visual to all of our viewers. Feel free to access each of them and take benefit from them. Please browse below to see our listed media.</p>
					</div>
				</header>
				<div class="content dark style3">
					<div class="container">
						<span class="image featured"><img src="images/pic10.jpg" alt="" /></span>
						<div class="row">
							<div class="4u">
								<h3>Print</h3>
								<div class="div">
                                    <?php
                                    foreach($print as $p)
                                    {
                                        ?>
                                        <div class="medialist">
                                            <div class="title"><?php echo $p['Media']['title'];?></div><div class="action"><a href="#"><span class="fa fa-eye smalllink"></span></a> &nbsp; <a href="#"><span class="fa fa-download smalllink"></span></a></div> 
                                        </div>
                                        <?php
                                        
                                    }
                                    ?>
                                </div>
							</div>
							<div class="4u">
                                <h3>Publication</h3>
								<div class="div">
                                    <?php
                                    foreach($publication as $p)
                                    {
                                        ?>
                                        <div class="medialist">
                                            <div class="title"><?php echo $p['Media']['title'];?></div><div class="action"><a href="#"><span class="fa fa-eye smalllink"></span></a> &nbsp; <a href="javascript:void(0)" onclick="$('.popover').load('https://docs.google.com/viewer?url=<?php echo urlencode('http://web-nepal.com/isangh/doc/962344.pdf');?>&embed=true');" class="media"><span class="fa fa-download smalllink"></span></a></div> 
                                        </div>
                                        <?php
                                        
                                    }
                                    ?>
                                </div>
							</div>
							<div class="4u">
                                <h3>Audio-Visual</h3>
								<div class="div">
                                    <?php
                                    foreach($av as $p)
                                    {
                                        ?>
                                        <div class="medialist">
                                            <div class="title"><?php echo $p['Media']['title'];?></div><div class="action"><a href="#"><span class="fa fa-eye smalllink"></span></a> &nbsp; <a href="#"><span class="fa fa-download smalllink"></span></a></div> 
                                        </div>
                                        <?php
                                        
                                    }
                                    ?>
                                </div>
								<footer>
									<a href="#fourth" class="button scrolly">Ipsum ornare lorem dolor</a>
								</footer>
							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- Basic Elements -->
		<!--
			<section class="main">
				<header>
					<div class="container">
						<h2>A Whole Lotta Elements</h2>
						<p>General purpose elements for every general purpose. Or something like that.</p>
					</div>
				</header>
				<div class="content style1 dark">
					<div class="container">
						<section>
							<header>
								<h3>Paragraph</h3>
								<p>This is a byline</p>
							</header>
							<p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque 
							habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi 
							leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit 
							amet risus elit.</p>
						</section>
						<section>
							<header>
								<h3>Blockquote</h3>
							</header>
							<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
							tempus euismod. Vestibulum ante ipsum primis in faucibus. Cras sit amet urna eros, id egestas
							tempus ante ipsum primis in faucibus orci luctus et ultrices.</blockquote>
						</section>
						<section>
							<header>
								<h3>Divider</h3>
							</header>
							<p>Donec consectetur <a href="#">vestibulum dolor et pulvinar</a>. Etiam vel felis enim, at viverra 
							ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci 
							facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam 
							tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
							posuere cubilia.</p>
							<hr />
							<p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra 
							ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci 
							facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam 
							tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
							posuere cubilia.</p>
						</section>
						<section>
							<header>
								<h3>Unordered List</h3>
							</header>
							<ul class="default">
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
							</ul>
						</section>
						<section>
							<header>
								<h3>Ordered List</h3>
							</header>
							<ol class="default">
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
								<li>Donec consectetur vestibulum dolor et vel felis enim at viverra ligula. Ut porttitor sagittis lorem.</li>
							</ol>
						</section>
						<section>
							<header>
								<h3>Table</h3>
							</header>
							<div class="table-wrapper">
								<table class="default">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Description</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>00001</td>
											<td>Lorem ipsum dolor</td>
											<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
											<td>29.99</td>
										</tr>
										<tr>
											<td>00002</td>
											<td>Sit amet nullam</td>
											<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
											<td>19.99</td>
										</tr>
										<tr>
											<td>00003</td>
											<td>Feugiat felis viverra</td>
											<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
											<td>29.99</td>
										</tr>
										<tr>
											<td>00004</td>
											<td>Sagittis enim felis</td>
											<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
											<td>19.99</td>
										</tr>
										<tr>
											<td>00005</td>
											<td>Nullam sed vestibulum</td>
											<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
											<td>19.99</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3"></td>
											<td>100.00</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</section>
						<section>
							<header>
								<h3>Form</h3>
							</header>
							<form method="post" action="#">
								<div class="row half">
									<div class="6u">
										<input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
									</div>
									<div class="6u">
										<input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
									</div>
								</div>
								<div class="row half">
									<div class="12u">
										<div class="select">
											<select name="department" id="department">
												<option value="">Choose a department</option>
												<option value="1">Manufacturing</option>
												<option value="2">Administration</option>
												<option value="3">Support</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row half">
									<div class="12u">
										<input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
									</div>
								</div>
								<div class="row half">
									<div class="12u">
										<textarea name="message" id="message" placeholder="Enter your message"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" class="button" value="Send Message" /></li>
											<li><input type="reset" class="button alt" value="Clear Form" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
					</div>
				</div>
			</section>
		-->
		
		<!-- Fourth -->
			<section id="fifth" class="main">
				<header>
					<div class="container">
						<h2>Sed feugiat ipsum consequat</h2>
						<p>Gravida dis placerat lectus ante vel nunc euismod eget ornare varius gravida euismod lorem ipsum dolor sit amet consequat<br />
						feugiat. Gravida dis placerat lectus ante vel nunc euismod eget ornare varius gravida euismod lorem ipsum dolor sit amet.</p>
					</div>
				</header>
				<div class="content style4 featured">
					<div class="container small">
						<form method="post" action="#">
							<div class="row half">
								<div class="6u"><input type="text" class="text" placeholder="Name" /></div>
								<div class="6u"><input type="text" class="text" placeholder="Email" /></div>
							</div>
							<div class="row half">
								<div class="12u"><textarea name="message" placeholder="Message"></textarea></div>
							</div>
							<div class="row">
								<div class="12u">
									<ul class="actions">
										<li><input type="submit" class="button" value="Send Message" /></li>
										<li><input type="reset" class="button alt" value="Clear Form" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
			
		<!-- Footer -->
        <script>
            $(function(){
               
               $('.read').click(function(){
                if($(this).attr('class').replace('no')==$(this).attr('class'))
                $(this).html('Hide Detail');
                else
                $(this).html('Continue Reading');
                var id = $(this).attr('id');
                var id = id.replace('read','');
                if($(this).attr('class').replace('no')==$(this).attr('class')){
                $('.hide'+id).hide();
                $('.continue'+id).show();
                $(this).addClass('no');
                }
                else
                {
                    $('.hide'+id).show();
                $('.continue'+id).hide();
                $(this).removeClass('no');
                
                }
                
                //$(this).attr('id','noread'+id);
                //$(this).removeClass('read');
                
                
               });
              
            });
        </script>
		<div class="popover">
        </div>	