<section>
	<div class="name-course title-section d-flex align-items-center justify-content-center">
		<h2><?php echo $data['course']['name'] ?></h2>
	</div>
	<div id="buttonOpen" class="float-right mr-2 mt-2 justify-content-end">
		<button class="openbtn">&#9776;</button>
	</div>
	<div id="mySidebar" class="sidebar">
		<a class="closebtn text-left">&times;</a>
		<div class="classes">
			<?php foreach ($data['module'] as $key => $module) { ?>
				<button class="dropdown-btn active"><?php echo $module ?> 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<?php 
						if(isset($data['lessons'][$key])){
							$cont = 0;
							foreach($data['lessons'][$key] as $keyTwo => $lesson){
								if ($cont < 2) {
									if (!$data['inscription']) {
										$cont++;
									}
									$check = false;
									foreach ($data['lessonsCompleted'] as $key => $completed) {
										if ($completed['id_lesson'] == $lesson['id_lesson']) {
											$check = true;
											break;
										}
									}
									if ($data['lessonCurrent']['id'] == $lesson['id_lesson'] || $check) {
										if ($check) {
											echo '<a href="'.INCLUDE_PATH.'coursesingle/index/'.$data['course']['reference'].'/'.$lesson['reference'].'"><i class="fas fa-check-circle"></i> - '.$lesson['name_lesson'].'</a>';
										} else {
											echo '<a href="'.INCLUDE_PATH.'coursesingle/index/'.$data['course']['reference'].'/'.$lesson['reference'].'" class="active"><i class="fas fa-chalkboard-teacher"></i> - '.$lesson['name_lesson'].'</a>';
										}
									} else {
										echo '<a href="'.INCLUDE_PATH.'coursesingle/index/'.$data['course']['reference'].'/'.$lesson['reference'].'" class="active"><i class="fas fa-play-circle"></i> - '.$lesson['name_lesson'].'</a>';
									}
								} else {
									echo '<a href="" class="active">Matricule-se e saiba mais!</a>';
									break;
								}
							}
						}
					?>
				</div>
			<?php } ?>
		</div>
	</div>
	<div id="main">
		<div class="text-center mx-4">
			<h3><?php echo $data['lessonCurrent']['name'] ?></h3>
			<p class="mx-5"><?php echo $data['lessonCurrent']['description'] ?></p>
		</div>
		<div class="d-flex">
			<?php if(isset($data['previosNext'][0])) { ?>
				<div class="previous">
					<a class="btn btn-primary" href="<?php echo INCLUDE_PATH; ?>coursesingle/index/<?php echo $data['course']['reference']; ?>/<?php echo $data['previosNext'][0]?>"><i class="fas fa-arrow-left"></i> Aula Anterior</a>
				</div>
			<?php } ?>
			<?php if(isset($data['previosNext'][1])) {?>
				<div class="next ml-auto">
					<a class="btn btn-primary" href="<?php echo INCLUDE_PATH; ?>coursesingle/index/<?php echo $data['course']['reference']; ?>/<?php echo $data['previosNext'][1]?>">Próxima Aula <i class="fas fa-arrow-right"></i></a>
				</div>
			<?php } ?>
		</div>
		<div class="player mt-4">
				<div style="padding:60% 0 0 0;position:relative;">
					<iframe src="<?php echo $data['lessonCurrent']['url_lesson'] ?>?autoplay=1&loop=0&color=ffffff&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen"></iframe>
				</div>
				<script src="https://player.vimeo.com/api/player.js"></script>
		</div>
		<!-- <div class="support mt-4" style="width: 100%; height: 300px; background-color: #333">
				
		</div> -->
	</div>
</section>