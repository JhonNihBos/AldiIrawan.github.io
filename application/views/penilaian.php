<?php $this->load->view('template/header'); ?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Penilaian</h3>
	</div>
	<div class="box-body">
		<?php if (!empty($message)) : ?>
			<div class="alert bg-warning" role="alert"><?= $message ?></div>
		<?php else : ?>
			<?php if ($nilai_w) : ?>
				<div id="accordian_penilaian" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="questionOne">
							<h5 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordian_penilaian" href="#d_alternatif" aria-expanded="false" aria-controls="d_alternatif">
									Data Alternatif
								</a>
							</h5>
						</div>
						<div id="d_alternatif" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionOne">
							<div class="panel-body">
								<div class='table-responsive'>
									<table class='table table-bordered tabel-header'>
										<thead>
											<tr>
												<th>No</th>
												<th>Alternatif</th>
												<?php foreach ($query_kriteria as $row) : ?>
													<th><?php echo $row->nama_kriteria; ?></th>
												<?php endforeach; ?>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($query_alt as $row) : ?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $row->nama_alternatif; ?></td>
													<?php foreach ($query_kriteria as $row2) : ?>
														<td class="text-center"><?php echo $sub[$row->id_alternatif][$row2->id_kriteria]; ?></td>
													<?php endforeach; ?>
												</tr>
												<?php $i++; ?>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="questionTwo">
							<h5 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordian_penilaian" href="#d_bobot" aria-expanded="false" aria-controls="d_bobot">
									Pembobotan
								</a>
							</h5>
						</div>
						<div id="d_bobot" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
							<div class="panel-body">
								<div class='table-responsive'>
									<table class='table table-bordered tabel-header'>
										<thead>
											<tr>
												<th>Alternatif</th>
												<?php foreach ($query_kriteria as $row) : ?>
													<th><?php echo $row->kode_kriteria; ?></th>
												<?php endforeach; ?>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($query_alt as $row) : ?>
												<tr>
													<td width="200"><?php echo $row->nama_alternatif; ?></td>
													<?php foreach ($query_kriteria as $row2) : ?>
														<td class="text-center"><?php echo $bobot[$row->id_alternatif][$row2->id_kriteria]; ?></td>
													<?php endforeach; ?>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="">
							<h5 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordian_penilaian" href="#normalisasi" aria-expanded="true" aria-controls="normalisasi">
									Perhitungan SAW
								</a>
							</h5>
						</div>
						<div id="normalisasi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="">
							<div class="panel-body">
								<?php echo empty($rumus) ? '' : $rumus; ?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="">
							<h5 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordian_penilaian" href="#hasil" aria-expanded="true" aria-controls="hasil">
									Hasil Pemahaman
								</a>
							</h5>
						</div>
						<div id="hasil" class="panel-collapse collapse" role="tabpanel" aria-labelledby="">
							<div class="panel-body">
								<div class='table-responsive mt-3'>
									<table class='table table-bordered'>
										<thead>
											<tr>
												<th>No</th>
												<th>Alternatif</th>
												<th>Nilai</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($hasil)) : ?>
												<?php $i = 1; ?>
												<?php foreach ($hasil as $row) : ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $row['nama_alternatif']; ?></td>
														<td><?php echo $row['nilai']; ?></td>
														<td><?php echo $row['keterangan']; ?></td>
													</tr>
													<?php $i++; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
								<h3 class="page-header">Tabel Persentase</h3>
								<div class='table-responsive'>
									<table class='table table-bordered'>
										<thead>
											<tr>
												<th>Keterangan</th>
												<th>Persentase</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($kelompok)) : ?>
												<?php $i = 1; ?>
												<?php foreach ($kelompok as $row) : ?>
													<tr>
														<td><?php echo $row['label']; ?></td>
														<td><?php echo $row['value']; ?></td>
													</tr>
													<?php $i++; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href="<?php echo site_url('penilaian/pdf'); ?>" target='blank' class='btn btn-default'><img src="<?php echo base_url('assets/images/pdf.png'); ?>">&nbsp; Export ke PDF</a>
					</p>
				</div>
			<?php else : ?>
				<p style="font-size: 14px; color: red;" id="bobot-text">jumlah bobot maksimal = 1. silakan cek kembali bobotnya dan hubungi admin</p>
			<?php endif ?>
		<?php endif; ?>
	</div>
</div>

<?php $this->load->view('template/footer'); ?>